<?php
/**
 * Custom post types
 *
 * @package Amanda Miranda
 * @author MG Studio
 */

function mg_midia() {

	$labels = array(
		'name'                => 'Clippings',
		'singular_name'       => 'Clipping',
		'menu_name'           => 'Clippings',
		'parent_item_colon'   => 'Clipping pai:',
		'all_items'           => 'Todos clippings',
		'view_item'           => 'Ver Clipping',
		'add_new_item'        => 'Adicionar clipping',
		'new_item'            => 'Novo clipping',
		'add_new'             => 'Novo clipping',
		'edit_item'           => 'Editar clipping',
		'update_item'         => 'Atualizar clipping',
		'search_items'        => 'Buscar no Clipping',
		'not_found'           => 'Clipping não encontrado',
		'not_found_in_trash'  => 'Não encontrado na lixeira',
	);
	$args = array(
		'label'               => 'clipping',
		'description'         => 'Clippings',
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 8,
		'menu_icon'           => 'dashicons-format-aside',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'rewrite' => array( 'slug' => 'midia', 'with_front' => true ),
	);
	register_post_type( 'midia', $args );

	flush_rewrite_rules( false );

}
// Hook into the 'init' action
add_action( 'init', 'mg_midia', 0 );
