
var _servicio = 'http://localhost:8000/menu/';
var _srvProd  = 'http://localhost:8000/prod_by_categ';

(function($){
	$(document).ready(function()
		{
			/*--------------------------------------*/
			$('#btnSelCateg').click(function(event) {
				event.preventDefault();
				var _idCateg = $('#mask_categoria').val(), _txt = $("#mask_categoria option:selected").text();
				$('#categoria').val( _txt );
				$('#id_categoria').val( _idCateg );
				$.get(_srvProd+'/'+_idCateg, function(data) {
					llenar_combo( data );
					$('#myModal').modal('hide')
				},'json');
			});
			/*--------------------------------------*/
			$('#id_producto').click(function(event) {
				var _Prod = $("#id_producto option:selected").text();
				seleccionar_combo( _Prod );
			});
			/*--------------------------------------*/
			$('#id_producto').change(function(event) {
				var _Prod = $("#id_producto option:selected").text();
				seleccionar_combo( _Prod );
			});
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
			/*--------------------------------------*/
			/*--------------------------------------*/
			/*--------------------------------------*/
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
