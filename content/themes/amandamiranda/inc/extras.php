<?php
/**
 * Funções de funcionalidades extras
 *
 * @package Na Toca
 * @version 1.0
 * @author MG Studio
 */
function mg_load_javascript_on_admin_edit_post_page() {
	global $parent_file;

	//If we're on the edit post page.
	if ( $parent_file == 'post-new.php' ||
		$parent_file  == 'edit.php' ||
		$parent_file  == 'edit.php?post_type=page' ) {
		echo "
		  <script>
		  jQuery(document).live('acf/setup_fields', function(e, div){
			jQuery('.color_picker').each(function() {
			  jQuery(this).iris({
				palettes: ['#ec1d48', '#bdd171', '#7ebdc7']
			  });
			});
		  });
		  </script>
		";
	}
}
add_action('in_admin_footer', 'mg_load_javascript_on_admin_edit_post_page');

