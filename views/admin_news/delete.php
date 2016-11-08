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

                    <li><a href="/admin">Админпанель</a></li>
                                <br>


                    <li><a href="/admin/news/">Управление новостями</a></li>
                                <br>

            <h3>Удалить новость №<?php echo $id; ?></h3>
                <br>

            <p>Вы действительно хотите удалить эту новость?</p>

            <form method="post">
                <input type="submit" name="submit" value="Удалить" />
            </form>

    </div>
</section>

    <div class="cleaner"></div>
</div> <!-- END of templatemo_main -->

<?php include ROOT . '/views/footer.php'; ?>