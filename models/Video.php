<?php

class Video
{
    const SHOW_BY_DEFAULT = 4;

//возвращает массив видео
    public static function getVideoList()
    {
        //запрос к бд
        $db = Db::getConnection();

        //пустой массив для результатов
        $videoList = array();

        //запрос к бд: выбрать 7 последних новостей из таблицы новости
        $result = $db->query('SELECT id_video, ref_youtube, title '
                            .'FROM album.video');

        //через цикл обращаемся к переменной $result через fetch
        //в цикле получаем доступ к переменной $row которая символизирует строку из бд
        $i = 0;
        while ($row = $result->fetch()){
            $videoList[$i]['id_video'] = $row['id_video'];
            $videoList[$i]['ref_youtube'] = $row['ref_youtube'];
            $videoList[$i]['title'] = $row['title'];
            $i++;
        }

        //возвращаем массив результата
        return $videoList;
    }

    //Добавляет новое видео
    public static function createVideo($options)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO album.video (ref_youtube, title) VALUES (:ref_youtube, :title)';

        $ref_youtube = htmlspecialchars_decode($options['ref_youtube']);

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':ref_youtube', $ref_youtube, PDO::PARAM_STR);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->execute();
    }

    //Возвращает видео с указанным id_video
    public static function getVideoById($page = 1)
    {
        $limit = intval(Video::SHOW_BY_DEFAULT);
        // Смещение (для запроса)
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM album.video LIMIT :limit OFFSET :offset';


        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение коменды
        $result->execute();

        //создаём пустой массив для результатов
        $video = array();
        $i = 0;
        while ($row = $result->fetch()){
            $video[$i]['ref_youtube'] = $row['ref_youtube'];
            $video[$i]['title'] = $row['title'];
            $i++;
        }

        return $video;

    }

    //Редактирует видео с заданным id_video
    public static function updateVideoById($id_video, $options)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE album.video SET ref_youtube = :ref_youtube, title = :title WHERE id_video = :idv";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':idv', $id_video, PDO::PARAM_INT);
        $result->bindParam(':ref_youtube', $options['ref_youtube'], PDO::PARAM_STR);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        return $result->execute();
    }

    //Удаляет видео с указанным id_video
    public static function deleteVideoById($id_video)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM album.video WHERE id_video = :idv';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':idv', $id_video, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function getTotalVideo()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT count(id_video) AS count FROM video';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);

        // Выполнение коменды
        $result->execute();

        // Возвращаем значение count - количество
        $row = $result->fetch();
        return $row['count'];
    }

    //Возвращает видео с указанным id_video
    public static function adminGetVideoById($id_video)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM album.video WHERE id_video = :idv';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':idv', $id_video, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        return $result->fetch();
    }

}
