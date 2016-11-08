<?php

// Контроллер AdminAlbumController Управление альбомами в админпанели
class AdminAlbumController extends AdminBase
{
    //Action для страницы "Добавить альбом"(CREATE)
    public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена получаем данные из формы
            $options['gallery_name'] = $_POST['gallery_name'];
            $options['cover'] = $_POST['cover'];

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($options['gallery_name']) || empty($options['gallery_name'])) {
                $errors[] = 'Заполните поля';
            }
            elseif (!isset($options['cover']) || empty($options['cover'])) {
                $errors[] = 'Заполните поля';
            }

            if ($errors == false) {
                // Если ошибок нет добавляем новый альбом
                Album::createAlbum($options);

                // Перенаправляем пользователя на страницу управлениями альбомами
                header("Location: /admin/album/");
            }
        }

        require_once(ROOT . '/views/admin_album/create.php');
        return true;
    }

    // Action для страницы "Управление альбомами"(READ)
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список альбомов
        $albumList = Album::getAlbumList();

        // Подключаем вид
        require_once(ROOT . '/views/admin_album/index.php');
        return true;
    }

    //Action для страницы "Редактировать альбом"(UPDATE)
    public function actionUpdate($id_gallery)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем данные о редактируемом альбоме
        $album = Album::getAlbumById($id_gallery);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена получаем данные из формы редактирования. При необходимости можно валидировать значения
            $gallery_name = $_POST['gallery_name'];
            $cover = $_POST['cover'];

            // Сохраняем изменения
            Album::updateAlbumById($id_gallery, $gallery_name, $cover);

            // Перенаправляем пользователя на страницу управлениями альбомами
            header("Location: /admin/album");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_album/update.php');
        return true;
    }

    //Action для страницы "Удалить категорию"(DELETE)
    public function actionDelete($id_gallery)
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена удаляем альбом
            Album::deleteAlbumById($id_gallery);

            // Перенаправляем пользователя на страницу управлениями альбомами
            header("Location: /admin/album/");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_album/delete.php');
        return true;
    }

}