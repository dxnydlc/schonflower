
@extends('layouts.principal')

@section('titulo')
Schon Flower - Usuarios
@endsection

@section('losCSS')
	{!!Html::style('dist/js/alertify/css/alertify.css')!!}

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
	<li class="active">Usuario</li>
@endsection

@section('content')

<input type="hidden" id="token" value="{{ csrf_token() }}" >

	@include('alertas.success')
    @include('alertas.errors')
    @include('alertas.mensaje')
    @include('alertas.usuario')

	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header"></div>
				<div class="box-body">
					<a href="{{ url('/usuario/create') }}" class="btn btn-app">
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
			  <h3 class="box-title">Listando los usuarios activos</h3>

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
			  	<thead>
			  		<tr>
					  <th>ID</th>
					  <th>Nombre</th>
					  <th>Correo</th>
					  <th>Telefono</th>
					  <th>Tipo</th>
					  <th>Creado</th>
					  <th></th>
					</tr>
			  	</thead>
			  	<tbody>
			  		@foreach($dataProd as $rs)
	                    <tr>
	                        <th scope="row">{{$rs->id}}</th>
	                        <td>
	                            {!!link_to_route('usuario.edit', $title  = $rs->name.' '.$rs->apellidos, $parameters =$rs->id, $attributes = ['class'=>'btn-link '] )!!}
	                        </td>
	                        <td>{{$rs->email}}</td>
	                        <td>{{$rs->telefono}}</td>
	                        <td>{{$rs->tipo}}</td>
	                        <td>{{$rs->created_at}}</td>
	                        <td>
	                            {!!link_to_route('usuario.edit', $title  = 'Anular', $parameters =$rs->id, $attributes = ['class'=>'btn-link delCateg ','id'=>$rs->id,'alt' => $rs->name.' '.$rs->apellidos] )!!}
	                        </td>
	                    </tr>
	                    @endforeach
			  	</tbody>
			  </table>
			  {!!$dataProd->render()!!}
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->
		</div>
	</div>


@endsection


@section('scripts')
	{!!Html::script('dist/js/alertify/alertify.js')!!}
	
	<!-- producto -->
	{!!Html::script('dist/custom/producto.js')!!}
@endsection
