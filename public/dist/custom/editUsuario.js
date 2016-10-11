
var _servicio = _URL_HOME+'usuario/';
var _srvDir = _URL_HOME+'dir_user/';

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
					//llenar_tabla( data );
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