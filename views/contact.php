<?php include ROOT . '/views/header.php'; ?>

    <li><a href="/">Главная</a></li>
    <li><a href="/news/">Новости</a></li>
    <li><a href="/video/p1">Видео</a></li>
    <li><a href="/album/">Фотоальбомы</a>
    <li><a href="/contact/" class="selected">О компании</a></li>
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
	
    <h2>О компании</h2>
        <div class="half float_l">

            <?php if ($result): ?>
                <p>Сообщение отправлено! Мы ответим Вам на указанный email.</p>
            <?php else: ?>
                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>


    <h4>Здесь Вы можете оставить своё сообщение для нас</h4>

            <div id="contact_form">
               <form method="post" name="contact" action="#">
                        
                        <label for="email">Ваш Email:</label> <input type="email" id="email" name="userEmail" class="validate-email required input_field" placeholder="E-mail" value="<?php echo $userEmail; ?>"/>
                        <div class="cleaner h10"></div>
                        
						<label for="subject">Тема:</label> <input type="text" name="subject" id="subject" class="input_field" placeholder="Тема"/>

						<div class="cleaner h10"></div>
        
                        <label for="text">Сообщение:</label> <textarea id="text" name="userText" rows="0" cols="0" class="required"> <?php echo $userText; ?> </textarea>
                        <div class="cleaner h10"></div>
                        
                        <input type="submit" value="Отправить" id="submit" name="submit" class="submit_btn float_l"/>
						<input type="reset" value="Сбросить" id="reset" name="reset" class="submit_btn float_r" />
                        
            	</form>
            </div>
            <?php endif; ?>
		</div>
        <div class="half float_r">
        	<h4>Найти наc очень просто</h4>
          		Могилёвская обл., г. Бобруйск,<br>
                  ул. Западная, д. 19в<br>
                  <br>

			<strong>Phone:</strong> +375-44-7591012 (Velcom)<br>
            <strong>Email:</strong> <a href="mailto:olalogan@mail.ru">Olalogan@mail.ru</a>  <br />
            
        </div>
        
        <div class="cleaner h40"></div>

    <iframe width="1360" height="340" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1924.0864232057945!2d29.171800390019804!3d53.168043972993836!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46d731459687ce39%3A0xaadd76f86db7e4d9!2z0YPQuy4g0JfQsNC_0LDQtNC90LDRjyAxOSwg0JHQvtCx0YDRg9C50YHQuiwg0JHQtdC70LDRgNGD0YHRjA!5e0!3m2!1sru!2sru!4v1456089024291" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>

    	<div class="cleaner"></div>
    
    <div class="cleaner"></div>
</div> <!-- END of templatemo_main -->

<?php include ROOT . '/views/footer.php'; ?>