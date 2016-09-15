
var _servicio = 'http://localhost:8000/categoria/';

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