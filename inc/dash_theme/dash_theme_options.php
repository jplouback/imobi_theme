<?php 

/*
    
@package sunsettheme
    
    ========================
        ADMIN PAGE
    ========================
*/

function imobi_add_admin_page() {
    
    //Gera Admin Page
    add_menu_page( 'Opções do Thema Imobi', 'Theme Options', 'manage_options', 'imobi_theme', 'imobi_theme_create_page', 'dashicons-layout', 59 );
    //add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
    
}

add_action( 'admin_menu', 'imobi_add_admin_page' );

//Activate custom settings
add_action( 'admin_init', 'imobi_custom_settings' );

function imobi_custom_settings() {
    // Registrando opções de cores
    // Para cada registro, deve ter uma função que crie o input com o name igual ao segundo parametro ($option_name)
    register_setting( 'imobi-settings-group', 'imobi_color_base' );
    register_setting( 'imobi-settings-group', 'imobi_second_color' );
    register_setting( 'imobi-settings-group', 'slider_home' );

    add_settings_section( 'imobi-color-options', 'Opções de cores do Thema', 'imobi_colors_options', 'imobi_theme');
    // add_settings_section( $id, $title, $callback, $page );
    // add_settings_field( 'color-base', 'Cor Principal', 'func_colorBase', 'imobi_theme', 'imobi-color-options');
    // add_settings_field( 'second-color', 'Cor Secundária', 'func_secoundColor', 'imobi_theme', 'imobi-color-options');
    // add_settings_field( $id, $title, $callback, $page, $section, $args );
}

function imobi_colors_options() {
    echo 'Customize suas cores';
}


function imobi_theme_create_page() {
    require_once( get_template_directory() . '/inc/templates/imobi-admin.php' );
}

