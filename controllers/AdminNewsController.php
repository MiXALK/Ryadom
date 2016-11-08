<?php

/**
 * Created by PhpStorm.
 * User: Mixal
 * Date: 09.04.2016
 * Time: 22:50
 */
class AdminNewsController extends AdminBase
{
    //Action для страницы "Добавить новость"(CREATE)
    public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список админов для выпадающего списка
        $adminList = News::getAdminList();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена получаем данные из формы
            $options['title'] = strip_tags($_POST['title']);
            $options['content'] = strip_tags($_POST['content']);
            $options['admin'] = strip_tags($_POST['admin']);
            $options['image'] = htmlspecialchars($_POST['image']);
            $options['image1'] = htmlspecialchars($_POST['image1']);
            $options['image2'] = htmlspecialchars($_POST['image2']);


            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($options['title']) || empty($options['title'])) {
                $errors[] = 'Заполните поле названия';
            }
            elseif  (!isset($options['content']) || empty($options['content'])) {
                $errors[] = 'Заполните поле содержимого';
            }
            elseif  (!isset($options['image']) || empty($options['image'])) {
                $errors[] = 'Заполните поле ссылки на фото';
            }
            elseif  (!isset($options['image1']) || empty($options['image1'])) {
                $errors[] = 'Заполните поле ссылки на фото 2';
            }
            elseif  (!isset($options['image2']) || empty($options['image2'])) {
                $errors[] = 'Заполните поле ссылки на фото 3';
            }

            if ($errors == false) {
                // Если ошибок нет добавляем новую новость
                News::createNews($options);

                // Если запись добавлена перенаправляем пользователя на страницу управлениями новостями
                header("Location: /admin/news/");
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_news/create.php');
        return true;
    }

    //Action для страницы "Управление видео"(READ)
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список видео
        $newsList = News::getNewsList();

        // Подключаем вид
        require_once(ROOT . '/views/admin_news/index.php');
        return true;
    }


    //Action для страницы "Редактировать видео"(UPDATE)
    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список админов для выпадающего списка
        $adminList = News::getAdminList();

        // Получаем данные о редактируемом видео
        $news = News::adminGetNewsById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена получаем данные из формы редактирования. При необходимости можно валидировать значения
            $options['title'] = strip_tags($_POST['title']);
            $options['content'] = strip_tags($_POST['content']);
            $options['admin'] = strip_tags($_POST['admin']);
            $options['image'] = ($_POST['image']);
            $options['image1'] = ($_POST['image1']);
            $options['image2'] = ($_POST['image2']);

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($options['title']) || empty($options['title'])) {
                $errors[] = 'Заполните поле названия';
            }
            elseif  (!isset($options['content']) || empty($options['content'])) {
                $errors[] = 'Заполните поле содержимого';
            }
            elseif  (!isset($options['image']) || empty($options['image'])) {
                $errors[] = 'Заполните поле ссылки на фото';
            }
            elseif  (!isset($options['image1']) || empty($options['image1'])) {
                $errors[] = 'Заполните поле ссылки на фото 2';
            }
            elseif  (!isset($options['image2']) || empty($options['image2'])) {
                $errors[] = 'Заполните поле ссылки на фото 3';
            }

            if ($errors == false) {

                // Сохраняем изменения
                News::updateNewsById($id, $options);

                // Перенаправляем пользователя на страницу управлениями видео
                header("Location: /admin/news/");
            }

        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_news/update.php');
        return true;
    }

    //Action для страницы "Удалить новость"(DELETE)
    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена удаляем видео
            News::deleteNewsById($id);

            // Перенаправляем пользователя на страницу управления видео
            header("Location: /admin/news/");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_news/delete.php');
        return true;
    }

}