<?php

class Album
{
    const SHOW_BY_DEFAULT = 16;

    public static function getAlbumList()
    {
        //запрос к бд
        $db = Db::getConnection();

        $result = $db->query('SELECT cover, gallery_name, id_gallery FROM album.gallery ');

        //пустой массив для результатов
        $albumList = array();
		
        //через цикл обращаемся к переменной $result через fetch
        //в цикле получаем доступ к переменной $row которая символизирует строку из бд
        $i = 0;
        while ($row = $result->fetch()){
            $albumList[$i]['cover'] = $row['cover'];
            $albumList[$i]['gallery_name'] = $row['gallery_name'];
            $albumList[$i]['id_gallery'] = $row['id_gallery'];
            $i++;
        }
        //возвращаем массив результата
        return $albumList;

    }

    public static function getGalleryById($id_gallery, $page = 1)
    {

        if($id_gallery) {

            $limit = intval(Album::SHOW_BY_DEFAULT);
            // Смещение (для запроса)
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

            //подключаем БД чеоех статическое свойство getConnection()
            $db = Db::getConnection();


            //запрос к бд к таблице images по id_gallery ГАллереи
            $sql = 'SELECT gallery.gallery_name, images.id_image, images.id_gallery, images.image FROM images INNER JOIN gallery '
                .'ON images.id_gallery = gallery.id_gallery WHERE gallery.id_gallery = :id_gallery LIMIT :limit OFFSET :offset';

            // Используется подготовленный запрос
            $result = $db->prepare($sql);
            $result->bindParam(':id_gallery', $id_gallery, PDO::PARAM_INT);
            $result->bindParam(':limit', $limit, PDO::PARAM_INT);
            $result->bindParam(':offset', $offset, PDO::PARAM_INT);

            // Выполнение коменды
            $result->execute();

            //создаём пустой массив для результатов
            $gallery = array();
            //Возвращает ассоциативный массив строк, соответствующий результирующей выборке,
            //где каждый ключ в массиве соответствует имени одного из столбцов выборки или NULL,
            //если других рядов не существует.
            $i = 0;
            while ($row = $result->fetch()){
                $gallery[$i]['image'] = $row['image'];
                $gallery[$i]['gallery_name'] = $row['gallery_name'];
                $i++;
            }

            return $gallery;
        }

    }
    
    //Возвращает список фото
    public static function getFotoList()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Получение и возврат результатов
        $result = $db->query('SELECT images.id_image, images.id_gallery, images.image, images.description FROM album.images INNER JOIN gallery ON images.id_gallery = gallery.id_gallery ORDER BY id_image ASC');
        $fotoList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $fotoList[$i]['id_image'] = $row['id_image'];
            $fotoList[$i]['id_gallery'] = $row['id_gallery'];
            $fotoList[$i]['image'] = $row['image'];
            $fotoList[$i]['description'] = $row['description'];
            $i++;
        }
        return $fotoList;
    }

    //Добавляет новое фото
    public static function createFoto($options)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO album.images (id_gallery, image, description) VALUES (:id_gallery, :image, :description)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id_gallery', $options['id_gallery'], PDO::PARAM_INT);
        $result->bindParam(':image', $options['image'], PDO::PARAM_STR);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->execute();
    }

    //Добавляет новый альбом
    public static function createAlbum($options)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO album.gallery (gallery_name, cover) VALUES (:gallery_name, :cover)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':gallery_name', $options['gallery_name'], PDO::PARAM_STR);
        $result->bindParam(':cover', $options['cover'], PDO::PARAM_STR);
        $result->execute();
    }

    //Возвращает фото с указанным id
    public static function getFotoById($id_image)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM album.images WHERE id_image = :id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id_image, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        return $result->fetch();
    }

    //Возвращает альбом с указанным id
    public static function getAlbumById($id_gallery)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM album.gallery WHERE id_gallery = :id_gallery';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id_gallery', $id_gallery, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        return $result->fetch();
    }

    //Редактирует фото с заданным id
    public static function updateFotoById($id_image, $options)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE album.images SET id_gallery = :id_gallery, image = :image, description = :description WHERE id_image = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id_image, PDO::PARAM_INT);
        $result->bindParam(':id_gallery', $options['id_gallery'], PDO::PARAM_INT);
        $result->bindParam(':image', $options['image'], PDO::PARAM_STR);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        return $result->execute();
    }

    //Редактирует альбом с заданным id
    public static function updateAlbumById($id_gallery, $gallery_name, $cover)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE album.gallery SET gallery_name = :gallery_name, cover = :cover WHERE id_gallery = :id_gallery";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id_gallery', $id_gallery, PDO::PARAM_INT);
        $result->bindParam(':gallery_name', $gallery_name, PDO::PARAM_STR);
        $result->bindParam(':cover', $cover, PDO::PARAM_STR);
        return $result->execute();
    }

    //Удаляет фото с указанным id_image
    public static function deleteFotoById($id_image)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM album.images WHERE id_image = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id_image, PDO::PARAM_INT);
        return $result->execute();
    }

    //Удаляет альбом с указанным id_gallery
    public static function deleteAlbumById($id_gallery)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "DELETE FROM album.gallery WHERE id_gallery = :id_gallery";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id_gallery', $id_gallery, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function getTotalFotoInGallery($id_gallery)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT count(id_image) AS count FROM images WHERE id_gallery = :id_gallery';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id_gallery', $id_gallery, PDO::PARAM_INT);

        // Выполнение коменды
        $result->execute();

        // Возвращаем значение count - количество
        $row = $result->fetch();
        return $row['count'];
    }

}