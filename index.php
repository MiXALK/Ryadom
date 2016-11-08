<?php

    // FRONT CONTROLLER
    // Общие настройки всего сайта в целом
    error_reporting(E_ALL);

    session_start();

    // Подключение файлов системы
    define('ROOT', dirname(__FILE__));

    //подключаем класс Autoload отвечающий за пути
require_once(ROOT.'/components/Autoload.php');

    // Вызов Router и передача ему управления
    $router = new Router();
    $router->run();