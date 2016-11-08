<?php include ROOT . '/views/header.php'; ?>

            <li><a href="/">Главная</a></li>
            <li><a href="/news/">Новости</a></li>
            <li><a href="/video/p1">Видео</a></li>
            <li><a href="/album" class="selected">Фотоальбомы</a>
                <ul>

                    <li><span class="top"></span><span class="bottom"></span></li>
                        <?php foreach ($album as $albumItem):?>
                    <li><a href="/album/<?php echo $albumItem['id_gallery'];?>/p1"><?php echo $albumItem['gallery_name'];?></a></li>
                        <?php endforeach;?>

                </ul>
            </li>
                <li><a href="/contact/">О компании</a></li>
                    <br><br>

            <?php if (User::isGuest()): ?>
                <li><a href="/user/login/">Вход</a></li>
                <li><a href="/user/register/">Регистрация</a></li>

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

        <div class="container">

            <div class="gallery">
                <?php foreach ($fotoGallery as $galleryItem):?>
                    <a href="<?php echo $galleryItem['image'];?>" class="simple-lightbox"><img src="<?php echo $galleryItem['image'];?>" alt="" title="<?php echo $galleryItem['gallery_name'];?>"/></a>
                <?php endforeach;?>

                <div class="clear"></div>

            </div>

            <link rel="stylesheet" href="/views/css/main.css" />

            <!-- Постраничная навигация -->
            <!-- Pagination -->
            <div class="pagination">
                <!--<a href="#" class="button previous">Previous Page</a>-->

                <?php echo $pagination->get();?>

            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script type="text/javascript" src="/views/js/simple-lightbox.js"></script>
        <script>
            $(function(){
                var $gallery = $('.gallery a').simpleLightbox();

                $gallery.on('show.simplelightbox', function(){
                        console.log('Requested for showing');
                    })
                    .on('shown.simplelightbox', function(){
                        console.log('Shown');
                    })
                    .on('close.simplelightbox', function(){
                        console.log('Requested for closing');
                    })
                    .on('closed.simplelightbox', function(){
                        console.log('Closed');
                    })
                    .on('change.simplelightbox', function(){
                        console.log('Requested for change');
                    })
                    .on('next.simplelightbox', function(){
                        console.log('Requested for next');
                    })
                    .on('prev.simplelightbox', function(){
                        console.log('Requested for prev');
                    })
                    .on('nextImageLoaded.simplelightbox', function(){
                        console.log('Next image loaded');
                    })
                    .on('prevImageLoaded.simplelightbox', function(){
                        console.log('Prev image loaded');
                    })
                    .on('changed.simplelightbox', function(){
                        console.log('Image changed');
                    })
                    .on('nextDone.simplelightbox', function(){
                        console.log('Image changed to next');
                    })
                    .on('prevDone.simplelightbox', function(){
                        console.log('Image changed to prev');
                    })
                    .on('error.simplelightbox', function(e){
                        console.log('No image found, go to the next/prev');
                        console.log(e);
                    });
            });
        </script>

        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->

<?php include ROOT . '/views/footer.php'; ?>