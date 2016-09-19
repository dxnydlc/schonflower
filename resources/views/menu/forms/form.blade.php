<div class="box-body">

	<div class="row">
		
		<div class="form-group col-lg-6 col-md-6 ">
			{!!Form::label('id_tipo_menu','Tipo de Menú (*):' , ['for' => 'id_tipo_menu' ] )!!}
		    {!!Form::select('id_tipo_menu', $data['tipo_menu'] ,null,[ 'id' => 'id_tipo_menu', 'placeholder'=>'Seleccione','class'=>'form-control combito'])!!}
		    {!!Form::hidden('tipo_menu',null,['id' => 'tipo_menu'])!!}
		</div>

		<div class="form-group col-lg-6 col-md-6 ">
			{!!Form::label('categoria','Categoria :' , ['for' => 'categoria' ] )!!}
		    <div class="input-group input-group-sm ">
				{!!Form::text('categoria',null,['class'=>'form-control','id'=>'categoria','readonly'=>'readonly'])!!}
				<span class="input-group-btn">
					<button class="btn btn-info btn-flat" type="button" data-toggle="modal" data-target="#myModal" >Buscar!</button>
				</span>
			</div>
			{!!Form::hidden('id_categoria',null,['id' => 'id_categoria'])!!}
		</div>
	
	</div>
	<div class="row">

		<div class="form-group col-lg-6 col-md-6 ">
			{!!Form::label('id_producto','Producto (*):' , ['for' => 'id_producto' ] )!!}
		    {!!Form::select('id_producto', $data['productos'] ,null,[ 'id' => 'id_producto', 'placeholder'=>'Seleccione','class'=>'form-control combito'])!!}
		    {!!Form::hidden('producto',null,['id' => 'producto'])!!}
		</div>

	</div>

	<div class="row">
		<div class="form-group col-lg-6 col-md-6 ">
			{!!Form::label('lote','Lote (*):' , ['for' => 'lote' ] )!!}
		    {!!Form::text('lote',null,['class'=>'form-control'])!!}
		</div>

		<div class="form-group col-lg-6 col-md-6 ">
			{!!Form::label('lote','Fecha (*):' , ['for' => 'lote' ] )!!}
			<div class="input-group date">
	          <div class="input-group-addon">
	            <i class="fa fa-calendar"></i>
	          </div>
	          {!!Form::text('fecha',$data['fecha'],['class'=>'form-control','id'=>'fecha'])!!}
	        </div>
		</div>
		
		<div class="form-group col-lg-6 col-md-6 ">
			{!!Form::label('precio','Precio (*):' , ['for' => 'precio' ] )!!}
		    {!!Form::text('precio',null,['class'=>'form-control'])!!}
		</div>

		<div class="form-group col-lg-6 col-md-6 ">
			{!!Form::label('stock','Stock (*):' , ['for' => 'stock' ] )!!}
		    {!!Form::text('stock',null,['class'=>'form-control'])!!}
		</div>
			
	</div>
		

</div>