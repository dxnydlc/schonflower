
@extends('layouts.principal')

@section('titulo')
Schon Flower - Agregar Usuario
@endsection

@section('losCSS')
	{!!Html::style('dist/js/alertify/css/alertify.css')!!}
	{!!Html::style('plugins/date_picker/css/bootstrap-datepicker.css')!!}
	
	{!!Html::style('plugins/select2/select2.min.css')!!}

	<script> var _URL_HOME = '{{ URL_HOME }}'; </script>

@endsection

@section('header-page')
<h1>
	Usuario
<small>Usuarios activos en el sistema.</small>
</h1>
@endsection

@section('breadcrumb-page')
	<li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
	<li><a href="{{ url('/usuario') }}"><i class="fa fa-dashboard"></i> Usuario</a></li>
	<li class="active">Editar Producto</li>
@endsection

@section('content')

	@include('alertas.success')
    @include('alertas.errors')
    @include('alertas.mensaje')
    @include('alertas.usuario')

<input type="hidden" id="token" value="{{ csrf_token() }}" >

<div class="row">
	<div class=" col-lg-offset-3 col-lg-6  ">
		<div class="row">
			<div class="col-md-12">
				{!!Form::open(['route'=>'usuario.store','method'=>'post','autocomplete'=>'off', 'class' => '' ])!!}
				<input type="hidden" id="token" name="token" value="{{ $data['token'] }}" >
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Datos del Usuario</h3>
					</div>
					<div class="box-body">
						<!-- Contenido aqui -->
                    	@include('usuario.forms.form')
					</div>
				</div>
				<!-- /box -->
				<div class="box box-success">
					<div class="box-header">
						<h3 class="box-title">Direcciones del Usuario</h3>
					</div>
					<div class="box-body">
						<!-- Contenido aqui -->
                    	@include('usuario.forms.dirs')
					</div>
				</div>
				<!-- /box -->
				<div class="box box-info">
					<div class="box-header">
					</div>
					<div class="box-body">
						<div class="box-footer">
			                <button  type="submit" class="btn btn-primary">Guardar</button>
			            </div>
					</div>
				</div>
				<!-- /box -->
				{!!Form::close()!!}
			</div>
		</div>
	</div>
</div>



<!-- Modal -->
<div class="modal fade" id="mdlDir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar dirección</h4>
      </div>
      <div class="modal-body box">
        
        <div class="box-body">
		{!!Form::open(['route'=>'dir_user.store','method'=>'post','autocomplete'=>'off', 'id' => 'frmDir' ])!!}
		
		{!!Form::hidden('id_usuario',null,['id' => 'id_usuario'])!!}
		{!!Form::hidden('usuario',null,['id' => 'usuario'])!!}
		<input type="hidden" id="token" name="token" value="{{ $data['token'] }}" >

        	<div class="row">
        		<div class="col-md-6">
        			<div class="form-group">
						{!!Form::label('ubigeo','Distrito (*):' , ['for' => 'ubigeo' ] )!!}
					    {!!Form::select('ubigeo', $data['ubigeo'] ,null,[ 'id' => 'ubigeo', 'rel' => 'cliente', 'placeholder'=>'Seleccione','class'=>'form-control combito'])!!}
					    {!!Form::hidden('distrito',null,['id' => 'distrito'])!!}
					</div>
        		</div>
        		<div class="col-md-6">
        			<div class="form-group">
						{!!Form::label('direccion','Dirección (*):' , ['for' => 'direccion' ] )!!}
					    {!!Form::text('direccion',null,['class'=>'form-control'])!!}
					</div>
        		</div>
        		<div class="col-md-6">
        			<div class="form-group">
						{!!Form::label('piso','Piso (*):' , ['for' => 'piso' ] )!!}
					    {!!Form::text('piso',null,['class'=>'form-control'])!!}
					</div>
        		</div>
        		<div class="col-md-6">
        			<div class="form-group">
						{!!Form::label('interior','Interior (*):' , ['for' => 'interior' ] )!!}
					    {!!Form::text('interior',null,['class'=>'form-control'])!!}
					</div>
        		</div>
        		<div class="col-md-6">
        			<div class="form-group">
						{!!Form::label('telefono','Teléfono (*):' , ['for' => 'telefono' ] )!!}
					    {!!Form::text('telefono',null,['class'=>'form-control'])!!}
					</div>
        		</div>
        		<div class="col-md-12">
	        		<div class="form-group ">
					{!!Form::label('comentarios','Comentarios :' , ['for' => 'comentarios' ] )!!}
				    {!!Form::textarea('comentarios',null,['class'=>'form-control','rows' => '2'])!!}
					</div>
				</div>
        		<div class="col-md-6"></div>
        	</div>
		{!!Form::close()!!}	
        </div>
        <!-- /box-body -->

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnSaveDet" >Guardar</button>
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
	{!!Html::script('dist/custom/editUsuario.js')!!}

@endsection
