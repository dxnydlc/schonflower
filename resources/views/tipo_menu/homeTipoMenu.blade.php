
@extends('layouts.principal')

@section('titulo')
Schon Flower - Tipo Menú
@endsection

@section('losCSS')
	{!!Html::style('dist/js/alertify/css/alertify.css')!!}
@endsection

@section('header-page')
<h1>
	Tipo Menú
<small>Clasificar los menú</small>
</h1>
@endsection

@section('breadcrumb-page')
	<li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
	<li class="active">Tipo Menú</li>
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
					<a href="{{ url('/tipo_menu/create') }}" class="btn btn-app">
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
			  <h3 class="box-title">Listando los tipo de menu actuales</h3>

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
					  <th>Creado</th>
					</tr>
			  	</thead>
			  	<tbody>
			  		@foreach($dataTipoMenu as $tipo_menu)
	                    <tr>
	                        <th scope="row">{{$tipo_menu->id}}</th>
	                        <td>
	                            {!!link_to_route('tipo_menu.edit', $title  = $tipo_menu->nombre, $parameters =$tipo_menu->id, $attributes = ['class'=>'btn-link '] )!!}
	                        </td>
	                        <td>{{$tipo_menu->created_at}}</td>
	                        <td>
	                            {!!link_to_route('tipo_menu.edit', $title  = 'Anular', $parameters =$tipo_menu->id, $attributes = ['class'=>'btn-link delCateg ','id'=>$tipo_menu->id,'alt' => $tipo_menu->nombre] )!!}
	                        </td>
	                    </tr>
	                    @endforeach
			  	</tbody>
			  </table>
			  {!!$dataTipoMenu->render()!!}
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->
		</div>
	</div>


@endsection


@section('scripts')
	{!!Html::script('dist/js/alertify/alertify.js')!!}
	
	<!-- Categoria -->
	{!!Html::script('dist/custom/tipo_menu.js')!!}
@endsection
