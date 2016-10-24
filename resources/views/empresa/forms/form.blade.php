<div class="box-body">

	<div class="form-group">
		{!!Form::label('nombre','Nombre (*):' , ['for' => 'nombre' ] )!!}
	    {!!Form::text('nombre',null,['class'=>'form-control','autofocus'=>'true'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('ruc','RUC (*):' , ['for' => 'ruc' ] )!!}
	    {!!Form::text('ruc',null,['class'=>'form-control'])!!}
	</div>

</div>