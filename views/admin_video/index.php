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

            <a href="/admin/video/create/"><img src="/views/images/plus.png"/>Добавить видео</a>
            <br><br>


            <h4>Управление видео</h4>
            <br>

            <table >
                <tr class="flex-container">
                    <th>Название видео</th>
                    <th>Ссылка на видео</th>
                    <th>Редактировать</th>
                    <th>Удалить</th>
                </tr>
                <?php foreach ($videoList as $video): ?>
                    <tr class="flex-container">
                        <td><?php echo $video['title']; ?></td>
                        <td><?php echo $video['ref_youtube']; ?></td>
                        <td><a href="/admin/video/update/<?php echo $video['id_video']; ?>" title="Редактировать"><img src="/views/images/pencil.png"/></a></td>
                        <td><a href="/admin/video/delete/<?php echo $video['id_video']; ?>" title="Удалить"><img src="/views/images/cross.png"/></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

    </div>
</section>

    <div class="cleaner"></div>
</div> <!-- END of templatemo_main -->

<?php include ROOT . '/views/footer.php'; ?>