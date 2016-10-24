
@extends('layouts.principal')

@section('titulo')
Schon Flower - Agregar Orden Manual
@endsection

@section('losCSS')
	{!!Html::style('dist/js/alertify/css/alertify.css')!!}
	{!!Html::style('plugins/date_picker/css/bootstrap-datepicker.css')!!}

	{!!Html::style('dist/js/alertify/css/alertify.css')!!}

	<script> var _URL_HOME = '{{ URL_HOME }}'; </script>

@endsection

@section('header-page')
<h1>
	Orden
<small>Agregar una Orden manual para un cliente</small>
</h1>
@endsection

@section('breadcrumb-page')
	<li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
	<li><a href="{{ url('/orden_manual') }}"><i class="fa fa-dashboard"></i> Orden</a></li>
	<li class="active">Agregar orden</li>
@endsection


@section('content')

	@include('alertas.success')
    @include('alertas.errors')
    @include('alertas.mensaje')
    @include('alertas.usuario')

<div class="row">
	<div class=" col-lg-12  ">
		{!!Form::open(['route'=>'categoria.store','method'=>'post','autocomplete'=>'off', 'class' => '' ])!!}
		<div class="row">

			<div class="col-md-6">
				<div class="box box-success">
					<div class="box-header">
						<h3 class="box-title">Datos del documento</h3>
					</div>
					<div class="box-body">
						<!-- Contenido aqui -->
                        @include('orden.forms.doc')
					</div>
				</div>
			</div>
			<!-- /col-md-6 -->

			<div class="col-md-6">
				<div class="box box-success">
					<div class="box-header">
						<h3 class="box-title">Datos del cliente</h3>
					</div>
					<div class="box-body">
						<!-- Contenido aqui -->
                        @include('orden.forms.form')
					</div>
				</div>
			</div>
			<!-- /col-md-6 -->

		</div>
		<div class="row">
			<div class="col-md-6">
				<div id="facturaFrame" class="box box-success" style="display:none" >
					<div class="box-header">
						<h3 class="box-title">Datos Factura</h3>
					</div>
					<div class="box-body">
						<!-- Contenido aqui -->
                        	@include('orden.forms.factura')
					</div>
				</div>
			</div>
			<!-- /col-md-6 -->
		</div>
		{!!Form::close()!!}

		<div class="row">
			<div class="col-md-12">

				<div class="box box-success">
					<div class="box-header">
						<h3 class="box-title">Detalle del pedido</h3>
					</div>
					<div class="box-body">
						<!-- Contenido aqui -->
						<table class="table table-hover">
						<tbody><tr>
						<th>ID</th>
						<th>User</th>
						<th>Date</th>
						<th>Status</th>
						<th>Reason</th>
						</tr>
						<tr>
						<td>183</td>
						<td>John Doe</td>
						<td>11-7-2014</td>
						<td><span class="label label-success">Approved</span></td>
						<td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
						</tr>
						<tr>
						<td>219</td>
						<td>Alexander Pierce</td>
						<td>11-7-2014</td>
						<td><span class="label label-warning">Pending</span></td>
						<td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
						</tr>
						<tr>
						<td>657</td>
						<td>Bob Doe</td>
						<td>11-7-2014</td>
						<td><span class="label label-primary">Approved</span></td>
						<td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
						</tr>
						<tr>
						<td>175</td>
						<td>Mike Doe</td>
						<td>11-7-2014</td>
						<td><span class="label label-danger">Denied</span></td>
						<td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
						</tr>
						</tbody>
						</table>
					</div>
				</div>

				
				<div class="box box-success">
					<div class="box-body">
						<!-- Contenido aqui -->
                    	<div class="box-footer">
			                <button type="submit" class="btn btn-primary">Guardar</button>
			            </div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

<!-- Usuarios -->
<div class="modal fade" id="mdlUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Buscar Usuario</h4>
      </div>
      <div class="modal-body">
        
        <div class="box box-success">
			<div class="box-body">
				<!-- Contenido aqui -->
                <div class="row">
					<div class="col-md-6">
						<div class="input-group">
							<input id="query_user" type="text" class="form-control" placeholder="Nombres">
							<span class="input-group-btn">
								<button id="buscar_usuario" class="btn btn-default" type="button">Buscar</button>
							</span>
						</div><!-- /input-group -->
					</div><!-- /.col-md-6 -->
					<div class="col-md-4 col-md-offset-1">
						<a href="#" class=" btn btn-block btn-success btn-sm " >Agregar usuario</a>
					</div><!-- /.col-md-5 -->
		        </div><!-- /row -->
		        <div class="row">
		        	<table id="tblUsers" class=" table table-bordered ">
		        		<thead>
		        			<tr>
		        				<th>#</th>
		        				<th>Nombre</th>
		        				<th>Email</th>
		        				<th>Telefono</th>
		        			</tr>
		        		</thead>
		        		<tbody>
		        			<tr>
		        				<td colspan="4" class=" text-light-blue text-center" >Ingrese un nombre para buscar</td>
		        			</tr>
		        		</tbody>
		        	</table>
		        </div><!-- /row -->
			</div>
		</div>


		<div class="box box-success" style="display:none">
			<div class="box-header">
				<h3 class="box-title">Agregar usuario</h3>
			</div>
			<div class="box-body">
				<!-- Contenido aqui -->
                #
			</div>
		</div>

		        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Aceptar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal direcciones -->
<div class="modal fade" id="mdlDirs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Seleccionar Direccion</h4>
      </div>
      <div class="modal-body">
        <table id="tblDir" class="table table-bordered">
        	<thead>
        		<tr>
        			<th>Distrito</th>
        			<th>Dirección</th>
        			<th>Piso</th>
        			<th>Interior</th>
        			<th>Teléfono</th>
        		</tr>
        	</thead>
        	<tbody>
        		<tr>
        			<td colspan="5" class=" text-light-blue text-center" >Seleccione usuario</td>
        		</tr>
        	</tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Aceptar</button>
      </div>
    </div>
  </div>
</div>


@endsection

@section('scripts')
	{!!Html::script('dist/js/alertify/alertify.js')!!}
	<!-- DatePicker -->
	{!!Html::script('plugins/date_picker/js/bootstrap-datepicker.js')!!}
	{!!Html::script('plugins/date_picker/locales/bootstrap-datepicker.es.min.js')!!}
	
	<!-- Select2 -->
	{!!Html::script('plugins/select2/select2.full.min.js')!!}

	<!-- producto -->
	{!!Html::script('dist/custom/addOrden.js')!!}

@endsection