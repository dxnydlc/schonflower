
var _servicio = 'http://localhost:8000/menu/';
var _srvProd  = 'http://localhost:8000/prod_by_categ';
var _srvProdData= 'http://localhost:8000/prod_by_id';
var _srvDetalle= 'http://localhost:8000/det_menu';

(function($){
	$(document).ready(function()
		{
			/*--------------------------------------*/
			$('#id_categoria').change(function(event) {
				event.preventDefault();
				var _idCateg = $('#id_categoria').val(), _txt = $("#id_categoria option:selected").text();
				$('#categoria').val( _txt );
				$('#id_categoria').val( _idCateg );
				$.get(_srvProd+'/'+_idCateg, function(data) {
					llenar_combo( data );
					//$('#myModal').modal('hide')
				},'json');
			});
			/*--------------------------------------*/
			/*--------------------------------------*/
			//Date picker
			$('#fecha').datepicker({
				language: "es",
				autoclose: true,
				todayHighlight: true
			});
			/*--------------------------------------*/
			$('#id_tipo_menu').click(function(event) {
				var _Prod = $("#id_tipo_menu option:selected").text();
				seleccionar_tm( _Prod );
			});
			/*--------------------------------------*/
			$('#id_tipo_menu').change(function(event) {
				var _Prod = $("#id_tipo_menu option:selected").text();
				seleccionar_tm( _Prod );
			});
			/*--------------------------------------*/
			$('#id_combo').click(function(event) {
				var _Prod = $("#id_combo option:selected").text();
				seleccionar_prec_combo( _Prod , $(this).val() );
			});
			/*--------------------------------------*/
			$('#id_combo').change(function(event) {
				var _Prod = $("#id_combo option:selected").text();
				seleccionar_prec_combo( _Prod , $(this).val() );
			});
			/*--------------------------------------*/
			$(".combito").select2();
			/*--------------------------------------*/
			$(document).delegate('#id_producto', 'change', function(event) {
				var _idProd = $(this).val();
				var _Prod = $("#id_producto option:selected").text();
				seleccionar_combo( _Prod );
				$.get( _srvProdData+'/'+_idProd, function(data) {
					if( data.cant > 0 )
					{
						var _fila = data.prod[0];
						$('#wrapper_precio #precio').val( _fila.precio );
						$('#sku').val( _fila.sku );
					}
				},'json');
			});
			/*--------------------------------------*/
			$('#btnSaveDet').click(function(event) {
				event.preventDefault();
				var _data = $('#frmDetalle').serialize();
				$.post( _srvDetalle , _data , function(data, textStatus, xhr) {
					console.log( data );
				},'json');
			});
			/*--------------------------------------*/
		});

})(jQuery);


function llenar_combo( $json )
{
	//console.log('entrando a la funcion '+$json.prod.length);
	if( $json.cant > 0 )
	{
		var _combo = '<option value="" >Seleccione</option>';
		for (var i = 0; i < $json.cant; i++) {
			var _fila = [];
			_fila = $json.prod[i];
			_combo += '<option value="'+_fila.id+'" >'+_fila.nombre+'</option>';
		}
		$('#id_producto').html( _combo );
	}
	
}

function seleccionar_combo( _txt )
{
	$('#producto').val( _txt );
}

function seleccionar_tm( _txt )
{
	$('#tipo_menu').val( _txt );
}

function seleccionar_prec_combo( _txt , _id )
{
	$('#combo').val( _txt );
	for (var i = 0; i < _json_pc.length; i++) {
		var _fila = _json_pc[i];
		if( _fila.id == _id )
		{
			$('#precio').val( _fila.precio );
		}
	}
}
