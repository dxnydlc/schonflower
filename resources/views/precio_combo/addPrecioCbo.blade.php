
@extends('layouts.principal')

@section('titulo')
Schon Flower - Agregar Precio Combo
@endsection

@section('header-page')
<h1>
	Precio combos
<small>Precio para los tipos de menú que se venderán.</small>
</h1>
@endsection

@section('breadcrumb-page')
	<li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
	<li><a href="{{ url('/precio_combo') }}"><i class="fa fa-dashboard"></i> Precio combo</a></li>
	<li class="active">Agregar Precio combo</li>
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
						<h3 class="box-title">Datos del Combo</h3>
					</div>
					<div class="box-body">
						<!-- Contenido aqui -->
						{!!Form::open(['route'=>'precio_combo.store','method'=>'post','autocomplete'=>'off', 'class' => '' ])!!}
                        	@include('precio_combo.forms.form')
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
	{!!Html::script('dist/custom/addPrecioCbo.js')!!}

@endsection
