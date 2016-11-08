<?php


class NewsController
{
    public function actionIndex($page = 1)
    {

            //создаём пустой массив в переменной $news
        $newsList = array();
        $newsList = News::getNewsById($page);

            // Общее количетсво товаров (необходимо для постраничной навигации)
            $total = News::getTotalNews();

            // Создаем объект Pagination - постраничная навигация
            $pagination = new Pagination($total, $page, News::SHOW_BY_DEFAULT, 'p');
            //распечатываем результаты обращения к методам News для вывода одной новости
            require_once(ROOT . '/views/news.php');

            return true;

        }
}
