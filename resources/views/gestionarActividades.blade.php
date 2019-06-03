@extends('adminPanelAsociacion')

@section('navBar')
@parent
@endsection

@section('sideBar')
@parent
@endsection
<?php
use App\asociacion;
use App\usuario;
use App\oferta;
use App\UsuariosParticipantes;
use App\VoluntariosParticipantes;

$asociacionId = Auth::id();

if($asociacionId){
	$asociacion = asociacion::find($asociacionId);
	$numUsuarios = usuario::where('id_asociacion','=',$asociacionId)->count();
	$numActividades = oferta::where('id_asociacion', $asociacionId)->count();
	$ofertas = oferta::where('id_asociacion',$asociacionId)->orderBy('created_at','desc')->get();
}
?>
<?php


?>

@section('Contenido')
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row bg-title">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h4 class="page-title">Listado de Actividades</h4>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /row -->
		<div class="row">
			<div class="col-sm-12">
				<div class="white-box">
					<div class="table-responsive">
						<table id="myTable" class="table table-striped">
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Descripción</th>
									<th>Fecha</th>
									<th>Lugar</th>
									<th>Voluntarios Necesarios</th>
									<th>Voluntarios Apuntados</th>
									<th>Usuarios Participantes</th>
								</tr>
							</thead>
							<tbody>
								@if (sizeof($ofertas) == 0)
								<h3>No hay ninguna actividad creada</h3>
								@else
								@foreach ($ofertas as $element)
								<?php
								$volApuntados = VoluntariosParticipantes::where('id_oferta',$element->id)->count();
								$usuApuntados = UsuariosParticipantes::where('id_oferta', $element->id)->count();
								?>

								<tr>
									<td><a href="vistaActividad/{{ $element->id }}">{{ $element->nombre }}</a></td>
									<td>{{ $element->descripcion }}</td>
									<td>{{ $element->fecha }}</td>
									<td>{{ $element->lugar }}</td>
									<td>{{ $element->voluntarios_necesarios }}</td>
									<td>{{ $volApuntados }}</td>
									<td>{{ $usuApuntados }}</td>
								</tr>
							</a>
							@endforeach
							@endif
						</tbody>
					</table>
					<hr>
				</div>
			</div>
		</div>
	</div>

</div>
</div>

<script>
	$(document).ready(function() {
		$('#myTable').DataTable();
		$(document).ready(function() {
			var table = $('#example').DataTable({
				"columnDefs": [{
					"visible": false,
					"targets": 2
				}],
				"order": [
				[2, 'asc']
				],
				"displayLength": 25,
				"drawCallback": function(settings) {
					var api = this.api();
					var rows = api.rows({
						page: 'current'
					}).nodes();
					var last = null;

					api.column(2, {
						page: 'current'
					}).data().each(function(group, i) {
						if (last !== group) {
							$(rows).eq(i).before(
								'<tr class="group"><td colspan="5">' + group + '</td></tr>'
								);

							last = group;
						}
					});
				}
			});

            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
            	var currentOrder = table.order()[0];
            	if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
            		table.order([2, 'desc']).draw();
            	} else {
            		table.order([2, 'asc']).draw();
            	}
            });
        });
	});
	$('#example23').DataTable({
		dom: 'Bfrtip',
		buttons: [
		'copy', 'csv', 'excel', 'pdf', 'print'
		]
	});
</script>
@endsection

@section('footer')
@parent
@endsection
