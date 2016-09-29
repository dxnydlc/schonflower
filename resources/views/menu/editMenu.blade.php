@extends('layouts.principal')

@section('titulo')
Schon Flower - Editar Menú
@endsection

@section('losCSS')
	{!!Html::style('dist/js/alertify/css/alertify.css')!!}
	{!!Html::style('plugins/date_picker/css/bootstrap-datepicker.css')!!}
	
	{!!Html::style('plugins/select2/select2.min.css')!!}

<script>
	var _json_pc = {!! $data['json_pc'] !!}
</script>

@endsection

@section('header-page')
<h1>
	Menú
<small>Menú para la venta</small>
</h1>
@endsection

@section('breadcrumb-page')
	<li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
	<li><a href="{{ url('/menu') }}"><i class="fa fa-dashboard"></i> Menu</a></li>
	<li class="active">Agregar Menú</li>
@endsection


@section('content')

	@include('alertas.success')
    @include('alertas.errors')
    @include('alertas.mensaje')
    @include('alertas.usuario')

<input type="hidden" id="token_lara" value="{{ csrf_token() }}" >


<div class="row">
	<div class=" col-lg-offset-1 col-lg-10  ">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header">
						<h3 class="box-title">Datos del Menú</h3>
					</div>
					<div class="box-body">
						<!-- Contenido aqui -->
						{!!Form::model(  $data['menu'] , [ 'route' => [ 'menu.update' , $data['menu']->id ] ,'method'=>'PUT','autocomplete'=>'off', 'class' => '' ])!!}
							
							{!!Form::hidden('token',null,['id' => 'token'])!!}
							{!!Form::hidden('id_menu',$data['menu']->id,['id' => 'id_menu'])!!}
                        	@include('menu.forms.form')
                        	<div class="box-footer">
				                <button type="submit" class="btn btn-primary">Guardar</button>
				            </div>
                        {!!Form::close()!!}
					</div>
				</div>
				<!-- /box -->
				<div class="box box-success">
					<div class="box-header">
						<h3 class="box-title">Platos del Grupo</h3>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-md-12">
								<div class="box">
									<div class="box-header"></div>
									<div class="box-body">
										<a href="#" class="btn btn-primary " data-toggle="modal" data-target="#myModal" >
											<i class="fa fa-plus"></i> Agregar Plato
										</a>
									</div>
								</div>
							</div>
						</div>
						<table id="tblDetalle" class="table table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Categoria</th>
									<th>Plato</th>
									<th>SKU</th>
									<th>Precio</th>
									<th>Stock</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($data['detalle'] as $rs)
								<?php
								$clase = '';
								switch( $rs->categoria )
								{
									case 'Entrada':
										$clase = 'label-success';
									break;
									case 'Plato de fondo':
										$clase = 'label-info';
									break;
									case 'Plato a la carta':
										$clase = 'label-danger';
									break;
								}
								?>
								<tr  id="Plato_{{ $rs->id }}"  >
									<td>{{ $rs->id }}</td>
									<td><span class="label {{ $clase }} ">{{ $rs->categoria }}</span></td>
									<td>{{ $rs->producto }}</td>
									<td>{{ $rs->sku }}</td>
									<td>{{ $rs->precio }}</td>
									<td>{{ $rs->stock }}</td>
									<td><a id="{{ $rs->id }}" alt="{{ $rs->producto }}" href="#" class="btn btn-sm btn-danger quitarItem" ><span class="fa fa-minus-circle" ></span></a></td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<!-- /box -->
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
		<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Seleccionar Plato</h4>
		</div>
		<div class="modal-body">
			
			
				{!!Form::open(['route'=>'det_menu.store','method'=>'post','autocomplete'=>'off', 'id' => 'frmDetalle' ])!!}
				
				<div class="row">
					{!!Form::hidden('token',$data['token'],['id' => 'token'])!!}
					{!!Form::hidden('id_menu',$data['menu']->id,['id' => 'id_menu'])!!}

					<div class=" form-group col-lg-4 ">
						{!!Form::label('id_categoria','Categoria plato (*):' , ['for' => 'id_categoria' ] )!!}
						{!!Form::select('id_categoria', $data['categoria'] ,null,[ 'id' => 'id_categoria', 'placeholder'=>'Seleccione','class'=>'form-control combito','style' => 'width:100%'])!!}
						{!!Form::hidden('categoria',null,['id' => 'categoria'])!!}
					</div>
					<div class=" form-group col-lg-4 ">
						{!!Form::label('producto','Tipo de Menú (*):' , ['for' => 'producto' ] )!!}
						<select name="id_producto" id="id_producto" style="width:100%" class="form-control combito">
							<option value="">Seleccione Categoria Plato</option>
						</select>
						{!!Form::hidden('producto',null,['id' => 'producto'])!!}
					</div>
				</div>
				<div class="row">
					<div id="wrapper_precio" class="form-group col-lg-4 col-md-4 ">
						{!!Form::label('precio','Precio:' , ['for' => 'precio' ] )!!}
					    {!!Form::text('precio',null,['class'=>'form-control','readonly'=>'readonly'])!!}
					</div>
					<div class="form-group col-lg-4 col-md-4 ">
						{!!Form::label('sku','SKU:' , ['for' => 'sku' ] )!!}
					    {!!Form::text('sku',null,['class'=>'form-control','readonly'=>'readonly'])!!}
					</div>
					<div id="wrapper_precio" class="form-group col-lg-4 col-md-4 ">
						{!!Form::label('stock','Stock (*):' , ['for' => 'stock' ] )!!}
					    {!!Form::text('stock',null,['class'=>'form-control'])!!}
					</div>
				</div>
				{!!Form::close()!!}
			

		</div>
		<!-- /.modal-body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button id="btnSaveDet" type="button" class="btn btn-primary">Agregar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection


@section('scripts')

	{!!Html::script('dist/js/alertify/alertify.js')!!}

	<!-- DatePicker -->
	{!!Html::script('plugins/date_picker/js/bootstrap-datepicker.js')!!}
	{!!Html::script('plugins/date_picker/locales/bootstrap-datepicker.es.min.js')!!}
	
	<!-- Select2 -->
	{!!Html::script('plugins/select2/select2.full.min.js')!!}

	<!-- producto -->
	{!!Html::script('dist/custom/addMenu.js')!!}

@endsection

