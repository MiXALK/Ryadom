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
                <br>

                <li><a href="/admin/">Админпанель</a></li>
                <br>

                <a href="/admin/album/create/"><img src="/views/images/plus.png"/>Добавить новый альбом</a>
                <br><br>


                <h3>Управление альбомами</h3>
                <br>

                <table >
                    <tr class="flex-container">
                        <th>ID альбома</th>
                        <th>Название альбома</th>
                        <th>Обложка альбома</th>
                        <th>Ссылка на обложку альбома</th>
                        <th>Редактировать</th>
                        <th>Удалить</th>
                    </tr>
                    <?php foreach ($albumList as $album): ?>
                        <tr class="flex-container">
                            <td><?php echo $album['id_gallery']; ?></td>
                            <td><?php echo $album['gallery_name']; ?></td>
                            <td><img class="cloudcarousel" src="<?php echo $album['cover']; ?>" width=25%/></td>
                            <td><?php echo $album['cover']; ?></td>
                            <td><a href="/admin/album/update/<?php echo $album['id_gallery']; ?>" title="Редактировать"><img src="/views/images/pencil.png"/></a></td>
                            <td><a href="/admin/album/delete/<?php echo $album['id_gallery']; ?>" title="Удалить"><img src="/views/images/cross.png"/></a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>

            </div>
        </section>

        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->

<?php include ROOT . '/views/footer.php'; ?>