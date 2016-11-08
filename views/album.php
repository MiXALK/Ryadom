<?php include ROOT . '/views/header.php'; ?>

    <li><a href="/">Главная</a></li>
    <li><a href="/news/">Новости</a></li>
    <li><a href="/video/p1">Видео</a></li>
    <li><a href="/album/" class="selected">Фотоальбомы</a>
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
			<h2>Фотоальбомы</h2>
            
                <div id = "carousel1" style="width:1366px; height:295px;background:none;overflow:scroll; margin-top: 20px; padding-left: 200px">
                    <!-- All images with class of "cloudcarousel" will be turned into carousel items -->
                    <!-- You can place links around these images -->
                    <?php foreach ($album as $albumItem):?>

                    <a href="/album/<?php echo $albumItem['id_gallery'];?>/p1" rel="lightbox"><img class="cloudcarousel" src="<?php echo $albumItem['cover'];?>" alt="<?php echo $albumItem['gallery_name'];?>" title="<?php echo $albumItem['gallery_name'];?>" /></a>

                    <?php endforeach;?>
                </div>

                <!-- Define left and right buttons. -->
                <center>
                <input id="slider-left-but" type="button" value="" />
                <input id="slider-right-but" type="button" value="" />
                </center>
    </div>

            
            <div class="cleaner"></div>
</div> <!-- END of templatemo_main -->

<?php include ROOT . '/views/footer.php'; ?>