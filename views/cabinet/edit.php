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

            <div class="col-sm-4 col-sm-offset-4 padding-right">
                
                <?php if ($result): ?>
                    <p>Данные отредактированы!</p>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <div class="signup-form"><!--sign up form-->
                        <h2>Редактирование данных</h2>
                        <form action="#" method="post">
                            <p>Имя:</p>
                            <input type="text" name="name" placeholder="Имя" value="<?php echo $name; ?>"/>
                            
                            <p>Пароль:</p>
                            <input type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/>
                            <br/>
                            <br/>

                            <input type="submit" name="submit" class="btn btn-default" value="Сохранить" />
                        </form>
                    </div><!--/sign up form-->
                
                <?php endif; ?>
                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>

    <div class="cleaner"></div>
</div> <!-- END of templatemo_main -->

<?php include ROOT . '/views/footer.php'; ?>