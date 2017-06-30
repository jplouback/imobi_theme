<?php 
add_action('admin_notices', 'showAdminMessages');

function showAdminMessages() {
    $plugin_messages = array();
    $aRequired_plugins = array();

    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

    $aRequired_plugins  =   array(
        array('name'=>'Advanced Custom Fields', 'download'=>'http://wordpress.org/plugins/advanced-custom-fields/', 'path'=>'advanced-custom-fields/acf.php'),
        array('name'=>'Smart Slider 3', 'download'=>'https://br.wordpress.org/plugins/smart-slider-3/', 'path'=>'smart-slider-3/smart-slider-3.php')
    );

    
    foreach($aRequired_plugins as $aPlugin){
        // Checa se o plugin está ativo
        if(!is_plugin_active( $aPlugin['path'] )) {
            $plugin_messages[]  = '<div class="notice notice-warning is-dismissible">';
            $plugin_messages[] .= '<p>Este template precisa do plugin: '.$aPlugin['name'].'. <a href="'.$aPlugin['download'].'" target="_blank">Faça download dele aqui</a>, Caso já tenha ele instalado <a href="/wp-admin/plugins.php">ative-o</a>.</p>';
            $plugin_messages[] .= '</div>';
        }
    }

    if(count($plugin_messages) > 0) {

        foreach($plugin_messages as $message) {
            echo ''.$message.'';
        }    
    }

}