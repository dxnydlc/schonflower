
@extends('layouts.principal')

@section('titulo')
Schon Flower - Editar Tipo Menú
@endsection

@section('header-page')
<h1>
	Tipo Menú
<small>Clasificar los menú</small>
</h1>
@endsection

@section('breadcrumb-page')
	<li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
	<li><a href="{{ url('/tipo_menu') }}"><i class="fa fa-dashboard"></i> Tipo Menú</a></li>
	<li class="active">Agregar Tipo Menú</li>
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
						<h3 class="box-title">Datos del Tipo Menú a editar</h3>
					</div>
					<div class="box-body">
						<!-- Contenido aqui -->
						{!!Form::model ($data , [ 'route' => ['tipo_menu.update' , $data->id ], 'method' => 'PUT' ,'autocomplete'=>'off'])!!}
                        	@include('tipo_menu.forms.form')
                        	<div class="box-footer">
				                <button type="submit" class="btn btn-primary">Guardar</button>
				            </div>
                        {!!Form::close()!!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
