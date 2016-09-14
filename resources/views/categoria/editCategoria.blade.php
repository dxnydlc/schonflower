
@extends('layouts.principal')

@section('titulo')
Schon Flower - Categorias
@endsection

@section('header-page')
<h1>
	Categorías
<small>Agregar una nueva categoría para clasificar un producto</small>
</h1>
@endsection

@section('breadcrumb-page')
	<li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
	<li><a href="{{ url('/categoria') }}"><i class="fa fa-dashboard"></i> Categoría</a></li>
	<li class="active">Agregar Categoría</li>
@endsection


@section('content')

<div class="row">
	<div class=" col-lg-offset-3 col-lg-6  ">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Datos de la categoría a editar</h3>
					</div>
					<div class="box-body">
						<!-- Contenido aqui -->
						{!!Form::model ($categoria , [ 'route' => ['categoria.update' , $categoria->id ], 'method' => 'PUT' ,'autocomplete'=>'off'])!!}
                        	@include('categoria.forms.form')
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
