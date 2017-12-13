<?php
/**
 * Página principal
 *
 * @package Amanda Miranda
 *
 * @version 1.0
 */
get_header();
?><div class="filters">

<div class="row-fluid">
	<div class="col-md-4 col-sm-4 col-xs-12 title">
		<h2>Projetos</h2>
	</div>
	<div class="col-md-8 col-sm-8 col-xs-12 filters-list">
		<?php
		$cats = get_categories(
			array(
				'type' => 'post',
				'orderby' => 'id',
			)
		);
		$i = 2;
		?>
		<ul>
			<li><a href="javascript:void(0);" class="filter" data-filter="all"><strong>01/</strong> Todos</a></li>
		<?php foreach ( $cats as $c ) : ?>
			<li><a href="javascript:void(0);" class="filter" data-filter=".<?php echo $c->slug; ?>"><strong><?php printf( "%02d", $i ); ?>/</strong> <?php echo $c->name; ?></a></li>
		<?php $i++; endforeach; ?>
		</ul>
	</div>
</div>

</div>
<?php if ( have_posts() ) : ?>
<div class="row-fluid projetos-row">
	<div class="projetos" id="projetos">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php $cat = get_the_category(); ?>
		<div class="box mix <?php echo $cat[0]->slug; ?>">
			<div class="boxInner">
				<a href="<?php echo the_permalink(); ?>">
					<?php the_post_thumbnail( 'projetos-th' ); ?>
					<div class="details">
						<div class="details-content">
							<div class="category"><?php echo $cat[0]->name; ?></div>
							<div class="title"><?php the_title(); ?></div>
						</div>
					</div>
				</a>
			</div>
		</div>
	<?php endwhile; ?>
	</div>
</div>
<?php endif; ?>

<div class="row nopadding"></div>
<?php get_footer(); ?>
