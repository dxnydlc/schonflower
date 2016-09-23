<div class="box-body">

	<div class="form-group">
		{!!Form::label('nombre','Nombre (*):' , ['for' => 'nombre' ] )!!}
	    {!!Form::text('nombre',null,['class'=>'form-control','autofocus'=>'true'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('categoria','Categoría (*):' , ['for' => 'categoria' ] )!!}
	    {!!Form::select('id_categoria', $data['categoria'] ,null,[ 'id' => 'id_categoria', 'rel' => 'cliente', 'placeholder'=>'Seleccione','class'=>'form-control combito'])!!}
	    {!!Form::hidden('nombre_categoria',null,['id' => 'nombre_categoria'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('sku','SKU (*):' , ['for' => 'sku' ] )!!}
	    {!!Form::text('sku',null,['class'=>'form-control'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('precio','Precio (*):' , ['for' => 'precio' ] )!!}
	    {!!Form::text('precio',null,['class'=>'form-control'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('description','Descripción :' , ['for' => 'description' ] )!!}
	    {!!Form::textarea('description',null,['class'=>'form-control'])!!}
	</div>

</div>