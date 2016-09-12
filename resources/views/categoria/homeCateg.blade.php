
@extends('layouts.principal')

@section('titulo')
Schon Flower - Categorias
@endsection

@section('header-page')
<h1>
	Categorías
<small>Categorías de los platos a la venta</small>
</h1>
@endsection

@section('breadcrumb-page')
	<li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
	<li class="active">Categorías</li>
@endsection

@section('content')

	@include('alertas.success')
    @include('alertas.errors')
    @include('alertas.mensaje')
    @include('alertas.usuario')

	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header"></div>
				<div class="box-body">
					<a href="{{ url('/categoria/create') }}" class="btn btn-app">
						<i class="fa fa-plus"></i>Agregar
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
		  <div class="box">
			<div class="box-header">
			  <h3 class="box-title">Listando las categorías actuales</h3>

			  <div class="box-tools">
				<div class="input-group input-group-sm" style="width: 150px;">
				  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

				  <div class="input-group-btn">
					<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
				  </div>
				</div>
			  </div>
			  <!-- /box-tools -->

			</div>
			<!-- /.box-header -->
			<div class="box-body table-responsive no-padding">
			  <table class="table table-hover">
				<tr>
				  <th>ID</th>
				  <th>Nombre</th>
				  <th>Creado</th>
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
			  </table>
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->
		</div>
	</div>


@endsection
