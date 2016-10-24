
<div class="row">
	
	<div class="form-group col-md-6 ">
		{!!Form::label('tipo','Tipo documento (*):' , ['for' => 'tipo' ] )!!}
	    {!!Form::select('tipo',['B' => 'Boleta' , 'F' => 'Factura' ],'B',['class'=>'form-control','id' => 'tipo'])!!}
	</div>

	<div class="form-group col-md-6 ">
		{!!Form::label('lote','Fecha (*):' , ['for' => 'lote' ] )!!}
		<div class="input-group date">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          {!!Form::text('fecha',$data['fecha'],['class'=>'form-control','id'=>'fecha'])!!}
        </div>
	</div>

	<div class="form-group col-md-6 ">
		{!!Form::label('forma_pago','Forma pago (*):' , ['for' => 'forma_pago' ] )!!}
	    {!!Form::select('forma_pago',[ 'credito' => 'Crédito' , 'efectivo' => 'Efectivo' , 'cortesia' => 'Cortesía' ], 'credito',['class'=>'form-control'])!!}
	</div>

	<div class="form-group col-md-6 ">
		{!!Form::label('id_empresa','Empresa (*):' , ['for' => 'id_empresa' ] )!!}
	    {!!Form::select('id_empresa', $data['empresa'] ,null,[ 'id' => 'id_empresa', 'placeholder'=>'Seleccione','class'=>'form-control combito'])!!}
	    {!!Form::hidden('empresa',null,['id' => 'empresa'])!!}
	</div>

	<div class="form-group col-md-12 ">
			{!!Form::label('comentarios','Comentarios :' , ['for' => 'comentarios' ] )!!}
		    {!!Form::textarea('comentarios',null,['class'=>'form-control','rows' => '2'])!!}
		</div>

</div>