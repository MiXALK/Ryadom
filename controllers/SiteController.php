<?php

class SiteController
{
    public function actionIndex(){
        
        //возвращает массив обложек галлерей из модели album
        $album = array();
        $album = Site::getAlbumList();

        //создаём пустой массив в переменной $news
        $news = array();
        $news = Site::getNewsById();

        //подключаем вид index.php
        require_once(ROOT.'/views/index.php');

        return true;
    }
}