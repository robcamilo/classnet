<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ClassNet</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="gettemplates.co" />

	<!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FreeHTML5.co
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- <link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'> -->
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="<?= base_url('assets/css/animate.css') ?>">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="<?= base_url('assets/css/icomoon.css') ?>">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>">

	<!-- Theme style  -->
	<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/my_style.css') ?>">

	<!-- Modernizr JS -->
	<script src="<?= base_url('assets/js/modernizr-2.6.2.min.js') ?>"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="container">
			<div class="row">
				<div class="col-xs-2">
					<div id="fh5co-logo"><a href="<?= base_url('/')?>">ClassNet.</a></div>
				</div>
				<div class="col-xs-10 text-right menu-1">
					<ul>
						<li><a href="<?= base_url('/')?>">Home</a></li>
						<li><a href="<?= base_url('work')?>">Work</a></li>
						<li><a href="<?= base_url('about')?>">About</a></li>
						<li class="has-dropdown">
							<a href="<?= base_url('services')?>">Services</a>
							<ul class="dropdown">
								<li><a href="#">Web Design</a></li>
								<li><a href="#">eCommerce</a></li>
								<li><a href="#">Branding</a></li>
								<li><a href="#">API</a></li>
							</ul>
						</li>
						<li class="has-dropdown">
							<a href="#">Tools</a>
							<ul class="dropdown">
								<li><a href="#">HTML5</a></li>
								<li><a href="#">CSS3</a></li>
								<li><a href="#">Sass</a></li>
								<li><a href="#">jQuery</a></li>
							</ul>
						</li>
						<li><a href="<?= base_url('contact')?>">Contact</a></li>
						<?php if (isset($_SESSION['email']) && $_SESSION['logged_in'] === true) : ?>
							<li class="btn-cta"><a href="<?= base_url('logout') ?>"><span>Salir</span></a></li>
						<?php else : ?>
							<li class="btn-cta"><a href="<?= base_url('reglog')?>"><span>Registrate</span></a></li>
							<li class="btn-cta"><a href="<?= base_url('loginreg')?>"><span>Iniciar Sesión</span></a></li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
			
		</div>
	</nav>

	<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(<?= base_url('assets/images/img_bg_2.jpg')?>);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1 style="font-size:35px">Registrate para dar clases</h1>
							<h2>Gana dinero extra en tu tiempo libre</h2>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	
<div id="fh5co-contact">
	<div class="container">
		<div class="row">
				<?php if (validation_errors()) : ?>
				<div class="col-md-12">
					<div class="alert alert-danger" role="alert">
						<?= validation_errors() ?>
					</div>
				</div>
				<?php endif; ?>
				<?php if (isset($error)) : ?>
				<div class="col-md-12">
					<div class="alert alert-danger" role="alert">
					<?= $error ?>
					</div>
				</div>
				<?php endif; ?>
			

			<div class="col-md-4"> </div>
				<div class="col-md-4 col-md text-center animate-box ">
					<h1 style="color:#F35F55"><strong>ClassNet</strong></h1>
					<h3 style="color:#F35F55">Registro</h3>

					<!-- <form action="registerprof" method="POST"> -->
						<?= form_open() ?>
						<div class="row form-group">
							<div class="col-md-6">
								<!-- <label for="fname">First Name</label> -->
								<input type="text" id="fname" class="form-control" placeholder="Nombre" name="name">
							</div>
							<div class="col-md-6">
								<!-- <label for="lname">Last Name</label> -->
								<input type="text" id="lname" class="form-control" placeholder="Apellido" name="lastname">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-4">
								<!-- <label for="fname">First Name</label> -->
								<input list="sexo" type="text" id="gen" class="form-control" placeholder="Sexo" name="sex">
								<datalist id="sexo">
							    <option value="Femenino"></option>
							    <option value="Masculino"></option>
							    
								</datalist>		
							</div>

							<div class="col-md-8">
								<!-- <label for="lname">Last Name</label> -->
								<input type="text" id="adress" class="form-control" placeholder="Direccion" name="adress">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="subject">Subject</label> -->
								<input type="number" id="phone" class="form-control" placeholder="Telefono" name="phone" value="">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="subject">Subject</label> -->
								<input type="email" id="email" class="form-control" placeholder="Correo electronico" name="email">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="subject">Subject</label> -->
								<input type="password" id="password" class="form-control" placeholder="Crear contraseña" name="password">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="subject">Subject</label> -->
								<input type="password" id="password_confirm" class="form-control" placeholder="Confirmar contraseña" name="password_confirm">
							</div>
						</div>
						<div class="form-group">
							<input type="submit" value="Register" class="btn btn-primary">
						</div>

					</form>	
	
				</div>
				<div class="col-md-4"> </div>
		</div>
			
	</div>
</div>

	

	<footer id="fh5co-footer" role="contentinfo">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-4 fh5co-widget">
					<h3>King.</h3>
					<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
					<p><a href="#">Learn More</a></p>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<ul class="fh5co-footer-links">
						<li><a href="#">About</a></li>
						<li><a href="#">Help</a></li>
						<li><a href="#">Contact</a></li>
						<li><a href="#">Terms</a></li>
						<li><a href="#">Meetups</a></li>
					</ul>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<ul class="fh5co-footer-links">
						<li><a href="#">Shop</a></li>
						<li><a href="#">Privacy</a></li>
						<li><a href="#">Testimonials</a></li>
						<li><a href="#">Handbook</a></li>
						<li><a href="#">Held Desk</a></li>
					</ul>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<ul class="fh5co-footer-links">
						<li><a href="#">Find Designers</a></li>
						<li><a href="#">Find Developers</a></li>
						<li><a href="#">Teams</a></li>
						<li><a href="#">Advertise</a></li>
						<li><a href="#">API</a></li>
					</ul>
				</div>
			</div>

			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small> 
						<small class="block">Designed by <a href="http://freehtml5.co/" target="_blank">FreeHTML5.co</a> Demo Images: <a href="http://unsplash.com/" target="_blank">Unsplash</a></small>
					</p>
					<p>
						<ul class="fh5co-social-icons">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
				</div>
			</div>

		</div>
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
	<!-- jQuery Easing -->
	<script src="<?= base_url('assets/js/jquery.easing.1.3.js') ?>"></script>
	<!-- Bootstrap -->
	<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
	<!-- Waypoints -->
	<script src="<?= base_url('assets/js/jquery.waypoints.min.js') ?>"></script>
	<!-- Main -->
	<script src="<?= base_url('assets/js/main.js') ?>"></script>

	</body>
</html>

