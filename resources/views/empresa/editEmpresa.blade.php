
@extends('layouts.principal')

@section('titulo')
Schon Flower - Empresa
@endsection

@section('header-page')
<h1>
	Empresa
<small>Editar una nueva empresa para clasificar un producto</small>
</h1>
@endsection

@section('breadcrumb-page')
	<li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
	<li><a href="{{ url('/empresa') }}"><i class="fa fa-dashboard"></i> Empresa</a></li>
	<li class="active">Agregar Empresa</li>
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
						<h3 class="box-title">Datos de la empresa a editar</h3>
					</div>
					<div class="box-body">
						<!-- Contenido aqui -->
						{!!Form::model ($data , [ 'route' => ['empresa.update' , $data->id ], 'method' => 'PUT' ,'autocomplete'=>'off'])!!}
                        	@include('empresa.forms.form')
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
