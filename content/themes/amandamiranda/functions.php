<?php
/**
 * Theme functions
 *
 * @package Amanda Miranda
 * @author MG Studio
 * @version 1.0
 */

include 'inc/custom_posts.php';

function mg_setup() {

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
		'caption',
	) );

	// Post Thumbnail
	add_theme_support( 'post-thumbnails' );

	// Image sizes
	add_image_size( 'home-banner',   1440,  965, true );
	add_image_size( 'home-destaques', 472,  315, true );
	add_image_size( 'perfil-1',       342,  516, true );
	add_image_size( 'perfil-2',       365,  549, true );
	add_image_size( 'perfil-bg',     2200,  610, true );
	add_image_size( 'projetos-th',    709,  473, true );
	add_image_size( 'midia-th',       396,  372, true );
	add_image_size( 'contato',        684,  507, true );
	add_image_size( 'huge',          1600, 1600, false );

	// menus
	register_nav_menus(
		array(
			'main' => 'Menu principal'
		)
	);

}
add_action( 'after_setup_theme', 'mg_setup' );

// Registrando scripts e estilos
function mg_register_css_js(){

	// JQuery from Google
	wp_deregister_script('jquery');
	wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js', null, 'v=1.11.2', true );
	wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.min.js"', 'jquery', 'v=1.11.2', true );
	wp_enqueue_script( 'instafeed', get_stylesheet_directory_uri() . '/js/instafeed.min.js', 'jquery', 'v=1.11.2', true );
	wp_enqueue_script( 'instagrid', get_stylesheet_directory_uri() . '/js/instagram-grid.js', 'jquery', 'v=1.11.2', true );
	wp_enqueue_script( 'google-maps', 'http://maps.google.com/maps/api/js?key=AIzaSyDWXSEs2speHQScqjB0e9sne1-g5K4zEVg', null, 'v=1.11.2', false );
	wp_enqueue_script( 'mixitup', get_stylesheet_directory_uri() . '/js/jquery.mixitup.js', 'jquery', 'v=1.11.2', true );
	wp_enqueue_script( 'vpcheck', get_stylesheet_directory_uri() . '/js/jquery.viewportchecker.js', 'jquery', 'v=1.11.2', true );
	wp_enqueue_script( 'fancybox', get_stylesheet_directory_uri() . '/fancybox/jquery.fancybox.js', 'jquery', 'v=1.11.2', true );
	wp_enqueue_script( 'main', get_stylesheet_directory_uri() . '/js/scripts.js', 'jquery', 'v=1.11.2', true );


	// Stylesheet principal
	wp_enqueue_style( 'mg-bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', false, 'v1.0' );
	wp_enqueue_style( 'mg-style', get_stylesheet_directory_uri() . '/css/styles.css', false, 'v1.0' );
	wp_enqueue_style( 'mg-slider', get_stylesheet_directory_uri() . '/css/full-slider.css', false, 'v1.0' );
	wp_enqueue_style( 'mg-fancycss', get_stylesheet_directory_uri() . '/fancybox/jquery.fancybox.css', false, 'v1.0' );
	wp_enqueue_style( 'mg-instagrid', get_stylesheet_directory_uri() . '/js/instagram-grid.css', false, 'v1.0' );
	wp_enqueue_style( 'mg-animate', get_stylesheet_directory_uri() . '/"css/animate.css', false, 'v1.0' );
}
add_action( 'wp_enqueue_scripts', 'mg_register_css_js' );


//Page Slug Body Class
function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
		$classes[] = $post->post_name;
	}
	return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

/**
 * Customização da administração
 */
function my_login_logo() { ?>
<style type="text/css">
body.login { background: #000; }
body.login div#login h1 a {
	background: url(<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png) no-repeat 0 0;
	height: 67px;
	margin-left: auto;
	margin-right: auto;
	width: 332px;
}
.login #nav a,
.login #backtoblog a {
	color: #fff !important;
	text-shadow: none;
}
.login #nav a:hover,
.login #backtoblog a:hover { color: #fff !important }

</style>
<?php }

function no_errors_please() {
	return '<strong>ERRO:</strong> A senha ou usuário fornecidos estão incorretos. <a href="' . home_url( '/wp-login.php?action=lostpassword' ) . '">Esqueceu sua senha</a>?';
}
function my_login_logo_url() {
	return get_bloginfo( 'url' );
}
function my_login_logo_url_title() {
	return 'Ir para o início';
}
add_action( 'login_enqueue_scripts', 'my_login_logo' );
add_filter( 'login_errors', 'no_errors_please' );
add_filter( 'login_headerurl', 'my_login_logo_url' );
add_filter( 'login_headertitle', 'my_login_logo_url_title' );


// Modificando o nome dos Posts para Projetos
function mg_change_post_menu_label() {
	global $menu;
	global $submenu;
	$menu[5][0] = 'Projetos';
	$submenu['edit.php'][5][0] = 'Projetos';
	$submenu['edit.php'][10][0] = 'Adicionar projeto';
}

function mg_change_post_object_label() {
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'Projetos';
	$labels->singular_name = 'Projeto';
	$labels->add_new = 'Novo projeto';
	$labels->add_new_item = 'Adicionar projeto';
	$labels->edit_item = 'Editar projetos';
	$labels->new_item = 'Projeto';
	$labels->view_item = 'Ver projeto';
	$labels->search_items = 'Buscar projetos';
	$labels->not_found = 'Nenhum projeto encontrada';
	$labels->not_found_in_trash = 'Nenhum projeto na lixeira';
}
add_action( 'init', 'mg_change_post_object_label' );
add_action( 'admin_menu', 'mg_change_post_menu_label' );

function mg_theme_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'init', 'mg_theme_add_editor_styles' );


// Modifica o html do video embebedado para ficar responsivo
add_filter( 'embed_oembed_html','oembed_result', 10, 3 );
function oembed_result( $html, $url, $args ) {
	if( strstr( $url, 'youtu' ) ){
		$video_pattern = '~(?:http|https|)(?::\/\/|)(?:www.|)(?:youtu\.be\/|youtube\.com(?:\/embed\/|\/v\/|\/watch\?v=|\/ytscreeningroom\?v=|\/feeds\/api\/videos\/|\/user\S*[^\w\-\s]|\S*[^\w\-\s]))([\w\-]{11})[a-z0-9;:@#?&%=+\/\$_.-]*~i';

		$video_id = ( preg_replace( $video_pattern, '$1', $url ) );

		$html = '<div class="video-container"><iframe src="https://www.youtube.com/embed/' . $video_id . '" frameborder="0" allowfullscreen';
		foreach ( $args as $key => $value ) {
			$html .= ' ' .$key . '="' . $value . '"';
		}
		$html .= '></iframe></div>';
 	} else {
 		$html = '<div class="video-container">' . $html . '</div>';
 	}
	return $html;
}
function mg_youtube_player( $html, $url, $args ) {
	return str_replace( '?feature=oembed', '?feature=oembed&modestbranding=1&showinfo=0&rel=0', $html );
}
add_filter( 'oembed_result', 'mg_youtube_player', 10, 3 );

// remove unncessary header info
function mg_remove_header_info() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'start_post_rel_link');
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'adjacent_posts_rel_link');
}
add_action('init', 'mg_remove_header_info');


// Options pages
function mg_acf_options_page_settings( $settings ){
	$settings['title'] = 'Opções';
	$settings['pages'] = array( 'Opções gerais', 'Footer' );

	return $settings;
}
add_filter('acf/options_page/settings', 'mg_acf_options_page_settings');

// loop modifiers
function mg_reorder_calendar($query) {

	// set posts per page
	$query->set( 'posts_per_page', -1 );

	// order
	if ( !is_admin() && $query->is_main_query() ) {

		// if ( is_home() ) {
		// 	$query->set( 'orderby', 'rand' );
		// }
		if ( is_post_type_archive( 'midia' ) ) {
			$query->set( 'orderby', 'meta_value_num' );
			$query->set( 'meta_key', 'data' );
			$query->set( 'order', 'DESC' );
		}

	}
}

add_action('pre_get_posts','mg_reorder_calendar');

// desabilita srcset
// add_filter( 'max_srcset_image_width', create_function( '', 'return 1;' ) );
