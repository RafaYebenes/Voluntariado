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
$oferta = oferta::find($id);

?>
<?php


?>

@section('Contenido')
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row bg-title">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h4 class="page-title">Detalles de la Actividad</h4>
			</div>
		</div>
		<div class="white-box">

			<div class="row">
				<div class="col-md-12">
					<form class="form-horizontal form-material " action="/UpdateUser" enctype="multipart/form-data" method="post">
						{!! csrf_field() !!}
						<input type="hidden" name="id" value="{{ $oferta->id }}">
						<div class="form-group">
							<label class="col-md-12">Nombre</label>
							<div class="col-md-12">
								<input type="text" placeholder="{{ $oferta->nombre }}" name="nombre" class="form-control form-control-line" value="{{ $oferta->nombre }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-12">Descripción</label>
							<div class="col-md-12">
								<input type="text" name="apellidos" placeholder="{{ $oferta->descripcion }}" class="form-control form-control-line" value="{{ $oferta->descripcion }}">
							</div>
						</div>
						<div class="form-group">
							<label for="example-email" class="col-md-12">Lugar</label>
							<div class="col-md-12">
								<input type="email" placeholder="{{ $oferta->lugar }}" class="form-control form-control-line" name="email" id="example-email" value="{{ $oferta->lugar }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-12">Voluntarios Necesarios</label>
							<div class="col-md-12">
								<input  type="text" class="form-control form-control-line" value="" placeholder="{{ $oferta->voluntarios_necesarios }}" data-plugin="touchSpin" name="voluntarios_necesarios" >
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-12">
								<button class="btn btn-success">Actualizar Actividad</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('footer')
@parent
@endsection