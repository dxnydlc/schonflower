
@extends('layouts.principal')

@section('titulo')
Schon Flower - Agregar Promoción
@endsection

@section('losCSS')
	{!!Html::style('dist/js/alertify/css/alertify.css')!!}

	<script> var _URL_HOME = '{{ URL_HOME }}'; </script>
	
@endsection

@section('header-page')
<h1>
	Productos
<small>Productos que se podrán usar en el menú.</small>
</h1>
@endsection

@section('breadcrumb-page')
	<li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
	<li><a href="{{ url('/producto') }}"><i class="fa fa-dashboard"></i> Promoción</a></li>
	<li class="active">Agregar Promoción</li>
@endsection

@section('content')

	@include('alertas.success')
    @include('alertas.errors')
    @include('alertas.mensaje')
    @include('alertas.usuario')
	
	<input type="hidden" id="token_lara" value="{{ csrf_token() }}" >

<div class="row">
	<div class=" col-lg-offset-3 col-lg-6  ">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Nombre de la promoción</h3>
					</div>
					<div class="box-body">
						<!-- Contenido aqui -->
						{!!Form::open(['route'=>'promo_combo.store','method'=>'post','autocomplete'=>'off', 'class' => '' ])!!}
							{!!Form::hidden('token',$data['token'],['id' => 'token'])!!}
                        	@include('promocion.forms.form')
                        	<div class="box-footer">
				                <button type="submit" class="btn btn-primary">Guardar</button>
				            </div>
                        {!!Form::close()!!}
					</div>
				</div>
			</div>
			<!-- /col-md-12 -->
		</div>
	</div>
</div>

<div class="row">
	<div class=" col-lg-offset-2 col-lg-8  ">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header">
						<!--<h3 class="box-title">Detalle de promoción</h3>-->
						<a href="#" class=" btn bg-navy" data-toggle="modal" data-target="#myModal" >Agregar Condición</a>
					</div>
					<div class="box-body">
						<!-- Contenido aqui -->
						<table class="table" id="tblDetalle" >
							<thead>
								<tr>
									<th>Condición</th>
									<th>Precio combo</th>
									<th></th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
			<!-- /col-md-12 -->
		</div>
	</div>
</div>





<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  	<div class="modal-dialog" role="document">
	    <div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Agregar Condición</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					{!!Form::open(['route'=>'det_menu.store','method'=>'post','autocomplete'=>'off', 'id' => 'frmDetalle' ])!!}
						{!!Form::hidden('token',$data['token'],['id' => 'token'])!!}
						<div class="col-md-4" >
							{!!Form::label('condicion_1','Condición 1:' , ['for' => 'condicion_1' ] )!!}
		    				{!!Form::select('condicion_1', $data['categoria'] ,null,[ 'id' => 'condicion_1', 'placeholder'=>'Seleccione','class'=>'form-control combito'])!!}
						</div><!-- /col-md-4 -->
						<div class="col-md-4" >
							{!!Form::label('condicion_2','Condición 2:' , ['for' => 'condicion_2' ] )!!}
		    				{!!Form::select('condicion_2', $data['categoria'] ,null,[ 'id' => 'condicion_2', 'placeholder'=>'Seleccione','class'=>'form-control combito'])!!}
						</div><!-- /col-md-4 -->
						<div class="col-md-4" >
							{!!Form::label('precio','Precio:' , ['for' => 'precio' ] )!!}
			    			{!!Form::text('precio',null,['class'=>'form-control'])!!}
						</div><!-- /col-md-4 -->
					{!!Form::close()!!}
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button id="btnSaveDet" type="button" class="btn btn-primary">Save changes</button>
			</div>
	    </div>
  	</div>
</div>


@endsection


@section('scripts')

	<!-- js custom -->
	{!!Html::script('dist/custom/addPromocion.js')!!}

@endsection
