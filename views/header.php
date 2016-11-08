<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		
		<title>Ryadchenko E&O</title>

		<link href="/views/css/templatemo_style.css" rel="stylesheet" type="text/css" />
		<link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
		<link href='/views/css/simplelightbox.css' rel='stylesheet' type='text/css'>
		<link href='/views/css/demo.css' rel='stylesheet' type='text/css'>
		<link href="/views/css/ddsmoothmenu.css" rel= "stylesheet" type="text/css"  />

		<script type="text/javascript" src="/views/js/jquery-1-4-2.min.js"></script>
		<script type="text/javascript" src="/views/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="/views/js/showhide.js"></script>
		<script type="text/JavaScript" src="/views/js/jquery.mousewheel.js"></script>
		<script type="text/javascript" src="/views/js/jquery.min.js"></script>
		<script type="text/javascript" src="/views/js/ddsmoothmenu.js"></script>
		<script type="text/javascript" src="/views/js/simple-lightbox.js"></script>
		<script type="text/javascript">

			ddsmoothmenu.init({
				mainmenuid: "templatemo_menu", //меню DIV id
				orientation: 'h', //Горизонтальное или вертикальное меню: устанавливается через "h" или "v"
				classname: 'ddsmoothmenu', //class added to menu's outer DIV
				contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
			})

		</script>

		<!-- Загрузка файла CloudCarousel JavaScript -->
		<script type="text/JavaScript" src="/views/js/cloud-carousel.1.0.5.js"></script>

		<script type="text/javascript">
			$(document).ready(function(){

				// This initialises carousels on the container elements specified, in this case, carousel1.
				$("#carousel1").CloudCarousel(
					{
						reflHeight: 100,
						reflGap: 4,
						titleBox: $('#da-vinci-title'),
						altBox: $('#da-vinci-alt'),
						buttonLeft: $('#slider-left-but'),
						buttonRight: $('#slider-right-but'),
						yRadius: 50,
						xPos: 480,
						yPos: 32,
						speed:0.1,
						autoRotate: "yes",
						autoRotateDelay: 4500
					}
				);
			});

		</script>
		<style>
			.swiper-container {
				width: 1000px;
				height: 700px;
				position: absolute;
				left: 50%;
				top: 50%;
				margin-left: -150px;
				margin-top: -150px;
			}
			.swiper-slide {
				background-position: center;
				background-size: cover;
			}
		</style>

	</head>

<body id="home">

	<div id="templatemo_header_wrapper">
	
		<div id="site_title"><h1><a href="/">Ryadchenko E&O</a></h1></div>
		<div id="templatemo_menu" class="ddsmoothmenu">
			<ul>