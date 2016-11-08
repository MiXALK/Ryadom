<!-- Подключаем header -->
<?php include ROOT . '/views/header.php'; ?>

                <li><a href="/" class="selected">Главная</a></li>
                <li><a href="/news/">Новости</a></li>
                <li><a href="/video/p1">Видео</a></li>
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

        </ul><br>

    </div> <!-- Конец templatemo_menu -->
	
    <div class="cleaner"></div>
	
</div>	<!-- Конец templatemo_header_wrapper -->

<div id="templatemo_slider">

	<!-- Это контейнер для карусели. -->
	<div id = "carousel1" style="width:1366px; height:295px;background:none;overflow:scroll; margin-top: 10px; padding-left: 200px">

        <!-- Все изображения в class "cloudcarousel" будут вращаться в карусели. К этим изображениям можно привязать ссылки -->
        <?php foreach ($album as $albumItem):?>

            <a href="/album/<?php echo $albumItem['id_gallery'];?>/p1" rel="lightbox"><img class="cloudcarousel" src="<?php echo $albumItem['cover'];?>" alt="<?php echo $albumItem['gallery_name'];?>" title="<?php echo $albumItem['gallery_name'];?>" /></a>

        <?php endforeach;?>

    </div>
    
    <!-- Определить левую и правую кнопки. -->
    <center>
		<input id="slider-left-but" type="button" value="" />
		<input id="slider-right-but" type="button" value="" />
    </center>
	
</div>

<div id="templatemo_main">
	
    <div class="col one_third fp_services">
    <h2>ДОБРО ПОЖАЛОВАТЬ!</h2>
        <img src="https://pp.vk.me/c627729/v627729903/3de86/Eea367Vr3to.jpg" alt="Фото" class="image_fl" />
        <p>Спасибо, что зашли к фотографам
            Евгению и Ольге. Вы хотите хорошие фотографии? Хотите что бы фотограф
            Вам был и другом и собеседником и смог вас раскрыть такими, какие вы себе больше всего нравитесь?
            Хотите обрадоваться фотографиям? Ну конечно! Для этого Вам надо с нами познакомиться и встретиться!
            Свадебные фото и не только.</p>
    </div>
	
    <div class="col two-third fp_services">
	
        <h2><a href="/news/">СВЕЖИЕ НОВОСТИ</h2>


        <div class="rp_pp">

            <?php foreach ($news as $newsItem):?>

                <img src="<?php echo $newsItem['image'];?>" width=19% alt="Image"/>
                <?php

                if (!empty($newsItem['image1'])) {
                    echo '<img src="'.$newsItem['image1'].'" width=18% alt="Фото новости" />';
                };
                ?>
                <span class="more_but"><a href="/news/p1#top" class="more"><?php echo $newsItem['title'];?></a></span>
            <p><?php echo $newsItem['date'];?></p>


            <div class="cleaner"></div>

            <?php endforeach;?>

        </div>

    </div>
	
    <div class="col one_third no_margin_right fp_services">
        
        <h2>ОТЗЫВЫ</h2>
		
        <div class="testimonial">
            <p>Восхтительное фото! Счастье есть- это плоды нашей любви!!!!Оля, браво!</p>
            <cite>Алена Арсентьева<a href="http://vk.com/lanabobruisk"><span>- Руководитель проекта Восточные танцы в Бобруйске. Студия "Лана"</span></a></cite></div>
    	<div class="testimonial">
            <p>Фотографироваться у Вас очень приятно и весело. Настоящий художественный подход и виденье личности фотографируемых. Вы отличная пара и настоящая команда. Успехов Вам!!!</p>
    		<cite>Михиаил и Наталья<a href="#"><span></span></a></cite></div>
			
    </div>
    
    <div class="cleaner"></div>
</div> <!-- Конец templatemo_main -->

<!-- Подключаем footer -->
<?php include ROOT . '/views/footer.php'; ?>