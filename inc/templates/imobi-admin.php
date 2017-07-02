<div class="container pull-left" id="imobi_form_admin">
	<h3>Opções do template</h3>
	<p>Defina aqui as informações gerais do seu site.</p>
	<?php settings_errors(); ?>

	<form method="post" action="options.php" class="form-inline">

		<div id="tabs">
			<ul>
			    <li><a href="#tabs-1">Opção de cores</a></li>
			    <li><a href="#tabs-2">Slide principal</a></li>
			    <li><a href="#tabs-3">Aba 3</a></li>
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
					}
				?>

				<h4>Cores</h4>
				
				<div class="form-group">
			     	<label for="imobi_color_base">Cor principal do site:</label>
			    	<input type="text" name="imobi_color_base" class="color-field" value="<?= $color_base ?>" />
			    </div>

				<div class="form-group">
			     	<label for="imobi_second_color">Cor secundária do site:</label>
			    	<input type="text" name="imobi_second_color" class="color-field" value="<?= $second_color ?>" />
			    </div>
	    		
			</div>
		  
			<div id="tabs-2">
			    <h4>Slide da home</h4>
	    		
				<?php if (is_plugin_active('smart-slider-3/smart-slider-3.php')): ?>
				    <select name="slider_home" id="slider_home_define" class="form-control" required="required">
				    	<?php foreach ($sliders as $key => $slide) { ?>
					    		<option value="<?= $slide->id?>"><?= $slide->title?></option>
					    	<?php } ?>
				    </select>
				<?php else: ?>
					<strong>Instale/Ative o Plugin <a href="https://br.wordpress.org/plugins/smart-slider-3/" target="_blank">Smart Slide 3</a></strong>
			    <?php endif ?>

			</div>
			<div id="tabs-3">
			    <h4>Content heading 3</h4>
			    
			</div>
		</div>

		<div class="col-sm-12">
		<div class="pull-right">
			<?php submit_button(); ?>
			</div>
		</div>

	</form>
</div>