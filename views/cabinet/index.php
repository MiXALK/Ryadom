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
                <li><a href="/cabinet/" class="selected"><?php echo $user['name'];?></a></li>
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

                <h3>Кабинет пользователя</h3>

                <h4>Привет, <?php echo $user['name'];?>!</h4>
                <ul>
                    <li><a href="/cabinet/edit/">Редактировать данные</a></li>
                <?php if (AdminBase::checkAdmin()): ?>
                    <li><a href="/admin">Админ панель</a></li>
                <?php endif; ?>
                </ul>

            </div>
        </div>
    </section>

    <div class="cleaner"></div>
</div> <!-- END of templatemo_main -->

<?php include ROOT . '/views/footer.php'; ?>