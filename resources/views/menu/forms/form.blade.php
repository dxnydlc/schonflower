<div class="box-body">

	<div class="row">
		
		<div class="form-group col-lg-3 col-md-3 ">
			{!!Form::label('id_combo','Tipo de Combo (*):' , ['for' => 'id_combo' ] )!!}
		    {!!Form::select('id_combo', $data['precio_combo'] ,null,[ 'id' => 'id_combo', 'placeholder'=>'Seleccione','class'=>'form-control combito'])!!}
		    {!!Form::hidden('combo',null,['id' => 'combo'])!!}
		</div>

		<div class="form-group col-lg-3 col-md-3 ">
			{!!Form::label('lote','Lote (*):' , ['for' => 'lote' ] )!!}
		    {!!Form::text('lote',null,['class'=>'form-control'])!!}
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
			{!!Form::label('precio','Precio (*):' , ['for' => 'precio' ] )!!}
		    {!!Form::text('precio',null,['class'=>'form-control','readonly'=>'readonly'])!!}
		</div>

		<div class="form-group col-lg-12 col-md-12 ">
		{!!Form::label('comentarios','Comentarios :' , ['for' => 'comentarios' ] )!!}
	    {!!Form::textarea('comentarios',null,['class'=>'form-control','rows' => '2'])!!}
		</div>

	</div>

	
		

</div>