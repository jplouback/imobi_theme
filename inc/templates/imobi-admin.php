<h1>Theme Options</h1>
<?php settings_errors(); ?>

<style>
  .ui-tabs-vertical { width: 55em; }
  .ui-tabs-vertical .ui-tabs-nav { padding: .2em .1em .2em .2em; float: left; width: 12em; }
  .ui-tabs-vertical .ui-tabs-nav li { clear: left; width: 100%; border-bottom-width: 1px !important; border-right-width: 0 !important; margin: 0 -1px .2em 0; }
  .ui-tabs-vertical .ui-tabs-nav li a { display:block; }
  .ui-tabs-vertical .ui-tabs-nav li.ui-tabs-active { padding-bottom: 0; padding-right: .1em; border-right-width: 1px; }
  .ui-tabs-vertical .ui-tabs-panel { padding: 1em; float: right; width: 40em;}
</style>

<form method="post" action="options.php" id="imobi_form_admin">

	<div id="tabs">
		<ul>
		    <li><a href="#tabs-1">Opção de cores</a></li>
		    <li><a href="#tabs-2">Proin dolor</a></li>
		    <li><a href="#tabs-3">Aenean lacinia</a></li>
		</ul>
		<div id="tabs-1">
			<?php settings_fields( 'imobi-settings-group' ); ?>
			
			<?php // do_settings_sections( 'imobi_theme' ); 
				$color_base = esc_attr( get_option( 'imobi_color_base' ) );
				$second_color = esc_attr( get_option( 'imobi_second_color' ) );
				$slide = esc_attr( get_option( 'slider_home' ) );

				$sliders = '';
				
				if (is_plugin_active('smart-slider-3/smart-slider-3.php')) {

				    global $wpdb;
					$sliders = $wpdb->get_results('SELECT id, title FROM ' . $wpdb->prefix . 'nextend2_smartslider3_sliders');

				} else {
				    echo "Instale/Ative o plugin Smart Slide";
				}
				// echo "<pre>";
				// print_r($sliders[0]->id);
				// die();
				
			?>

			
    		<input type="text" name="imobi_color_base" class="color-field" value="<?= $color_base ?>" />
    		<br>
    		<input type="text" name="imobi_second_color" class="color-field" value="<?= $second_color ?>" />

		</div>
	  
		<div id="tabs-2">
		    <h2>Slide da home</h2>
    		<!-- <input type="text" name="slider_home" class="" value="<?= $slide ?>" /> -->

		    <select name="slider_home" id="slider_home_define" class="form-control" required="required">
		    	
		    	<?php foreach ($sliders as $key => $slide) { ?>
		    		<option value="<?= $slide->id?>"><?= $slide->title?></option>
		    	<?php } ?>
		    	
		    </select>

		</div>
		<div id="tabs-3">
		    <h2>Content heading 3</h2>
		    
		</div>
	</div>
	
	<?php submit_button(); ?>
</form>