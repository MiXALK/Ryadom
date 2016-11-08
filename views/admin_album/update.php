<?php include ROOT . '/views/header.php'; ?>

    <li><a href="/">Главная</a></li>
    <li><a href="/news/">Новости</a></li>
    <li><a href="/video/p1">Видео</a></li>
    <li><a href="/album/">Фотоальбомы</a>
    <li><a href="/contact/">О компании</a></li>
    <br><br>

<?php if (User::isGuest()): ?>
    <li><a href="/user/login/">Вход</a></li>
    <li><a href="/user/register/">Регистрация</a></li>

<?php else: ?>
    <li><a href="/cabinet/" class="selected">Аккаунт</a></li>
    <li><a href="/user/logout/">Выход</a></li>
<?php endif; ?>

        </ul>
            <br>

    </div> <!-- end of templatemo_menu -->
    <div class="cleaner"></div>
</div>	<!-- END of templatemo_header_wrapper -->

<div id="templatemo_main">

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin/">Админпанель</a></li>
                    <li><a href="/admin/album/">Управление альбомами</a></li>
                </ol>
            </div>


            <h4>Редактировать альбом "<?php echo $id_gallery.' - '.$album['gallery_name'];?>"</h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Название</p>
                        <input type="text" name="gallery_name" placeholder="" value="<?php echo $album['gallery_name']; ?>">

                        <p>Ссылка на обложку</p>
                        <input class="largeInput" type="text" name="cover" placeholder="" value="<?php echo $album['cover']; ?>">

                        <br><br>
                        
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

    <div class="cleaner"></div>
</div> <!-- END of templatemo_main -->

<?php include ROOT . '/views/footer.php'; ?>