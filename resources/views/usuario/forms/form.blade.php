<div class="box-body">

	<div class="form-group">
		{!!Form::label('name','Nombre (*):' , ['for' => 'name' ] )!!}
	    {!!Form::text('name',null,['class'=>'form-control','autofocus'=>'true'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('apellidos','Apellidos (*):' , ['for' => 'apellidos' ] )!!}
	    {!!Form::text('apellidos',null,['class'=>'form-control'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('email','Correo (*):' , ['for' => 'email' ] )!!}
	    {!!Form::text('email',null,['class'=>'form-control'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('telefono','Telefono (*):' , ['for' => 'telefono' ] )!!}
	    {!!Form::text('telefono',null,['class'=>'form-control'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('tipo','Descripción :' , ['for' => 'tipo' ] )!!}
	    {!! Form::select('tipo',[ 'user' => 'Usuario', 'admin' => 'Administrador' ], null , [ 'class' => 'form-control' ] ) !!}
	</div>

</div>