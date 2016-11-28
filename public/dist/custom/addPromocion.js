
var _servicio = _URL_HOME+'promo_combo/';

(function($){
	$(document).ready(function()
		{
			/*--------------------------------------*/
			$('.delCateg').click(function(event) {
				event.preventDefault();
				var _token = $('#token').val();
				var _DataSend = {'_method':'DELETE','_token': _token };
				var _id = $(this).attr('id'), _objeto = $(this).attr('alt');
				//
				alertify.confirm("Confirme anular "+_objeto,
					function()
					{
						//Ok
						$.post(_servicio+_id, _DataSend , function(data, textStatus, xhr) {
							console.log('correcto');
							document.location.reload();
						},'json');
					},
					function()
					{
						//Cancel
					});
			});
			/*--------------------------------------*/
			$('#id_categoria').click(function(event) {
				get_categ_name();
			});
			/*--------------------------------------*/
			$('#id_categoria').change(function(event) {
				get_categ_name();
			});
			/*--------------------------------------*/
			$('#btnSaveDet').click(function(event) {
				event.preventDefault();
				var _data = $('#frmDetalle').serializeArray();
				var _cond1 = $("#condicion_1 option:selected").text(), _cond2 = $("#condicion_2 option:selected").text();
				var _mask = _cond1+' + '+_cond2;
				_data.push({name: 'mascara', value: _mask});
				$.post(_URL_HOME+'/det_promo_combo', _data , function(data, textStatus, xhr) {
					llenar_tabla( data );
					$('#myModal').modal('hide');
				},'json');
			});
			/*--------------------------------------*/
			/*--------------------------------------*/
			/*--------------------------------------*/
			/*--------------------------------------*/
			/*--------------------------------------*/
			/*--------------------------------------*/
			/*--------------------------------------*/
		});

})(jQuery);

function get_categ_name()
{
	var _valor = $('#id_categoria option:selected').text();
	console.log( _valor );
	$('#nombre_categoria').val( _valor );
}

function llenar_tabla( json )
{
	if( json != undefined )
	{
		var _html = '';
		for (var i = 0; i < json.data.length; i++) {
			var _fila = json.data[i];
			_html += '<tr>';
				_html += '<td>'+_fila.mascara+'</td>';
				_html += '<td>'+_fila.precio+'</td>';
				_html += '<td>'+'</td>';
			_html += '</tr>';
		}
		$('#tblDetalle').html( _html );
	}
}

