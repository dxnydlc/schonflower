
var _servicio = _URL_HOME+'usuario/';
var _srvDir = _URL_HOME+'dir_user/';

(function($){
	$(document).ready(function()
		{
			/*--------------------------------------*/
			$(document).delegate('.quitarItem', 'click', function(event) {
				event.preventDefault();
				var _token = $('#token').val();
				var _DataSend = {'_method':'DELETE','_token': _token };
				var _id = $(this).attr('id'), _objeto = $(this).attr('alt');
				//
				alertify.confirm("Confirme anular "+_objeto,
					function()
					{
						//Ok
						$.post(_srvDir+_id, _DataSend , function(data, textStatus, xhr) {
							$('#Dir_'+_id).fadeOut();
						},'json');
					},
					function()
					{
						//Cancel
					});
			});
			/*--------------------------------------*/
			/*--------------------------------------*/
			$('#ubigeo').click(function(event) {
				get_name_ubigeo();
			});
			/*--------------------------------------*/
			$('#ubigeo').change(function(event) {
				get_name_ubigeo();
			});
			/*--------------------------------------*/
			$('#btnSaveDet').click(function(event) {
				event.preventDefault();
				var _data = $('#frmDir').serialize();
				$.post( _srvDir , _data , function(data, textStatus, xhr) {
					llenar_tabla( data );
				},'json');
			});
			/*--------------------------------------*/
			/*--------------------------------------*/
			/*--------------------------------------*/
		});

})(jQuery);

function get_name_ubigeo()
{
	var _valor = $('#ubigeo option:selected').text();
	console.log( _valor );
	$('#distrito').val( _valor );
}

function llenar_tabla( json )
{
	if( json.data != null && json.data != undefined )
	{
		var _html = '';
		for (var i = 0; i < json.cant; i++) {
			var _fila = [], _clase = 'label-success';
			_fila = json.data[i];
			_html += '<tr id="Dir_'+_fila.id+'" >';
				_html += '<td>'+_fila.distrito+'</td>';
				_html += '<td>'+_fila.direccion+'</td>';
				_html += '<td>'+_fila.telefono+'</td>';
				_html += '<td><a id="'+_fila.id+'" alt="'+_fila.distrito+'" href="#" class="btn btn-sm btn-danger quitarItem" ><span class="fa fa-minus-circle" ></span></a></td>';
			_html += '</tr>';
		}
		$('#tblDirs tbody').html( _html );
	}
}
