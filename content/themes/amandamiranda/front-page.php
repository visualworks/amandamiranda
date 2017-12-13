<?php
/**
 * Página inicial
 *
 * @package Amanda Miranda
 * @version 1.0
 */
get_header();
?>
	<!-- Full Page Image Background Carousel Header -->
	<header id="myCarousel" class="carousel slide">

		<!-- Wrapper for Slides -->
		<div class="carousel-inner">
		<?php $slides = get_field( 'slides' ); ?>

		<?php $i=0; foreach ( $slides as $s ) : ?>
			<div class="item<?php if ( $i == 0 ) echo ' active'; ?>">
				<a href="<?php echo get_the_permalink( $s['projeto']->ID ); ?>">
				<?php
					if ( ! $s['imagem'] ) {
						$banner = wp_get_attachment_image_src( get_post_thumbnail_id( $s['projeto']->ID ), 'home-banner' );
						$banner = $banner[0];
					} else {
						$banner = $s['imagem']['sizes']['home-banner'];
					}
				?>
					<div class="fill" style="background-image:url('<?php echo $banner; ?>');">
						<div class="overlay"></div>
					</div>
					<div class="carousel-caption">
						<h2><?php echo $s['projeto']->post_title; ?></h2>
					</div>
				</a>
			</div>
		<?php $i++; endforeach; ?>
		</div>

		<div class="bot-scroll-down"><a href="#portifolio-home"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/bot-scroll-down.png"></a></div>

		<!-- Controls -->
			<!--
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				<span class="icon-prev"></span>
			</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">
				<span class="icon-next"></span>
			</a>
		-->

	</header>

	<div class="portifolio-home" id="portifolio-home">

		<!-- Define all of the tiles: -->
		<div class="box box-title">
			<div class="boxInner">
				<h2>Últimos projetos</h2>
				<h3>Em destaque</h3>
			</div>
		</div>
		<?php
		$destaque = get_field( 'destaques' );
		if( $destaque ) :
			foreach ( $destaque as $d ) :
		?>
		<div class="box">
			<div class="boxInner">
				<a href="<?php echo get_the_permalink( $d->ID ); ?>">
					<?php echo get_the_post_thumbnail( $d->ID, 'home-destaques' ); ?>
					<div class="details">
						<div class="category"><?php $cat = get_the_category( $d->ID ); echo $cat[0]->name; ?></div>
						<div class="title"><?php echo get_the_title( $d->ID ); ?></div>
					</div>
				</a>
			</div>
		</div>
		<?php
			endforeach;
		endif;
		?>	</div>

	<div id="instafeed" class="redes-sociais-home">
		<div class="box box-title">
			<div class="boxInner">
				<h2>Siga-nos</h2>
				<h3>Nas redes
					<span>
						<a href="" class="icon-facebook small white"></a>
						<a href="" class="icon-instagram small white"></a>
					</span>
				</h3>
			</div>
		</div>
	</div>
<?php get_footer(); ?>
