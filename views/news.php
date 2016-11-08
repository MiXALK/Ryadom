<!DOCTYPE HTML>

<html>
    <head>
        <title>Ryadom-News</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="/views/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="/views/css/main.css" />
        <!--[if lte IE 8]><link rel="stylesheet" href="/views/css/ie8.css" /><![endif]-->
    </head>
    <body>
    
    <!-- Content -->
    <div id="content">
        <div class="inner">
    
            <!-- Post -->
            <?php foreach ($newsList as $newsItem):?>
            <article class="box post post-excerpt">
                <header>

                    <h2><?php echo $newsItem['title'];?></h2>

                </header>
                <div class="info">
                    <!--
                        Note: The date should be formatted exactly as it's shown below. In particular, the
                        "least significant" characters of the month should be encapsulated in a <span>
                        element to denote what gets dropped in 1200px mode (eg. the "uary" in "January").
                        Oh, and if you don't need a date for a particular page or post you can simply delete
                        the entire "date" element.
    
                    -->
                    <span class="date"><span class="month"><?php echo $newsItem['date'];?></span></span>
                                <ul>
									<li><span class="stats"><?php echo $newsItem['admin'];?></span></li>
								</ul>

                </div>

                <?php

                    if (!empty($newsItem['image'])) {
                                                    echo '<a href="#" class="image featured"><img src="'.$newsItem['image'].'" alt="Фото новости" /></a>';
                                                    };
                ?>

                <p>
                    <?php echo $newsItem['content'];?>
                </p>

                <?php

                if (!empty($newsItem['image1'])) {
                    echo '<a href="#" class="image featured2"><img src="'.$newsItem['image1'].'" alt="Фото новости" /></a>';
                };
                if (!empty($newsItem['image2'])) {
                    echo '<a href="#" name = "top" class="image featured2"><img src="'.$newsItem['image2'].'" alt="Фото новости" /></a>';
                };
                ?>

            </article>
            <?php endforeach;?>

            <!-- Pagination -->
            <div class="pagination">
                <!--<a href="#" class="button previous">Previous Page</a>-->
                
                    <?php echo $pagination->get();?>
                
            </div>
    
        </div>
    </div>
    
    <!-- Sidebar -->
    <div id="sidebar">
    
        <!-- Logo -->
        <h1 id="logo"><a href="/"></a></h1>
    
        <!-- Nav -->
        <nav id="nav">
            <h2><ul>
                <li><a href="/">Главная</a></li>
                <li><a href="/news/" class="selected">Новости</a></li>
                <li><a href="/video/p1">Видео</a></li>
                <li><a href="/album/">Фотоальбомы</a>
                <li><a href="/contact/">О компании</a></li>
            </ul></h2>
        </nav>

        <!-- Recent Posts -->
        <section class="box recent-posts">
            <ul>
                <?php if (User::isGuest()): ?>
                    <li><a href="/user/login/">Вход</a></li>
                    <li><a href="/user/register/">Регистрация</a></li>

                <?php else: ?>
                    <li><a href="/cabinet/">Аккаунт</a></li>
                    <li><a href="/user/logout/">Выход</a></li>
                <?php endif; ?>
            </ul>
        </section>
    
        <!-- Recent Comments -->
        <section class="box recent-comments">
            <header>
                <h2>Мы в Сети</h2>
            </header>
            <ul>
                <li><a href="http://vk.com/ryadchenkoeio"><img src="/views/images/ico-vkontakte.png" title="Вконтакте" alt="Вконтакте" /></a></li>
                <li><a href="https://www.youtube.com/watch?v=7Vm7Z28OqZA"><img src="/views/images/youtube.png" title="youtube" alt="youtube" /></a></li>

            </ul>
        </section>

        <!-- Copyright -->
        <ul id="copyright">
            <li><h2><a href="https://www.linkedin.com/in/mikhail-kantseliarchyk-92614b119?trk=hp-identity-name">Copyright © 2016 Mixal</a></h2></li>
        </ul>
    
    </div>
    
    <!-- Scripts -->
    <script src="/views/js/jquery.min2.js"></script>
    <script src="/views/js/skel.min.js"></script>
    <script src="/views/js/util.js"></script>
    <!--[if lte IE 8]><script src="/views/js/ie/respond.min.js"></script><![endif]-->
    <script src="/views/js/main.js"></script>
    
    </body>
</html>