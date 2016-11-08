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

        <div class="half float_l">

                <ol >
                    <li><a href="/admin/">Админпанель</a></li>
                    <li><a href="/admin/news/">Управление новостями</a></li>
                </ol>

            <h3><img src="/views/images/plus.png"/>Добавить новую новость</h3>
            <br>

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

                <div>
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Заголовок новости</p>
                        <input class="largeInput" type="text" name="title" placeholder="" value=""><br><br>

                        <p>Содержимое новости</p>
                        <textarea id="text" name="content" rows="10" cols="100" class="required" value="content"></textarea>

                        <p>Автор новости</p>
                        <select name="admin">
                            <?php if (is_array($adminList)): ?>
                                <?php foreach ($adminList as $admin): ?>
                                    <option value="<?php echo $admin['name']; ?>">
                                        <?php echo $admin['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select><br><br>

                        <p>Cсылка на фото для новости</p>
                        <input class="largeInput" type="text" name="image" placeholder="" value=""><br><br>
                        
                        <p>Cсылка на фото для новости</p>
                        <input class="largeInput" type="text" name="image2" placeholder="" value=""><br><br>
                        
                        <p>Cсылка на фото для новости</p>
                        <input class="largeInput" type="text" name="image3" placeholder="" value=""><br><br>

                        <br><br>

                        <input type="submit" name="submit" value="Сохранить">

                        <br/><br/>

                    </form>
                </div>
        </div>

    </div>
</section>

    <div class="cleaner"></div>
</div> <!-- END of templatemo_main -->

<?php include ROOT . '/views/footer.php'; ?>