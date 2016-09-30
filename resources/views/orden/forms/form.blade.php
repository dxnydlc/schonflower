<div class="box-body">

	<div class="row">
		
		<div class="form-group col-lg-3 col-md-3 ">
			{!!Form::label('tipo','Tipo documento (*):' , ['for' => 'tipo' ] )!!}
		    {!!Form::text('tipo',null,['class'=>'form-control'])!!}
		</div>

		<div class="form-group col-lg-3 col-md-3 ">
			{!!Form::label('usuario','Usuario (*) BUSCADOR:' , ['for' => 'usuario' ] )!!}
		    {!!Form::text('usuario',null,['class'=>'form-control'])!!}
		</div>

		<div class="form-group col-lg-3 col-md-3 ">
			{!!Form::label('correo','Correo (*):' , ['for' => 'correo' ] )!!}
		    {!!Form::text('correo',null,['class'=>'form-control'])!!}
		</div>

		<div class="form-group col-lg-3 col-md-3 ">
			{!!Form::label('telefono','Teléfono (*):' , ['for' => 'telefono' ] )!!}
		    {!!Form::text('telefono',null,['class'=>'form-control'])!!}
		</div>

		<div class="form-group col-lg-3 col-md-3 ">
			{!!Form::label('direccion','Dirección BUSCADOR (*):' , ['for' => 'direccion' ] )!!}
		    {!!Form::text('direccion',null,['class'=>'form-control'])!!}
		</div>

		<div class="form-group col-lg-3 col-md-3 ">
			{!!Form::label('lote','Fecha (*):' , ['for' => 'lote' ] )!!}
			<div class="input-group date">
	          <div class="input-group-addon">
	            <i class="fa fa-calendar"></i>
	          </div>
	          {!!Form::text('fecha',$data['fecha'],['class'=>'form-control','id'=>'fecha'])!!}
	        </div>
		</div>

		<div class="form-group col-lg-3 col-md-3 ">
			{!!Form::label('forma_pago','Forma pago (*):' , ['for' => 'forma_pago' ] )!!}
		    {!!Form::text('forma_pago',null,['class'=>'form-control'])!!}
		</div>

		<div class="form-group col-lg-12 col-md-12 ">
			{!!Form::label('comentarios','Comentarios :' , ['for' => 'comentarios' ] )!!}
		    {!!Form::textarea('comentarios',null,['class'=>'form-control','rows' => '2'])!!}
		</div>

	</div>

	
		

</div>