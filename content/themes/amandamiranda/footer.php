<?php
/**
 * Theme Footer
 * @package Amanda Miranda
 * @author MG Studio
 **/
?><div class="footer">
	<div class="footer-content">
		<div class="col-sm-6 col-xs-12">
			<div class="logo-short"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-short.png"></div>
			<div class="text-content">
				<h3>ENTRE EM CONTATO</h3>
				<p><?php echo get_field( 'endereço', 'option' ); ?></p>
				<p><?php echo get_field( 'telefone', 'option' ); ?></p>
				<p class="email"><a href="mailto:<?php echo get_field( 'email', 'option' ); ?>"><?php echo get_field( 'email', 'option' ); ?></a></p>
			</div>
		</div>
		<div class="col-sm-6 col-xs-12 text-right">
			<div class="back-top">
				<a href="javascript:void(0);" id="back-to-top"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon-back-top.png"></a>
			</div>
			<div class="social">
				<a href="<?php echo get_field( 'facebook', 'option' ); ?>" class="icon-facebook big white" target="_blank"></a>
				<a href="<?php echo get_field( 'instagram', 'option' ); ?>" class="icon-instagram big white" target="_blank"></a>
			</div>
		</div>
		<div class="col-sm-6 col-xs-12 text-right">
			<div class="copyright">
				<p>Copyright Amanda Miranda <?php echo date( 'Y' ) ?> | Todos os direitos reservados</p>
			</div>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>
