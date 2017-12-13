<?php
/**
 * Página de perfil
 *
 * @package Amanda Miranda
 * @version 1.0
 */
get_header();
the_post();
?>
	<div class="box-title">

		<div class="row nopadding">
			<div class="col-md-4 col-sm-12 col-xs-12 title">
				<h2><?php the_title(); ?></h2>
			</div>
			<div class="col-md-8 col-sm-12 col-xs-12 description">
				<?php the_content(); ?>
			</div>
		</div>

	</div>

	<div class="perfil-content">
		<div class="wrap">
			<div class="servicos">
				<div class="title">Serviços</div>
				<div class="description">
				<?php foreach( get_field( 'serviços' ) as $s ) : ?>
					<p><?php echo $s['tipo']; ?></p>
				<?php endforeach; ?>
				</div>
			</div>
			<div class="equipe">
				<div class="title">Equipe</div>
				<div class="description">
				<?php foreach ( get_field( 'equipe' ) as $e ) : ?>
					<p>
					<strong><?php echo $e['nome']; ?></strong>
					<?php echo $e['info']; ?>
					</p>
				<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>

	<div class="row nopadding"></div>


	<div class="perfil-content-2">
		<div class="row-fluid line left opacity-zero">
			<div class="col-md-6 col-xs-6 nopadding">
				<div class="title">
					<div class="title-content">
						<h2>Amplos<br /><span class="medium">e</span><span class="small">funcionais</span></h2>
						<?php the_field( 'texto' ); ?>
					</div>
				</div>
			</div>
			<div class="image col-md-6 col-xs-6">
				<?php $img = get_field( 'imagem' ); ?>
				<img src="<?php echo $img['sizes']['perfil-1']; ?>" />
			</div>
			<div class="row nopadding"></div>
		</div>
		<div class="row-fluid line right opacity-zero">
			<div class="image col-md-6 col-xs-6">
				<?php $img = get_field( 'imagem_2' ); ?>
				<img src="<?php echo $img['sizes']['perfil-2']; ?>" />
			</div>
			<div class="col-md-6 col-xs-6 nopadding">
				<div class="title">
					<div class="title-content">
						<h2><span class="medium">Cores<br/>Linha retas<br /></span><span class="medium">e</span><span class="small">funcionais</span></h2>
						<?php the_field( 'texto' ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row nopadding"></div>

	<div class="row text-center depoimento">
		<?php the_field( 'depoimento' ); ?>
	</div>

<?php get_footer(); ?>
