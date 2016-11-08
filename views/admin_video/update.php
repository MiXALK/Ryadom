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

        <div class="half float_l">

                <ol >
                    <li><a href="/admin/">Админпанель</a></li>
                    <li><a href="/admin/video/">Управление видео</a></li>
                </ol>

            <h3>Редактировать видео <?php echo $video['title']; ?></h3>
            <br>

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Видео</p>

                        <p>Новая ссылка на видео</p>
                        <input class="largeInput" type="text" name="ref_youtube" placeholder="" value='<?php echo $video['ref_youtube']; ?>'> <br><br>

                        <p>Новое название видео</p>
                        <input type="text" name="title" placeholder="" value="<?php echo $video['title']; ?>">

                        <br/><br/>
                        
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить изменения">
                        
                        <br/><br/>
                        
                    </form>

        </div>
    </div>
</section>

    <div class="cleaner"></div>
</div> <!-- END of templatemo_main -->

<?php include ROOT . '/views/footer.php'; ?>