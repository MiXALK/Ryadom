<?php

// Класс Route Компонент для работы с маршрутами
class Router
{
    //Свойство для хранения массива маршрутов
    private $routes;

    //метод Конструктор
    public function __construct()
    {
        // Путь к файлу с роутами
        $routesPath = ROOT . '/config/routes.php';

        // Присваеваем свойству $routes массив который храниться в файле routes
        $this->routes = include($routesPath);

    }

    //Получаем строку запроса
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

	// Метод для обработки запроса поступившего от index.php
    public function run()
    {
        $uri = $this->getURI();
        //echo $uri; //проверка выводимого URI

        // Проверяем наличие такого запроса в массиве маршрутов (routes.php)
        foreach ($this->routes as $uriPattern => $path) {
            //echo "<br>$uriPattern => $path";проверка доступа к элементам routes

            // Сравниваем $uriPattern и $uri через регулярное выражение
            if (preg_match("~$uriPattern~", $uri)) {

                // Получаем внутренний путь из внешнего согласно правилу выполняя поиск и замену по регулярному выражению.
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                // Определяем контроллер, делим строку на две части. Получаем 2 элемента. Первый относиться к контролеру, второй к экшену
                $segments = explode('/', $internalRoute);
                //print_r($segments);}}}}

                //Удаляем первое значение массива. Получаем имя контролера
                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);

                //Получаем название экшена
                $actionName = 'action' . ucfirst(array_shift($segments));

                $parameters = $segments;

                // Определяем файл который нужно подключить.
                // Прописываем путь к нему используя имя класса
                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';

                //Проверяем существует ли такой файл и если существует подключаем его.
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                // Создаем объект класса контролера путем подставления переменной $controllerName вместо имени класса
                $controllerObject = new $controllerName;

                //Вызываем необходимый метод ($actionName) у определенного класса ($controllerObject) с заданными ($parameters) параметрами
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                // Если метод контроллера успешно вызван, завершаем работу роутера
                if ($result != null) {
                    break;
                }
            }
        }
    }
}