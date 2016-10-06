
@extends('layouts.principal')

@section('titulo')
Schon Flower - Editar Usuario
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

<div class="row">
	<div class=" col-lg-offset-3 col-lg-6  ">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Datos del Usuario</h3>
					</div>
					<div class="box-body">
						<!-- Contenido aqui -->
						{!!Form::model( $data['usuario'] , [ 'route' => [ 'usuario.update' , $data['usuario']->id ] ,'method'=>'PUT','autocomplete'=>'off', 'class' => '' ])!!}
                        	@include('usuario.forms.form')
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

@endsection
