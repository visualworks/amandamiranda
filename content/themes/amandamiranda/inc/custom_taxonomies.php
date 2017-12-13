<?php
/**
 * Taxonomias customizadas
 */

 // Register Custom Taxonomy
function mg_pesquisa() {

	$labels = array(
		'name'                       => _x( 'Projetos de pesquisa', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Projeto de Pesquisa', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Projetos de pesquisa', 'text_domain' ),
		'all_items'                  => __( 'Todas projetos', 'text_domain' ),
		'parent_item'                => __( 'Projeto pai', 'text_domain' ),
		'parent_item_colon'          => __( 'Projeto pai:', 'text_domain' ),
		'new_item_name'              => __( 'Novo projeto', 'text_domain' ),
		'add_new_item'               => __( 'Adicionar projeto', 'text_domain' ),
		'edit_item'                  => __( 'Editar projeto', 'text_domain' ),
		'update_item'                => __( 'Atualizar projeto', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separar projetos com vírgula', 'text_domain' ),
		'search_items'               => __( 'Buscar Projeto', 'text_domain' ),
		'add_or_remove_items'        => __( 'Adicionar ou remover projetos', 'text_domain' ),
		'choose_from_most_used'      => __( 'Escolha entre as mais usados', 'text_domain' ),
		'not_found'                  => __( 'Não encontrado', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'pesquisa', array( 'professor' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'mg_pesquisa', 0 );


function mg_interesse() {

	$labels = array(
		'name'                       => _x( 'Áreas de interesse', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Área de interesse', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Áreas de interesse', 'text_domain' ),
		'all_items'                  => __( 'Todas Áreas', 'text_domain' ),
		'parent_item'                => __( 'Área mãe', 'text_domain' ),
		'parent_item_colon'          => __( 'Área mãe:', 'text_domain' ),
		'new_item_name'              => __( 'Nova área', 'text_domain' ),
		'add_new_item'               => __( 'Adicionar área', 'text_domain' ),
		'edit_item'                  => __( 'Editar área', 'text_domain' ),
		'update_item'                => __( 'Atualizar área', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separar áreas com vírgula', 'text_domain' ),
		'search_items'               => __( 'Buscar área', 'text_domain' ),
		'add_or_remove_items'        => __( 'Adicionar ou remover áreas', 'text_domain' ),
		'choose_from_most_used'      => __( 'Escolha entre as mais usadas', 'text_domain' ),
		'not_found'                  => __( 'Não encontrado', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'interesse', array( 'professor' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'mg_interesse', 0 );




function mg_tipo() {

	$labels = array(
		'name'                       => _x( 'Tipos de curso', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Tipo de curso', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Tipos de curso', 'text_domain' ),
		'all_items'                  => __( 'Todos os tipos', 'text_domain' ),
		'parent_item'                => __( 'Tipo pai', 'text_domain' ),
		'parent_item_colon'          => __( 'Tipo pai:', 'text_domain' ),
		'new_item_name'              => __( 'Novo tipo', 'text_domain' ),
		'add_new_item'               => __( 'Adicionar tipo', 'text_domain' ),
		'edit_item'                  => __( 'Editar tipo', 'text_domain' ),
		'update_item'                => __( 'Atualizar tipo', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separar tipos com vírgula', 'text_domain' ),
		'search_items'               => __( 'Buscar tipo', 'text_domain' ),
		'add_or_remove_items'        => __( 'Adicionar ou remover tipos', 'text_domain' ),
		'choose_from_most_used'      => __( 'Escolha entre as mais usadas', 'text_domain' ),
		'not_found'                  => __( 'Não encontrado', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'tipo', array( 'curso', 'professor', 'depoimento' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'mg_tipo', 0 );
