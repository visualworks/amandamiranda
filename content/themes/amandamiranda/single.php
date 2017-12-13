<?php
/**
 * Página individual de projeto
 *
 * @package Amanda Miranda
 *
 * @version 1.0
 */
get_header();

if( have_posts() ) : the_post();
?><!-- Full Page Image Background Carousel Header -->
<header id="myCarousel" class="carousel slide">
	<?php
	$banner = wp_get_attachment_image_src( get_post_thumbnail_id(), 'home-banner' );
	?>
	<!-- Wrapper for Slides -->
	<div class="carousel-inner">
		<div class="item active">
			<div class="fill" style="background-image:url('<?php echo $banner[0]; ?>');">
				<div class="overlay"></div>
			</div>
			<div class="carousel-caption">
				<?php $cat = get_the_category(); ?>
				<div class="category">Projetos <?php echo $cat[0]->name; ?></div>
				<h2><?php the_title(); ?></h2>
				<hr />
				<a href="<?php echo home_url( 'projetos' ); ?>" class="back"><span class="glyphicon glyphicon-menu-left"></span> Voltar</a>
			</div>
		</div>
	</div>

	<div class="projeto-info">
		<div class="col-sm-6 col-xs-12">
			<ul class="local-ano">
			<?php if( get_field( 'local' ) ) : ?>
				<li><strong>Local</strong> <?php the_field( 'local' ); ?></li>
			<?php endif; ?>
			<?php if( get_field( 'ano' ) ) : ?>
				<li><strong>Ano</strong> <?php the_field( 'ano' ); ?></li>
			<?php endif; ?>
			</ul>
		</div>
		<div class="col-sm-6 col-xs-12">
			<ul class="redes-sociais">
				<li class="title first">Compartilhar</li>
				<li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( get_the_permalink() ); ?>" class="icon-facebook"></a></li>
				<li><a target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo urlencode( get_the_permalink() ); ?>&amp;text=<?php echo urlencode( get_the_title() . ' - Amanda Miranda Arquitetura' ); ?>" class="icon-twitter"></a></li>
				<li><a target="_blank" href="https://plus.google.com/share?url=<?php echo urlencode( get_the_permalink() ); ?>" class="icon-google-plus"></a></li>
				<li><a target="_blank" href="http://www.linkedin.com/shareArticle?url=<?php echo urlencode( get_the_permalink() ); ?>&amp;title==<?php echo urlencode( get_the_title() . ' - Amanda Miranda Arquitetura' ); ?>" class="icon-linkedin"></a></li>
				<li class="last"><a target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=Amanda%20Miranda%20Arquitetura&amp;description=Amanda%20Miranda%20Arquitetura" class="icon-pinterest"></a></li>
			</ul>
		</div>
	</div>

</header>

<?php if ( $imgs = get_field( 'imagens' ) ) : ?>
<div class="row-fluid projetos-row">
	<div class="projetos" id="projetos">
	<?php foreach ( $imgs as $img ) : ?>
		<div class="box mix">
			<div class="boxInner">
				<a href="<?php echo $img['sizes']['huge'] ?>" class="fancybox" rel="group"><img src="<?php echo $img['sizes']['projetos-th'] ?>" />
					<div class="details"></div>
				</a>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</div>
<?php endif; ?>
<div class="row nopadding"></div>
<?php endif; ?>
<?php get_footer(); ?>
