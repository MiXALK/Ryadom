<?php

// Контроллер AdminFotoController Управление фото в админпанели
class AdminFotoController extends AdminBase
{
	    //Action для страницы "Добавить фото"(CREATE)
    public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий для выпадающего списка
        $albumList = Album::getAlbumList();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена получаем данные из формы
            $options['id_gallery'] = $_POST['id_gallery'];
            $options['image'] = $_POST['image'];
            $options['description'] = $_POST['description'];

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($options['image']) || empty($options['image'])) {
                $errors[] = 'Заполните поля';
            }

            if ($errors == false) {
                // Если ошибок нет добавляем новое фото
                Album::createFoto($options);

                // Если запись добавлена перенаправляем пользователя на страницу управлениями фото
                header("Location: /admin/foto/");
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_foto/create.php');
        return true;
    }

    //Action для страницы "Управление фото"(READ)
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список фото
        $fotoList = Album::getFotoList();

        // Подключаем вид
        require_once(ROOT . '/views/admin_foto/index.php');
        return true;
    }


    //Action для страницы "Редактировать фото"(UPDATE)
    public function actionUpdate($id_image)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список альбомов для выпадающего списка
        $albumList = Album::getAlbumList();

        // Получаем данные о редактируемом фото
        $foto = Album::getFotoById($id_image);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена получаем данные из формы редактирования. При необходимости можно валидировать значения
            $options['id_gallery'] = $_POST['id_gallery'];
            $options['image'] = $_POST['image'];
            $options['description'] = $_POST['description'];

            // Сохраняем изменения
            Album::updateFotoById($id_image, $options);

            // Перенаправляем пользователя на страницу управлениями фото
            header("Location: /admin/foto/");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_foto/update.php');
        return true;
    }

    //Action для страницы "Удалить фото"(DELETE)
    public function actionDelete($id_image)
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена удаляем фото
            Album::deleteFotoById($id_image);

            // Перенаправляем пользователя на страницу управления фото
            header("Location: /admin/foto/");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_foto/delete.php');
        return true;
    }

}