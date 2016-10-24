
var _servicio = _URL_HOME+'usuario/';
var _srvDir = _URL_HOME+'dir_user/';
var _get_usr_dir = _URL_HOME+'get_dirs_user/';

(function($){
	$(document).ready(function()
		{
			/*--------------------------------------*/
			$('#tipo').change(function(event) {
				var _valor = $(this).val();
				if( _valor == 'F' ){
					$('#facturaFrame').fadeIn();
					$('#ruc').focus();
				}
				else
				{
					$('#facturaFrame').fadeOut();
				}
			});
			/*--------------------------------------*/
			$('#buscar_usuario').click(function(event) {
				event.preventDefault();
				buscar_user();
			});
			/*--------------------------------------*/
			$('#query_user').keypress(function(event) {
				if( event.keyCode == 13 )
				{
					buscar_user();
				}
			});
			/*--------------------------------------*/
			/*--------------------------------------*/
			/*--------------------------------------*/
			/*--------------------------------------*/
			/*--------------------------------------*/
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
			//Date picker
			$('#fecha').datepicker({
				language: "es",
				autoclose: true,
				todayHighlight: true
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
			/*--------------------------------------*/
			$(document).delegate('.set_user_pop', 'click', function(event) {
				event.preventDefault();
				//console.log( $(this).attr('id-user') );
				//return true;
				$('#id_user').val( $(this).attr('id-user') );
				$('#usuario').val( $(this).attr('user-name') );
				$('#correo').val( $(this).attr('user-mail') );
				$('#telefono').val( $(this).attr('user-phone') );
				$('#mdlUser').modal('hide');
				//ahora traemos su dirección y seleccionamos la de por defecto
				$.get( _get_usr_dir + $(this).attr('id-user'), function(data) {
					users_dirs( data );
				},'json');
			});
			/*--------------------------------------*/
			$(document).delegate('.set_dir_user', 'click', function(event) {
				event.preventDefault();
				var _id = $(this).attr('id-dir'), _id_user = $(this).attr('id-user');
				$.get( _URL_HOME+'set_dir_user/'+_id+'/'+_id_user, function(data) {
					//console.log( data );
					$('#mdlDirs').modal('hide');
				},'json');
			});
			/*--------------------------------------*/
			$(document).delegate('.selPhone', 'click', function(event) {
				event.preventDefault();
				var _fono = $(this).attr('user-phone');
				$('#telefono').val( _fono );
				$('#mdlDirs').modal('hide');
			});
			/*--------------------------------------*/
			/*--------------------------------------*/
			/*--------------------------------------*/
			/*--------------------------------------*/
			/*--------------------------------------*/
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

function users_query( json )
{
	if( json.data != null && json.data != undefined )
	{
		var _html = '', _c = 1;
		for (var i = 0; i < json.cant; i++) {
			var _fila = [], _clase = 'label-success';
			_fila = json.data[i];
			_html += '<tr id="Dir_'+_fila.id+'" >';
				_html += '<td>'+_c+'</td>';
				_html += '<td><a id-user="'+_fila.id+'" user-name="'+_fila.name+' '+_fila.apellidos+'" user-mail="'+_fila.email+'" user-phone="'+_fila.telefono+'" href="#" class=" set_user_pop text-light-blue" >'+_fila.name+' '+_fila.apellidos+'</a></td>';
				_html += '<td>'+_fila.email+'</td>';
				_html += '<td>'+_fila.telefono+'</td>';
			_html += '</tr>';
			_c++;
		}
		$('#tblUsers tbody').html( _html );
	}
}

function users_dirs( json )
{
	if( json.data != null && json.data != undefined )
	{
		var _html = '', _c = 1;
		for (var i = 0; i < json.cant; i++) {
			var _fila = [], _clase = 'label-success';
			_fila = json.data[i];
			_html += '<tr id="Dir_'+_fila.id+'" >';
				_html += '<td><a id-dir="'+_fila.id+'" id-user="'+_fila.id_usuario+'" user-dir="'+_fila.distrito+' '+_fila.piso+_fila.interior+'" href="#" class=" set_dir_user text-light-blue" >'+_fila.distrito+'</a></td>';
				_html += '<td>'+_fila.direccion+'</td>';
				_html += '<td>'+_fila.piso+'</td>';
				_html += '<td>'+_fila.interior+'</td>';
				_html += '<td><a href="#" user-phone="'+_fila.telefono+'" class=" selPhone " >'+_fila.telefono+'</td>';
			_html += '</tr>';
			_c++;
		}
		$('#tblDir tbody').html( _html );
		//Vamos a establecer la dir por defecto
		if( json.actual != '' )
		{
			$('#id_dir').val( json.actual[0].id );
			$('#direccion').val( json.actual[0].direccion+' piso: '+json.actual[0].piso+' interior:'+json.actual[0].interior+' - '+json.actual[0].distrito );
		}
		if( json.actual == '' && json.cant > 0 )
		{
			$('#id_dir').val( json.data[0].id );
			$('#direccion').val( json.data[0].direccion+' piso: '+json.data[0].piso+' interior:'+json.data[0].interior+' - '+json.data[0].distrito );
		}
	}

	

}

function buscar_user()
{
	var _query = $('#query_user').val();
	$.get( _URL_HOME+'/buscar_user/'+_query , function(data, textStatus, xhr) {
		users_query( data );
	},'json');
}


function seleccionar_combo( _txt )
{
	$('#empresa').val( _txt );
}

