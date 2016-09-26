<div class="box-body">

	<div class="form-group">
		{!!Form::label('id_tipo_menu','Tipo de Menú (*):' , ['for' => 'id_tipo_menu' ] )!!}
	    {!!Form::select('id_tipo_menu', $data['tipo_menu'] ,null,[ 'id' => 'id_tipo_menu', 'rel' => '', 'placeholder'=>'Seleccione','class'=>'form-control combito'])!!}
	    {!!Form::hidden('tipo_menu',null,['id' => 'tipo_menu'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('precio','Precio (*):' , ['for' => 'precio' ] )!!}
	    {!!Form::text('precio',null,['class'=>'form-control'])!!}
	</div>

</div>