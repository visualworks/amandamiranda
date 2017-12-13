<?php
/**
 * Theme Header
 * @package Amanda Miranda
 * @author MG Studio
 **/
?><!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<title><?php wp_title( ' | ', true, 'right' ); ?> Amanda Miranda</title>
	<link rel="shortcut icon" type="image/png" href="favicon.png"/>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>

		<!-- Navigation -->
		<nav class="navbar navbar-header navbar-fixed-top" role="navigation">
			<div class="container-fluid">

				<div class="col-md-4"><a class="navbar-brand" href="<?php echo home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png" /></a></div>

				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->

				<div class="social-icons navbar-right">
					<ul>
						<li>
							<a href="https://www.facebook.com/Amanda-Miranda-Arquitetura-197887706953222/?fref=ts" class="icon-facebook small yellow" target="_blank"></a>
						</li>
						<li>
							<a href="https://www.instagram.com/AmandaMirandaArquitetura/" class="icon-instagram small yellow" target="_blank"></a>
						</li>
					</ul>
				</div>

				<div class="collapse navbar-collapse navbar-right navbar-inverse" id="bs-example-navbar-collapse-1">
				<?php

				$args = array(
						'menu' => 'main',
						'container' => false,
						'menu_class' => 'nav navbar-nav',
						'menu_id' => 'main-menu',
				);
				wp_nav_menu( $args );
				 /*************
					<ul class="nav navbar-nav">
						<li>
							<a href="index.html">Home</a>
						</li>
						<li>
							<a href="perfil.html">Perfil</a>
						</li>
						<li>
							<a href="projetos.html">Projetos</a>
						</li>
						<li>
							<a href="midia.html">Mídia</a>
						</li>
						<li class="last">
							<a href="contato.html">Contato</a>
						</li>
					</ul>
				**********/ ?>
				</div>
				<!-- /.navbar-collapse -->


			</div>
			<!-- /.container -->
		</nav>
