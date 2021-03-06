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
function imobi_options_page() {
    add_menu_page( 'Imobi setup', 'Imobi setup', 'manage_options', 'imobi_setup_theme', 'imobi_options_page_html', 'dashicons-layout', 59 );
}
 
/**
 * registra a função imobi_options_page no admin_menu action hook
 */
add_action( 'admin_menu', 'imobi_options_page' );
 

function imobi_settings_init() {
    // Registre uma nova configuração para a página "Imobi options"
    register_setting( 'imobi_settings', 'imobi_options' );

 
    // Registre uma nova seção na página "imobi_options"
    add_settings_section ( 
        'wporg_section_developers', 
        __( 'Configurações gerais', 'imobi' ), 
        'imobi_section_custom_home', 
        'imobi_settings' 
    );
    // add_settings_section( $id, $title, $callback, $page );
 
    // register a new field in the "wporg_section_developers" section, inside the "wporg" page
    add_settings_field(
        'imobi_preenchimento', // as of WP 4.6 this value is used only internally
        // use $args' label_for to populate the id inside the callback
        __( 'Preenchimento', 'imobi' ),
        'wporg_field_pill_cb',
        'imobi_settings',
        'wporg_section_developers',
            [
            'label_for' => 'imobi_field_pill',
            'class' => 'wporg_row',
            'wporg_custom_data' => 'custom',
            ]
    );
}
 
/**
 * register our imobi_settings_init to the admin_init action hook
 */
add_action( 'admin_init', 'imobi_settings_init' );
 
/**
 * custom option and settings:
 * callback functions
 */
 
// developers section cb
 
// section callbacks can accept an $args parameter, which is an array.
// $args have the following keys defined: title, id, callback.
// the values are defined at the add_settings_section() function.
function imobi_section_custom_home( $args ) {
 ?>
    <p id="<?php echo esc_attr( $args['id'] ); ?>">
        <?php esc_html_e( 'Resposta callback.', 'imobi' ); ?>
    </p>
    <?php
}
 
// pill field cb
 
// field callbacks can accept an $args parameter, which is an array.
// $args is defined at the add_settings_field() function.
// wordpress has magic interaction with the following keys: label_for, class.
// the "label_for" key value is used for the "for" attribute of the <label>.
// the "class" key value is used for the "class" attribute of the <tr> containing the field.
// you can add custom key value pairs to be used inside your callbacks.
function wporg_field_pill_cb( $args ) {
 // get the value of the setting we've registered with register_setting()
 $options = get_option( 'imobi_options' );
 // output the field
 ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" data-custom="<?php echo esc_attr( $args['wporg_custom_data'] ); ?>" name="imobi_options[<?php echo esc_attr( $args['label_for'] ); ?>]">
            <option value="red" <?php echo isset( $options[ $args[ 'label_for'] ] ) ? ( selected( $options[ $args[ 'label_for'] ], 'red', false ) ) : ( '' ); ?>>
                <?php esc_html_e( 'red pill', 'imobi' ); ?>
            </option>
            <option value="blue" <?php echo isset( $options[ $args[ 'label_for'] ] ) ? ( selected( $options[ $args[ 'label_for'] ], 'blue', false ) ) : ( '' ); ?>>
                <?php esc_html_e( 'blue pill', 'imobi' ); ?>
            </option>
        </select>
        <p class="description">
            <?php esc_html_e( 'You take the blue pill and the story ends. You wake in your bed and you believe whatever you want to believe.', 'imobi' ); ?>
        </p>
        <p class="description">
            <?php esc_html_e( 'You take the red pill and you stay in Wonderland and I show you how deep the rabbit-hole goes.', 'imobi' ); ?>
        </p>
        <?php
}
 

/**
 * top level menu:
 * callback functions
 */
function imobi_options_page_html() {
     // Checa permissões
     if ( ! current_user_can( 'manage_options' ) ) {
        return;
     }
 
 // add error/update messages
 
 // check if the user have submitted the settings
 // wordpress will add the "settings-updated" $_GET parameter to the url
 if ( isset( $_GET['settings-updated'] ) ) {
 // add settings saved message with the class of "updated"
 add_settings_error( 'wporg_messages', 'wporg_message', __( 'Configurações salvas.', 'imobi' ), 'updated' );
 }
 
 // show error/update messages
 settings_errors( 'wporg_messages' );
 ?>
            <div class="wrap">
                <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
                <form action="options.php" method="post">
                    <?php
 // output security fields for the registered setting "wporg"
 settings_fields( 'imobi_settings' );
 // output setting sections and their fields
 // (sections are registered for "wporg", each field is registered to a specific section)
 do_settings_sections( 'imobi_settings' );
 // output save settings button
 submit_button( 'Salvar configurações' );
 ?>
                </form>
            </div>
            <?php
}