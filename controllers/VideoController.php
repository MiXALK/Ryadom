<?php

class VideoController
{
    public function actionMovie($page = 1){

        //создаём пустой массив в переменной $videoList
        $videoList = array();
        $videoList = Video::getVideoById($page);

        // Общее количетсво товаров (необходимо для постраничной навигации)
        $total = Video::getTotalVideo();

        // Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($total, $page, Video::SHOW_BY_DEFAULT, 'p');

        require_once(ROOT.'/views/video.php');

        return true;
    }
}