<?php 


add_action('add_meta_boxes', 'add_product_meta');

function add_product_meta() {
    global $post;
    if(!empty($post)) {
        $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);

        if($pageTemplate == 'templates/home2.php' ) {
            add_meta_box(
                'product_meta[]', // $id
                'Product Information', // $title
                'display_product_information', // $callback
                'page', // $page
                'normal', // $context
                'high'); // $priority
        }
    }
}

function display_product_information() { 
        global $post;
        $quantidade = get_metadata( 'post', $post->ID, 'product_meta_count', true );
        
    ?>
    <span id="add_elemento" style="background: navy; padding: 5px 10px; color: #fff; float: right;">adicionar</span>
    <div class="wraper_elementos">
    <input type="hidden" name="product_meta_count_text" value="<?=$quantidade?>">
    <?php 
        $valores = get_metadata( 'post', $post->ID, 'product_meta-0', true );
        
        $quantidade = explode(',', $quantidade);
        $quantidade = array_filter($quantidade);

        // echo "<pre>";
        // print_r($quantidade);
        // die();

        foreach ($quantidade as $key => $value) {
            $valor = get_metadata( 'post', $post->ID, 'product_meta-' .$key , true );
     ?>
        <div class="form-group">
            <label for="">Teste</label>
            <input type="text" class="form-control input_texto_valor" name="product_meta[]" id="product_meta-<?=$key?>" placeholder="valor do campo" value="<?= $valor ?>">
        </div>
    <?php } ?>

    </div>

       
<?php } 

function updateMeta() {
    global $post;
    // echo "<pre>";
    // print_r($_POST);
    // die();
    $array_de_inputs =  $_POST['product_meta'];
    $array_contador =  $_POST['product_meta_count_text'];

    if ( !empty($_POST['product_meta-0']) ) {
        $valor_do_campo = $_POST['product_meta-0'];
    } else {
        $valor_do_campo = get_metadata( 'post', $post->ID, 'product_meta-0', true );
    }


    foreach ($array_de_inputs as $key => $value) {
        update_post_meta( $post->ID, 'product_meta-'. $key, $value);
    }

    update_post_meta( $post->ID, 'product_meta_count', $array_contador);
    
}
add_action( 'save_post', 'updateMeta');

?>