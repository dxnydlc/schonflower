<div class="box-body">

<a href="#" class="btn bg-olive margin btn-xs" data-toggle="modal" data-target="#mdlDir" >Agregar dirección</a>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>Distrito</th>
			<th>Dirección</th>
			<th>Teléfono</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach($data['dirs'] as $rs)
		<tr>
			<td>{{$rs->distrito}}</td>
			<td>{{$rs->direccion}}</td>
			<td>{{$rs->telefono}}</td>
			<td><a id="{{$rs->id}}" alt="{{$rs->distrito}}" href="#" class="btn btn-sm btn-danger quitarItem" ><span class="fa fa-minus-circle" ></span></a></td>
		</tr>
		@endforeach
	</tbody>
</table>

</div>