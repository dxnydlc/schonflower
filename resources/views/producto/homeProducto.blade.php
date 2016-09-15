
@extends('layouts.principal')

@section('titulo')
Schon Flower - Productos
@endsection

@section('losCSS')
	{!!Html::style('dist/js/alertify/css/alertify.css')!!}
@endsection

@section('header-page')
<h1>
	Productos
<small>Productos que se podrán usar en el menú.</small>
</h1>
@endsection

@section('breadcrumb-page')
	<li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
	<li class="active">Producto</li>
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
					<a href="{{ url('/producto/create') }}" class="btn btn-app">
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
			  <h3 class="box-title">Listando los productos</h3>

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
					  <th>Categoria</th>
					  <th>SKU</th>
					  <th>Creado</th>
					</tr>
			  	</thead>
			  	<tbody>
			  		@foreach($dataProd as $producto)
	                    <tr>
	                        <th scope="row">{{$producto->id}}</th>
	                        <td>
	                            {!!link_to_route('producto.edit', $title  = $producto->nombre, $parameters =$producto->id, $attributes = ['class'=>'btn-link '] )!!}
	                        </td>
	                        <td>{{$producto->nombre_categoria}}</td>
	                        <td>{{$producto->sku}}</td>
	                        <td>{{$producto->created_at}}</td>
	                        <td>
	                            {!!link_to_route('producto.edit', $title  = 'Anular', $parameters =$producto->id, $attributes = ['class'=>'btn-link delCateg ','id'=>$producto->id,'alt' => $producto->nombre] )!!}
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
