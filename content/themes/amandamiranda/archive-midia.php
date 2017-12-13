<?php
/**
 * Página de mídia
 *
 * @package Amanda Miranda
 * @version 1.0
 */
get_header();
$hoje = date( 'Y' );
?>
<div class="filters">

	<div class="row-fluid">
		<div class="col-md-4 col-sm-4 col-xs-12 title">
			<h2>Mídia</h2>
		</div>
		<div class="col-md-8 col-sm-8 col-xs-12 filters-list">
			<ul>
				<li><a href="javascript:void(0);" class="filter" data-filter="all"><strong>01/</strong> Todos</a></li>
				<li><a href="javascript:void(0);" class="filter" data-filter=".ano-<?php echo $hoje; ?>"><strong>02/</strong><?php echo $hoje; ?> - 2014</a></li>
				<li><a href="javascript:void(0);" class="filter" data-filter=".ano-2013"><strong>03/</strong> 2013 - 2010</a></li>
				<li class="last"><a href="javascript:void(0);" class="filter" data-filter=".ano-2009"><strong>04/</strong> 2009 - 2005</a></li>
			</ul>
		</div>
	</div>

</div>

<div class="row-fluid midia-row">
	<div class="midias" id="midias">
	<?php if ( have_posts() ) :
		while ( have_posts() ) : the_post(); ?>
		<?php
		$ano = date ( 'Y', strtotime( get_field( 'data' ) ) );
		if ( $ano <= 2009 ) {
			$class = 'ano-2009';
		} else if ( $ano <= 2013 ) {
			$class = 'ano-2013';
		} else {
			$class = 'ano-'.$hoje;
		}
		?>
		<div class="box mix left md-left <?php echo $class; ?>">
			<div class="boxInner">
			<?php $imgs = get_field( 'imagem' ); ?>
				<a href="<?php echo $imgs[0]['sizes']['huge']; ?>" class="fancybox" rel="group-<?php the_ID(); ?>">
					<div class="image">
						<img src="<?php echo $imgs[0]['sizes']['projetos-th']; ?>" alt="<?php the_title(); ?>" />
					</div>
					<div class="details">
						<div class="category"><?php echo date( 'm.Y', strtotime( get_field( 'data' ) ) ); ?></div>
						<div class="title"><?php the_title(); ?></div>
					</div>
				</a>
				<?php for ( $i=1; $i<count($imgs); $i++ ) : ?>
					<a href="<?php echo $imgs[$i]['sizes']['huge']; ?>" class="fancybox" rel="group-<?php the_ID(); ?>"></a>
				<?php endfor; ?>
			</div>
		</div>
		<?php endwhile; ?>
	<?php endif; ?>
	</div>
</div>


<div class="row nopadding"></div>
<?php get_footer(); ?>
