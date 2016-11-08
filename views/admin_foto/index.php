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

            <a href="/admin/foto/create/"><img src="/views/images/plus.png"/>Добавить новое фото</a>
            <br><br>


            <h3>Управление фото</h3>
            <br>

            <table >
                <tr class="flex-container">
                    <th>ID фото</th>
                    <th>ID альбома</th>
                    <th>Превью фото</th>
                    <th>Ссылка на фото</th>
                    <th>Описание</th>
                    <th>Редактировать</th>
                    <th>Удалить</th>
                </tr>
                <?php foreach ($fotoList as $foto): ?>
                    <tr class="flex-container">
                        <td><?php echo $foto['id_image']; ?></td>
                        <td><?php echo $foto['id_gallery']; ?></td>
                        <td><img class="cloudcarousel" src="<?php echo $foto['image']; ?>" width=8%/></td>
                        <td><?php echo $foto['image']; ?></td>
                        <td><?php echo $foto['description']; ?></td>
                        <td><a href="/admin/foto/update/<?php echo $foto['id_image']; ?>" title="Редактировать"><img src="/views/images/pencil.png"/></a></td>
                        <td><a href="/admin/foto/delete/<?php echo $foto['id_image']; ?>" title="Удалить"><img src="/views/images/cross.png"/></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

    </div>
</section>

    <div class="cleaner"></div>
</div> <!-- END of templatemo_main -->

<?php include ROOT . '/views/footer.php'; ?>