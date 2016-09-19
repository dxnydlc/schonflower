@extends('layouts.principal')

@section('titulo')
Schon Flower - Menú
@endsection

@section('losCSS')
	{!!Html::style('dist/js/alertify/css/alertify.css')!!}
	{!!Html::style('plugins/date_picker/css/bootstrap-datepicker.css')!!}
@endsection

@section('header-page')
<h1>
	Menú
<small>Menú para la venta</small>
</h1>
@endsection

@section('breadcrumb-page')
	<li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
	<li><a href="{{ url('/menu') }}"><i class="fa fa-dashboard"></i> Menu</a></li>
	<li class="active">Agregar Menú</li>
@endsection


@section('content')

	@include('alertas.success')
    @include('alertas.errors')
    @include('alertas.mensaje')
    @include('alertas.usuario')

<div class="row">
	<div class=" col-lg-offset-3 col-lg-6  ">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Producto</h3>
					</div>
					<div class="box-body">
						<!-- Contenido aqui -->
						{!!Form::open(['route'=>'menu.store','method'=>'post','autocomplete'=>'off', 'class' => '' ])!!}
                        	@include('menu.forms.form')
                        	<div class="box-footer">
				                <button type="submit" class="btn btn-primary">Guardar</button>
				            </div>
                        {!!Form::close()!!}
					</div>
				</div>
				<!-- /box -->
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Seleccionar Clase de producto</h4>
      </div>
      <div class="modal-body">
        <div class="form-group  ">
		{!!Form::label('mask_categoria','Tipo de Menú (*):' , ['for' => 'mask_categoria' ] )!!}
	    {!!Form::select('mask_categoria', $data['categoria'] ,null,[ 'id' => 'mask_categoria', 'placeholder'=>'Seleccione','class'=>'form-control combito'])!!}
	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button id="btnSelCateg" type="button" class="btn btn-primary">Seleccionar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection


@section('scripts')
	
	<!-- DatePicker -->
	{!!Html::script('plugins/date_picker/js/bootstrap-datepicker.js')!!}
	{!!Html::script('plugins/date_picker/locales/bootstrap-datepicker.es.min.js')!!}

	<!-- producto -->
	{!!Html::script('dist/custom/addMenu.js')!!}

@endsection

