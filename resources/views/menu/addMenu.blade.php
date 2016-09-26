@extends('layouts.principal')

@section('titulo')
Schon Flower - Menú
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
						{!!Form::open(['route'=>'menu.store','method'=>'post','autocomplete'=>'off', 'class' => '' ])!!}
							{!!Form::hidden('token',$data['token'],['id' => 'token'])!!}
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
					<div class="box-body table-responsive no-padding">
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
						<table class="table table-hover">
							<tbody>
								<tr>
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
			
			<div class="row">
				{!!Form::open(['route'=>'det_menu.store','method'=>'post','autocomplete'=>'off', 'id' => 'frmDetalle' ])!!}
					{!!Form::hidden('token',$data['token'],['id' => 'token'])!!}
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
				{!!Form::close()!!}
			</div>

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
	
	<!-- DatePicker -->
	{!!Html::script('plugins/date_picker/js/bootstrap-datepicker.js')!!}
	{!!Html::script('plugins/date_picker/locales/bootstrap-datepicker.es.min.js')!!}
	
	<!-- Select2 -->
	{!!Html::script('plugins/select2/select2.full.min.js')!!}

	<!-- producto -->
	{!!Html::script('dist/custom/addMenu.js')!!}

@endsection

