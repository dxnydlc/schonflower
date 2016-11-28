
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
			/*--------------------------------------*/
			/*--------------------------------------*/
			/*--------------------------------------*/
		});

})(jQuery);

