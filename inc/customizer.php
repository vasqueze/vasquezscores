<?php
/**
 * vasquezscores Theme Customizer.
 *
 * @package vasquezscores
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vasquezscores_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'vasquezscores_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function vasquezscores_customize_preview_js() {
	wp_enqueue_script( 'vasquezscores_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'vasquezscores_customize_preview_js' );


function vasquezscores_customizer_css() {
			$header_color = get_theme_mod('header_color');
?>
<style type="text/css">
		.site-header {
			background-color: <?php echo $header_color; ?>
		}
</style>
<?php
}
add_action( 'wp_head', 'vasquezscores_customizer_css');
