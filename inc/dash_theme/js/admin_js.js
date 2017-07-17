(function( $ ) {
 
    // Add Color Picker to all inputs that have 'color-field' class
    $('.color-field').wpColorPicker();

    $( "#tabs" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
    $( "#tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );

    // ----------------

    var divPai = $('.wraper_elementos');
	var btnCriar = $('#add_elemento');

	console.log($('.input_texto_valor').length);

	btnCriar.click(function(){
		var contador_elemento = $('.input_texto_valor').length;
	    divPai.append('<div class="form-group">');
	    divPai.append('<label for="">Teste</label>');
	    divPai.append('<input type="text" class="form-control input_texto_valor" name="product_meta[]" id="product_meta-'+contador_elemento+'" placeholder="valor do campo" value="">');
	    divPai.append('</div>');

	    
	    atualizaValor();
	});

	function atualizaValor() {
		var valor_atual = $('input[name="product_meta_count_text"]').val();
		var atualiza_contador = $('.input_texto_valor').length;

	   	var teste = $('input[name="product_meta_count_text"]').val(valor_atual + ',' + atualiza_contador);
	    
	    console.log('teste - ' + valor_atual);
	}
    
     
})( jQuery );