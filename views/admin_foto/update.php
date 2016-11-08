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
                    <li><a href="/admin/foto/">Управление фото</a></li>
                </ol>

            <h3>Редактировать фото №<?php echo $id_image; ?></h3>
            <br>

                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Альбом</p>
                        <select name="id_gallery">
                            <?php if (is_array($albumList)): ?>
                                <?php foreach ($albumList as $album): ?>
                                    <option value="<?php echo $album['id_gallery']; ?>"
                                        <?php if ($foto['id_gallery'] == $album['id_gallery']) echo ' selected="selected"'; ?>>
                                        <?php echo $album['gallery_name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>                        <br/><br/>

                        <p>Ссылка на фото в ВК</p>
                        <input class="largeInput" type="text" name="image" placeholder="" value="<?php echo $foto['image']; ?>"><br><br>

                        <p>Описание к фото, если имеется</p>
                        <input type="text" name="description" placeholder="" value="<?php echo $foto['description']; ?>">

                        <br/><br/>
                        
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                        
                        <br/><br/>
                        
                    </form>

        </div>
    </div>
</section>

    <div class="cleaner"></div>
</div> <!-- END of templatemo_main -->

<?php include ROOT . '/views/footer.php'; ?>