<?php

class AlbumController
{
    public function actionFoto(){

        //возвращает массив обложек галлерей из модели album
        $album = array();
        $album = Album::getAlbumList();

        require_once(ROOT.'/views/album.php');

        return true;
    }

    public function actionGallery($id_gallery, $page = 1)
    {

        echo '<br>';
        //возвращает массив обложек галлерей из модели album
        $album = array();
        $album = Album::getAlbumList();

        //создаём пустой массив в переменной $fotoGallery
        $fotoGallery = array();
        $fotoGallery = Album::getGalleryById($id_gallery, $page);
        //var_dump($fotoGallery) ;


        // Общее количетсво товаров (необходимо для постраничной навигации)
        $total = Album::getTotalFotoInGallery($id_gallery);

        // Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($total, $page, Album::SHOW_BY_DEFAULT, 'p');

        //распечатываем результаты обращения к методам actionGallery для вывода всех фото одного альбома
        require_once(ROOT . '/views/gallery.php');

        return true;

        }

}