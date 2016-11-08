<?php include ROOT . '/views/header.php'; ?>

                <li><a href="/">Главная</a></li>
                <li><a href="/video/">Видео</a></li>
                <li><a href="/album/">Фотоальбомы</a>
                <li><a href="/contact/">О компании</a></li>
                    <br><br>

            <?php if (User::isGuest()): ?>
                <li><a href="/user/login/">Вход</a></li>
                <li><a href="/user/register/">Регистация</a></li>

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

            <a href="/admin/news/create/"><img src="/views/images/plus.png"/>Добавить новость</a>
            <br><br>


            <h3>Управление новостями</h3>
            <br>

            <table >
                <tr class="flex-container">
                    <th>ID новости</th>
                    <th>Заголовок новости</th>
                    <th>Дата публикации</th>
                    <th>Содержание новости</th>
                    <th>Имя автора</th>
                    <th>Фото новости</th>
                    <th>Второе фото новости</th>
                    <th>Третье фото новости</th>
                    <th>Редактировать</th>
                    <th>Удалить</th>
                </tr>
                <?php foreach ($newsList as $news): ?>
                    <tr class="flex-container">
                        <td><?php echo $news['id']; ?></td>
                        <td><?php echo $news['title']; ?></td>
                        <td><?php echo $news['date']; ?></td>
                        <td><?php echo $news['content']; ?></td>
                        <td><?php echo $news['admin']; ?></td>
                        <td><?php echo $news['image']; ?></td>
                        <td><?php echo $news['image1']; ?></td>
                        <td><?php echo $news['image2']; ?></td>
                        <td><a href="/admin/news/update/<?php echo $news['id']; ?>" title="Редактировать"><img src="/views/images/pencil.png"/></a></td>
                        <td><a href="/admin/news/delete/<?php echo $news['id']; ?>" title="Удалить"><img src="/views/images/cross.png"/></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

    </div>
</section>

    <div class="cleaner"></div>
</div> <!-- END of templatemo_main -->

<?php include ROOT . '/views/footer.php'; ?>