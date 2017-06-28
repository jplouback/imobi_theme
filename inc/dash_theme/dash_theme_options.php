<?php 
// function menu_theme_options() {
// 	function dashboard_theme_options() {
// 		require_once '/view/options-form.php';
// 	}

// 	add_menu_page( 'Imobi setup', 'Imobi setup', 'administrator', 'imobi_setup_theme', 'dashboard_theme_options', 'dashicons-layout', 59 );
	
// }


// add_action('admin_menu', 'menu_theme_options');

// ======================================================================

/**
 * Função que adiciona página de configuração no admin
 */
// function imobi_options_page() {
//     add_menu_page( 'Imobi setup', 'Imobi setup', 'manage_options', 'imobi_setup_theme', 'imobi_options_page_html', 'dashicons-layout', 59 );
// }
 
/**
 * registra a função imobi_options_page no admin_menu action hook
 */
// add_action( 'admin_menu', 'imobi_options_page' );
 
// function imobi_options_page_html() {
//     echo "imobi_options_page_html";
// }


/*
    
@package sunsettheme
    
    ========================
        ADMIN PAGE
    ========================
*/
function sunset_add_admin_page() {
    
    //Generate Sunset Admin Page
    add_menu_page( 'Sunset Theme Options', 'Sunset', 'manage_options', 'alecaddd_sunset', 'sunset_theme_create_page', get_template_directory_uri() . '/img/sunset-icon.png', 110 );
    
    //Generate Sunset Admin Sub Pages
    add_submenu_page( 'alecaddd_sunset', 'Sunset Theme Options', 'General', 'manage_options', 'alecaddd_sunset', 'sunset_theme_create_page' );
    add_submenu_page( 'alecaddd_sunset', 'Sunset CSS Options', 'Custom CSS', 'manage_options', 'alecaddd_sunset_css', 'sunset_theme_settings_page');
    
    
    
}
add_action( 'admin_menu', 'sunset_add_admin_page' );
//Activate custom settings
    add_action( 'admin_init', 'sunset_custom_settings' );
function sunset_custom_settings() {
    register_setting( 'sunset-settings-group', 'first_name' );
    add_settings_section( 'sunset-sidebar-options', 'Sidebar Option', 'sunset_sidebar_options', 'alecaddd_sunset');
    add_settings_field( 'sidebar-name', 'First Name', 'sunset_sidebar_name', 'alecaddd_sunset', 'sunset-sidebar-options');
}
function sunset_sidebar_options() {
    echo 'Customize your Sidebar Information';
}
function sunset_sidebar_name() {
    $firstName = esc_attr( get_option( 'first_name' ) );
    echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name" />';
}
function sunset_theme_create_page() {
    require_once( get_template_directory() . '/inc/templates/sunset-admin.php' );
}
function sunset_theme_settings_page() {
    
    echo '<h1>Sunset Custom CSS</h1>';
    
}