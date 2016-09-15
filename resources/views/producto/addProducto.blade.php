
@extends('layouts.principal')

@section('titulo')
Schon Flower - Agregar Producto
@endsection

@section('header-page')
<h1>
	Productos
<small>Productos que se podrán usar en el menú.</small>
</h1>
@endsection

@section('breadcrumb-page')
	<li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
	<li><a href="{{ url('/producto') }}"><i class="fa fa-dashboard"></i> Producto</a></li>
	<li class="active">Agregar Producto</li>
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
						<h3 class="box-title">Datos del producto</h3>
					</div>
					<div class="box-body">
						<!-- Contenido aqui -->
						{!!Form::open(['route'=>'producto.store','method'=>'post','autocomplete'=>'off', 'class' => '' ])!!}
                        	@include('producto.forms.form')
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


@section('scripts')

	<!-- producto -->
	{!!Html::script('dist/custom/addProducto.js')!!}

@endsection
