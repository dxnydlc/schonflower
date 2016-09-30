
@extends('layouts.principal')

@section('titulo')
Schon Flower - Menú
@endsection

@section('losCSS')
	{!!Html::style('dist/js/alertify/css/alertify.css')!!}

	<script> var _URL_HOME = '{{ URL_HOME }}'; </script>

@endsection

@section('header-page')
<h1>
	Menú
<small>Menú para la venta</small>
</h1>
@endsection

@section('breadcrumb-page')
	<li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
	<li class="active">Menú</li>
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
					<a href="{{ url('/menu/create') }}" class="btn btn-app">
						<i class="fa fa-plus"></i>Agregar menú
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
		  <div class="box">
			<div class="box-header">
			  <h3 class="box-title">Listando los menú actuales</h3>

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
					  <th>#</th>
					  <th>Fecha</th>
					  <th>Combo</th>
					  <th>Precio</th>
					  <th>Lote</th>
					</tr>
			  	</thead>
			  	<tbody>
			  		@foreach($dataMenu as $rs)
	                    <tr>
	                        <th scope="row">{{$rs->id}}</th>
	                        <td>
	                            {!!link_to_route('menu.edit', $title  = 'Menú '.$rs->fecha, $parameters =$rs->id, $attributes = ['class'=>'btn-link '] )!!}
	                        </td>
	                        <td>{{$rs->combo}}</td>
	                        <td>{{$rs->precio}}</td>
	                        <td>{{$rs->lote}}</td>
	                        <td>
	                            {!!link_to_route('menu.edit', $title  = 'Anular', $parameters =$rs->id, $attributes = ['class'=>'btn-link delCateg ','id'=>$rs->id,'alt' => 'Menú '.$rs->fecha] )!!}
	                        </td>
	                    </tr>
	                    @endforeach
			  	</tbody>
			  </table>
			  {!!$dataMenu->render()!!}
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
	{!!Html::script('dist/custom/menu_hoy.js')!!}
@endsection
