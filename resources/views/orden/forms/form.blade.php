<div class="box-body">

	<div class="row">
		
		

		<div class="form-group col-md-12 ">

			{!!Form::hidden('id_user',null,['id' => 'id_user'])!!}

			<i class="fa fa-user margin-r-5"></i>
			{!!Form::label('usuario','Usuario (*):' )!!}
			<div class="input-group">
				{!!Form::text('usuario',null,[ 'class' => 'form-control' , 'readonly' => 'readonly' , 'id' => 'usuario' ])!!}
				<span class="input-group-btn">
					<button class="btn btn-default" type="button" data-toggle="modal" data-target="#mdlUser" >Buscar</button>
				</span>
			</div>
			
		    
		</div>

		<div class="form-group col-md-6 ">
			{!!Form::label('correo','Correo (*):' , ['for' => 'correo' ] )!!}
		    {!!Form::text('correo',null,['class'=>'form-control'])!!}
		</div>

		<div class="form-group col-md-6 ">
			{!!Form::label('telefono','Teléfono (*):' , ['for' => 'telefono' ] )!!}
		    {!!Form::text('telefono',null,[ 'class' => 'form-control' , 'id' => 'telefono' ])!!}
		</div>

		<div class="form-group col-md-12 ">

			{!!Form::hidden('id_dir',null,['id' => 'id_dir'])!!}

			<i class="fa fa-map-marker margin-r-5"></i>
			{!!Form::label('direccion','Dirección:' , ['for' => 'direccion' ] )!!}
			<div class="input-group">
		    	{!!Form::text('direccion',null,[ 'class' => 'form-control' , 'readonly' => 'readonly' , 'id' => 'direccion' ])!!}
		    	<span class="input-group-btn">
					<button class="btn btn-default" type="button" data-toggle="modal" data-target="#mdlDirs" >Buscar</button>
				</span>
			</div>
		</div>

		

		

		

	</div>

	
		

</div>