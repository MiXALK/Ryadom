<?php

/**
 * Created by PhpStorm.
 * User: Mixal
 * Date: 25.04.2016
 * Time: 21:44
 */
class Site
{
    const SHOW_BY_DEFAULT = 3;

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

    //Возвращает новости с указанным id
    public static function getNewsById()
    {
        $limit = intval(Site::SHOW_BY_DEFAULT);

        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT title, date, image, image1 FROM news ORDER BY news.date DESC LIMIT :limit';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение коменды
        $result->execute();

        //создаём пустой массив для результатов
        $news = array();
        //$news = array_reverse($news);
        $i = 0;
        while ($row = $result->fetch()){
            $news[$i]['date'] = $row['date'];
            $news[$i]['title'] = $row['title'];
            $news[$i]['image'] = $row['image'];
            $news[$i]['image1'] = $row['image1'];
            $i++;
        }
        return $news;
    }


}
