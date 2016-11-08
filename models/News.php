<?php
//модель новостей для вывода одной новости и всех новостей
class News
{
    const SHOW_BY_DEFAULT = 4;

    //возвращаем одну новость по идентификатору id
    public static function getNewsItemById($id)
    {
        //запрос к бд news для получения одной новости
        $id = intval($id);

        if($id) {

            //подключаем БД чеоех статическое свойство getConnection()
            $db = Db::getConnection();

            //запрос к бд к таблице news по id новости
            $result = $db->query('SELECT * FROM news WHERE news.id='. $id);

            //Возвращает ассоциативный массив строк, соответствующий результирующей выборке,
            //где каждый ключ в массиве соответствует имени одного из столбцов выборки или NULL,
            //если других рядов не существует.
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $newsItem = $result->fetch();

            return $newsItem;
        }


    }
    //возвращает массив новостей
    public static function getNewsList()
    {
        //запрос к бд
        $db = Db::getConnection();

        //пустой массив для результатов
        $newsList = array();

        //запрос к бд: выбрать 7 последних новостей из таблицы новости
        $result = $db->query('SELECT id, title, date, content, admin, image, image1, image2 '
        .'FROM news '
        .'ORDER BY news.date DESC ');

        //через цикл обращаемся к переменной $result через fetch
        //в цикле получаем доступ к переменной $row которая символизирует строку из бд
        $i = 0;
        while ($row = $result->fetch()){
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['content'] = $row['content'];
            $newsList[$i]['admin'] = $row['admin'];
            $newsList[$i]['image'] = $row['image'];
            $newsList[$i]['image1'] = $row['image1'];
            $newsList[$i]['image2'] = $row['image2'];
            $i++;
        }
        //возвращаем массив результата
        return $newsList;
    }

    //Добавляет новую новость
    public static function createNews($options)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO album.news (title, date, content, admin, image, image1, image2) VALUES (:title, now(), :content, :admin, :image, :image1, :image2)';

        $image = htmlspecialchars_decode($options['image']);
        $image1 = htmlspecialchars_decode($options['image1']);
        $image2 = htmlspecialchars_decode($options['image2']);

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':content', $options['content'], PDO::PARAM_STR);
        $result->bindParam(':admin', $options['admin'], PDO::PARAM_STR);
        $result->bindParam(':image', $image, PDO::PARAM_STR);
        $result->bindParam(':image1', $image1, PDO::PARAM_STR);
        $result->bindParam(':image2', $image2, PDO::PARAM_STR);

        $result->execute();
    }

    //Выбирает список админов для выпадающего списка
    public static function getAdminList()
    {
        //запрос к бд
        $db = Db::getConnection();

        $result = $db->query('SELECT name FROM album.user ');

        //пустой массив для результатов
        $adminList = array();

        //через цикл обращаемся к переменной $result через fetch
        //в цикле получаем доступ к переменной $row которая символизирует строку из бд
        $i = 0;
        while ($row = $result->fetch()){
            $adminList[$i]['name'] = $row['name'];
            $i++;
        }
        //возвращаем массив результата
        return $adminList;

    }

    //Возвращает новости с указанным id
    public static function getNewsById($page = 1)
    {
        $limit = intval(Video::SHOW_BY_DEFAULT);
        // Смещение (для запроса)
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM album.news ORDER BY news.date DESC LIMIT :limit OFFSET :offset';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);

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
            $news[$i]['content'] = $row['content'];
            $news[$i]['admin'] = $row['admin'];
            $news[$i]['image'] = $row['image'];
            $news[$i]['image1'] = $row['image1'];
            $news[$i]['image2'] = $row['image2'];
            $i++;
        }
        return $news;
    }

    //Редактирует новость с заданным id
    public static function updateNewsById($id, $options)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE album.news SET title = :title, content = :content, admin = :admin, image = :image, image1 = :image1, image2 = :image2 WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':content', $options['content'], PDO::PARAM_STR);
        $result->bindParam(':admin', $options['admin'], PDO::PARAM_STR);
        $result->bindParam(':image', $options['image'], PDO::PARAM_STR);
        $result->bindParam(':image1', $options['image1'], PDO::PARAM_STR);
        $result->bindParam(':image2', $options['image2'], PDO::PARAM_STR);
        return $result->execute();
    }

    //Удаляет новость с указанным id
    public static function deleteNewsById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM album.news WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function getTotalNews()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT count(id) AS count FROM news';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);

        // Выполнение коменды
        $result->execute();

        // Возвращаем значение count - количество
        $row = $result->fetch();
        return $row['count'];
    }

    //Возвращает новости с указанным id
    public static function adminGetNewsById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM album.news WHERE id = :id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        return $result->fetch();
    }
}