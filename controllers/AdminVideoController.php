<?php

/**
 * Created by PhpStorm.
 * User: Mixal
 * Date: 09.04.2016
 * Time: 22:51
 */// Контроллер AdminVideoController Управление видео в админ панели
class AdminVideoController extends AdminBase
{
    //Action для страницы "Добавить видео"(CREATE)
    public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена получаем данные из формы
            $options['ref_youtube'] = htmlspecialchars($_POST['ref_youtube']);
            $options['title'] = strip_tags($_POST['title']);

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($options['title']) || empty($options['title'])) {
                $errors[] = 'Заполните поле названия';
            }
			elseif  (!isset($options['ref_youtube']) || empty($options['ref_youtube'])) {
                $errors[] = 'Заполните поле ссылки';
            }

            if ($errors == false) {
                // Если ошибок нет добавляем новое видео
                Video::createVideo($options);

                // Если запись добавлена перенаправляем пользователя на страницу управлениями видео
                header("Location: /admin/video/");
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_video/create.php');
        return true;
    }

    //Action для страницы "Управление видео"(READ)
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список видео
        $videoList = Video::getVideoList();

        // Подключаем вид
        require_once(ROOT . '/views/admin_video/index.php');
        return true;
    }


    //Action для страницы "Редактировать видео"(UPDATE)
    public function actionUpdate($id_video)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем данные о редактируемом видео
        $video = Video::adminGetVideoById($id_video);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена получаем данные из формы редактирования. При необходимости можно валидировать значения
            $options['ref_youtube'] = $_POST['ref_youtube'];
            $options['title'] = strip_tags($_POST['title']);

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($options['title']) || empty($options['title'])) {
                $errors[] = 'Заполните поле названия';
            }
            elseif  (!isset($options['ref_youtube']) || empty($options['ref_youtube'])) {
                $errors[] = 'Заполните поле ссылки';
            }

            if ($errors == false) {

                // Сохраняем изменения
                Video::updateVideoById($id_video, $options);

                // Перенаправляем пользователя на страницу управлениями видео
                header("Location: /admin/video/");
            }
            
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_video/update.php');
        return true;
    }

    //Action для страницы "Удалить видео"(DELETE)
    public function actionDelete($id_video)
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена удаляем видео
            Video::deleteVideoById($id_video);

            // Перенаправляем пользователя на страницу управления видео
            header("Location: /admin/video/");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_video/delete.php');
        return true;
    }

}