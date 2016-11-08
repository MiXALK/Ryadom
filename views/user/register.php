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
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">
                
                <?php if ($result): ?>
                    <p>Вы зарегистрированы!</p>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <div class="signup-form"><!--sign up form-->
                        <h2>Регистрация на сайте</h2>
                        <form action="#" method="post">
                            <input type="text" name="name" placeholder="Имя" value="<?php echo $name; ?>"/> </br></br>
                            <input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/> </br></br>
                            <input type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/> </br></br>
                            <input type="submit" name="submit" class="btn btn-default" value="Зарегистироваться" /> </br></br>
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