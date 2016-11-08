<?php

return array(
    // Управление новостями:
    'admin/news/create' => 'adminNews/create',
    'admin/news/update/([0-9]+)' => 'adminNews/update/$1',
    'admin/news/delete/([0-9]+)' => 'adminNews/delete/$1',
    'admin/news' => 'adminNews/index',

    // Управление видео:
    'admin/video/create' => 'adminVideo/create',
    'admin/video/update/([0-9]+)' => 'adminVideo/update/$1',
    'admin/video/delete/([0-9]+)' => 'adminVideo/delete/$1',
    'admin/video' => 'adminVideo/index',

    // Управление альбомами:
    'admin/album/create' => 'adminalbum.create',
    'admin/album/update/([0-9]+)' => 'adminalbum.update/$1',
    'admin/album/delete/([0-9]+)' => 'adminalbum.delete/$1',
    'admin/album' => 'adminalbum.index',

    // Управление фото:
    'admin/foto/create' => 'adminFoto/create',
    'admin/foto/update/([0-9]+)' => 'adminFoto/update/$1',
    'admin/foto/delete/([0-9]+)' => 'adminFoto/delete/$1',
    'admin/foto' => 'adminFoto/index',

    // Просмотр одной новости
    'news/([0-9]+)' => 'news/view/$1', // actionView в NewsController

    // Главная страница cписка новостей
    'news/p([0-9]+)' => 'news/index/$1', // actionIndex в NewsController
    'news' => 'news/index', // actionIndex в NewsController

    // Видео:
    'video/p([0-9]+)' => 'video/movie/$1', // actionMovie в VideoController

    // Галлерея:
    'album/([0-9]+)/p([0-9]+)' => 'album/gallery/$1/$2', // actionGallery в album.ontroller

    // Альбом:
    'album' => 'album/foto', // actionFoto в album.ontroller


    // Админпанель:
    'admin' => 'admin/index',

    // Пользователь:
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',

    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',

    // О компании
    'contact' => 'contacts/contacts', // actionContacts в ContactsController

    // Главная
    '' => 'site/index', // actionIndex в SiteController

);