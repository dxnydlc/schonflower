
@extends('layouts.principal')

@section('titulo')
Schon Flower - Agregar Orden Manual
@endsection

@section('losCSS')
	{!!Html::style('dist/js/alertify/css/alertify.css')!!}
	{!!Html::style('plugins/date_picker/css/bootstrap-datepicker.css')!!}

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
	<div class=" col-lg-12  ">
		{!!Form::open(['route'=>'categoria.store','method'=>'post','autocomplete'=>'off', 'class' => '' ])!!}
		<div class="row">

			<div class="col-md-6">
				<div class="box box-success">
					<div class="box-header">
						<h3 class="box-title">Datos del documento</h3>
					</div>
					<div class="box-body">
						<!-- Contenido aqui -->
                        @include('orden.forms.doc')
					</div>
				</div>
			</div>
			<!-- /col-md-6 -->

			<div class="col-md-6">
				<div class="box box-success">
					<div class="box-header">
						<h3 class="box-title">Datos del cliente</h3>
					</div>
					<div class="box-body">
						<!-- Contenido aqui -->
                        @include('orden.forms.form')
					</div>
				</div>
			</div>
			<!-- /col-md-6 -->

		</div>
		<div class="row">
			<div class="col-md-6">
				<div id="facturaFrame" class="box box-success" style="display:none" >
					<div class="box-header">
						<h3 class="box-title">Datos Factura</h3>
					</div>
					<div class="box-body">
						<!-- Contenido aqui -->
                        	@include('orden.forms.factura')
					</div>
				</div>
			</div>
			<!-- /col-md-6 -->
		</div>
		{!!Form::close()!!}

		<div class="row">
			<div class="col-md-12">

				<div class="box box-success">
					<div class="box-header">
						<h3 class="box-title">Detalle del pedido</h3>
						<a href="#" class=" btn btn-primary btn-sm " data-toggle="modal" data-target="#myModal" >Agregar Plato</a>
					</div>
					<div class="box-body">
						<!-- Contenido aqui -->
						<table id="tblMenu" class="table table-hover">
							<thead>
								<tr>
									<th>Tipo</th>
									<th>Plato</th>
									<th>Lote</th>
									<th>SKU</th>
									<th>Precio</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div><!-- /box-success -->

				
				<div class="box box-success">
					<div class="box-body">
						<!-- Contenido aqui -->
						<div class="row">
							<div class="col-md-4 col-md-offset-8">
								<table class=" table table-hover " >
		                    		<thead>
		                    			<tr>
		                    				<th class="text-right" >Sub Total</th>
		                    				<td class="text-right" >10.00</td>
		                    			</tr>
		                    			<tr>
		                    				<th class="text-right" >Delivery</th>
		                    				<td class="text-right" >10.00</td>
		                    			</tr>
		                    			<tr>
		                    				<th class="text-right" >Descuento</th>
		                    				<td class="text-right" >10.00</td>
		                    			</tr>
		                    			<tr>
		                    				<th class="text-right" >Total</th>
		                    				<td class="text-right" >10.00</td>
		                    			</tr>
		                    		</thead>
		                    	</table>
							</div>
						</div>    	
					</div>
				</div><!-- /box-success -->

				<div class="box box-success">
					<div class="box-body">
						<!-- Contenido aqui -->
						<div class="row">
							<div class="col-md-3">
								<div class="box-footer">
		                    		<a class="btn btn-block btn-social btn-bitbucket ">
										<i class="fa fa-money"></i>
										Proceder con el pago
									</a>
					            </div>
							</div>
						</div>
		                    	
					</div>
				</div><!-- /box-success -->

			</div>
		</div>

	</div>
</div>

<!-- Usuarios -->
<div class="modal fade" id="mdlUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Buscar Usuario</h4>
      </div>
      <div class="modal-body">
        
        <div class="box box-success">
			<div class="box-body">
				<!-- Contenido aqui -->
                <div class="row">
					<div class="col-md-6">
						<div class="input-group">
							<input id="query_user" type="text" class="form-control" placeholder="Nombres">
							<span class="input-group-btn">
								<button id="buscar_usuario" class="btn btn-default" type="button">Buscar</button>
							</span>
						</div><!-- /input-group -->
					</div><!-- /.col-md-6 -->
					<div class="col-md-4 col-md-offset-1">
						<a href="#" class=" btn btn-block btn-success btn-sm " >Agregar usuario</a>
					</div><!-- /.col-md-5 -->
		        </div><!-- /row -->
		        <div class="row">
		        	<table id="tblUsers" class=" table table-bordered ">
		        		<thead>
		        			<tr>
		        				<th>#</th>
		        				<th>Nombre</th>
		        				<th>Email</th>
		        				<th>Telefono</th>
		        			</tr>
		        		</thead>
		        		<tbody>
		        			<tr>
		        				<td colspan="4" class=" text-light-blue text-center" >Ingrese un nombre para buscar</td>
		        			</tr>
		        		</tbody>
		        	</table>
		        </div><!-- /row -->
			</div>
		</div>


		<div class="box box-success" style="display:none">
			<div class="box-header">
				<h3 class="box-title">Agregar usuario</h3>
			</div>
			<div class="box-body">
				<!-- Contenido aqui -->
                #
			</div>
		</div>

		        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Aceptar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal direcciones -->
<div class="modal fade" id="mdlDirs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Seleccionar Direccion</h4>
      </div>
      <div class="modal-body">
        <table id="tblDir" class="table table-bordered">
        	<thead>
        		<tr>
        			<th>Distrito</th>
        			<th>Dirección</th>
        			<th>Piso</th>
        			<th>Interior</th>
        			<th>Teléfono</th>
        		</tr>
        	</thead>
        	<tbody>
        		<tr>
        			<td colspan="5" class=" text-light-blue text-center" >Seleccione usuario</td>
        		</tr>
        	</tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Aceptar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal add plato -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Buscar producto</h4>
      </div>
      <div class="modal-body">
        
        <table class="table">
        	<thead>
        		<tr>
        			<th>Tipo</th>
        			<th>Producto</th>
        			<th>SKU</th>
        			<th>Precio</th>
        			<th>Stock</th>
        		</tr>
        	</thead>
        	<tbody>
        		@foreach($data['platos'] as $rs)
                    <tr>
                        <td>{{$rs->categoria}}</td>
                        <td><a href="#" class="setPlato" >{{$rs->producto}}</a></td>
                        <td>{{$rs->sku}}</td>
                        <td>{{$rs->precio}}</td>
                        <td>{{$rs->stock}}</td>
                    </tr>
				@endforeach
        	</tbody>
        </table>
		
		{!!Form::open(['route'=>'det_orden_manual.store','method'=>'post','autocomplete'=>'off', 'id' => 'frmDetalle' ])!!}
			
			<input type="hidden" id="token" name="token" value="{{ $data['token'] }}" >
			  
			<div class="row">
				<div class="col-md-4">
        			<div class="form-group">
					    {!!Form::text('id_orden',0,['class'=>'form-control','id' => 'id_orden'])!!}
					</div>
        		</div>
        		<div class="col-md-4">
        			<div class="form-group">
					    {!!Form::text('id_menu',0,['class'=>'form-control','id' => 'id_menu'])!!}
					</div>
        		</div>
        		<div class="col-md-4">
        			<div class="form-group">
					    {!!Form::text('tipo_menu',null,['class'=>'form-control','id' => 'tipo_menu'])!!}
					</div>
        		</div>
        		<div class="col-md-4">
        			<div class="form-group">
						{!!Form::text('id_plato',null,['class'=>'form-control','id' => 'id_plato'])!!}
					</div>
        		</div>
        		<div class="col-md-4">
        			<div class="form-group">
						{!!Form::text('plato',null,['class'=>'form-control','id' => 'plato'])!!}
					</div>
        		</div>
        		<div class="col-md-4">
        			<div class="form-group">
						{!!Form::text('lote',null,['class'=>'form-control','id' => 'lote'])!!}
					</div>
        		</div>
        		<div class="col-md-4">
        			<div class="form-group">
						{!!Form::text('sku',null,['class'=>'form-control','id' => 'sku'])!!}
					</div>
        		</div>
        		<div class="col-md-4">
        			<div class="form-group">
						{!!Form::text('cantidad',null,['class'=>'form-control','id' => 'cantidad'])!!}
					</div>
        		</div>
        		<div class="col-md-4">
        			<div class="form-group">
						{!!Form::text('precio',null,['class'=>'form-control','id' => 'precio'])!!}
					</div>
        		</div>
        		<div class="col-md-4">
        			<div class="form-group">
						{!!Form::text('total',null,['class'=>'form-control','id' => 'total'])!!}
					</div>
        		</div>
        	</div>

		{!!Form::close()!!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>



@endsection

@section('scripts')
	{!!Html::script('dist/js/alertify/alertify.js')!!}
	<!-- DatePicker -->
	{!!Html::script('plugins/date_picker/js/bootstrap-datepicker.js')!!}
	{!!Html::script('plugins/date_picker/locales/bootstrap-datepicker.es.min.js')!!}
	
	<!-- Select2 -->
	{!!Html::script('plugins/select2/select2.full.min.js')!!}

	<!-- producto -->
	{!!Html::script('dist/custom/addOrden.js?v=434')!!}

@endsection