<?php include ROOT . '/views/header.php'; ?>

                    <li><a href="/">Главная</a></li>
                    <li><a href="/news/">Новости</a></li>
                    <li><a href="/video/p1" class="selected">Видео</a></li>
                    <li><a href="/album/">Фотоальбомы</a>
                    <li><a href="/contact/">О компании</a></li>
                        <br><br>

                <?php if (User::isGuest()): ?>
                    <li><a href="/user/login/">Вход</a></li>
                    <li><a href="/user/register/">Регистрация</a></li>

                <?php else: ?>
                    <li><a href="/cabinet/">Аккаунт</a></li>
                    <li><a href="/user/logout/">Выход</a></li>
                <?php endif; ?>

            </ul>
                <br>

        </div> <!-- end of templatemo_menu -->
        <div class="cleaner"></div>

    </div>	<!-- END of templatemo_header_wrapper -->

    <div id="templatemo_main">

        <div class="container">


        <h2>Видео</h2>

            <?php foreach ($videoList as $videoItem):?>

                <div class="col one_fourth gallery_box">
                    <?php echo $videoItem['ref_youtube'];?>
                    <h4><?php echo $videoItem['title'];?></h4>
                </div>

            <?php endforeach;?>
        </div>

                <div class="cleaner"></div>

        <link rel="stylesheet" href="/views/css/main.css" />

        <!-- Постраничная навигация -->
        <!-- Pagination -->
        <div class="pagination">
            <!--<a href="#" class="button previous">Previous Page</a>-->

            <?php echo $pagination->get();?>

        </div>

        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->

<?php include ROOT . '/views/footer.php'; ?>