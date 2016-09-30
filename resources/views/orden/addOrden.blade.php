
@extends('layouts.principal')

@section('titulo')
Schon Flower - Agregar Categorias
@endsection

@section('losCSS')
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
	<div class=" col-lg-offset-1 col-lg-10  ">
		<div class="row">
			<div class="col-md-12">
			
			{!!Form::open(['route'=>'categoria.store','method'=>'post','autocomplete'=>'off', 'class' => '' ])!!}

				<div class="box box-success">
					<div class="box-header">
						<h3 class="box-title">Datos del cliente</h3>
					</div>
					<div class="box-body">
						<!-- Contenido aqui -->
                        	@include('orden.forms.form')
					</div>
				</div>

				<div class="box box-success">
					<div class="box-header">
						<h3 class="box-title">Datos Factura</h3>
					</div>
					<div class="box-body">
						<!-- Contenido aqui -->
                        	@include('orden.forms.factura')
					</div>
				</div>

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


			
			{!!Form::close()!!}

			</div>
		</div>
	</div>
</div>

@endsection
