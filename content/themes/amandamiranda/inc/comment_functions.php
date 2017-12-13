<?php
/**
 * Comentários
 * Funções para sobrescrever o esquema default de comentários do WP.
 *
 * @package IAG
 * @author MG Studio <contato@mgstudio.com.br>
 */


if (!function_exists('mg_comments')) :
/**
 * Roubado do Twenty Ten, um 'conserto' ao formulário e estilos default de
 * comentário do WP
 */
function mg_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li id="comment-<?php comment_ID(); ?>">
		<?php
		?>
		<header class="comment_header">
			<?php echo get_avatar($comment, 60); ?>
			<h4><?php comment_author_link()?></h4>
			<h5><time datetime="<?php comment_time('c');?>">
			<a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>"><?php
			 echo get_comment_date('d.m.Y'),'&middot;',get_comment_time(); ?></a><?php edit_comment_link('Editar', ' &middot; ' );
			?></time></h5>
		</header>
			<?php if ( $comment->comment_approved == '0' ) : ?>
			<p class="moderacao">Seu comentário aguarda moderação.</p>
			<?php endif; ?>
			<div class="comment_body">
			 <?php comment_text(); ?>
			 </div>
		 <p class="reply"><?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?></p>
	<?php
		 break;
		 case 'pingback'  :
		 case 'trackback' :
	?>
	<li class="post pingback">
		<p>Pingback: <?php comment_author_link(); ?><?php edit_comment_link( 'Editar', ''); ?></p><?php
		break;
	endswitch;
}
endif;

// Comment form fix
function mg_fields($fields) {
	$commenter = wp_get_current_commenter();
	$fields['author'] = "<div class=\"comment_field\">\n" .
						"<label for=\"author\" class=\"req\">Nome*:</label>\n" .
						"<input type=\"text\" name=\"author\" id=\"author\" class=\"white\" value=\"" .
						esc_attr( $commenter['comment_author'] ) . "\" />\n" .
						"</div>";
	$fields['email'] = "<div class=\"comment_field\">\n" .
						"<label for=\"email\" class=\"req\">Email*:</label>\n" .
						"<input type=\"email\" name=\"email\" id=\"email\" class=\"white\" value=\"" .
						esc_attr( $commenter['comment_author_email'] ) . "\"/>\n" .
						"</div>";
	$fields['url'] = "<div class=\"comment_field\">\n" .
						"<label for=\"url\">Site:</label>\n" .
						"<input type=\"url\" name=\"url\" class=\"white\" id=\"url\" value=\"" .
						esc_attr( $commenter['comment_author_url'] ) . "\"/>\n" .
						"</div>";
	return $fields;
}
add_filter('comment_form_default_fields','mg_fields');
function mg_comment_form_defaults($defaults){
	$defaults['comment_field'] = "<div class=\"comment_field\">\n" .
						"<label for=\"comment\">Comentário:</label>\n" .
						"<textarea name=\"comment\" id=\"comment\" class=\"white\"></textarea>\n" .
						"</div>";
	$defaults['comment_notes_before'] = "<p class=\"fineprint\">* denota campos obrigatórios. Seu email não será publicado.</p>";
	$defaults['comment_notes_after'] = "";
	$defaults['title_reply'] = "Deixe seu comentário";
	$defaults['title_reply_to'] = "Responda a %s";
	return $defaults;
}
add_filter('comment_form_defaults','mg_comment_form_defaults');
