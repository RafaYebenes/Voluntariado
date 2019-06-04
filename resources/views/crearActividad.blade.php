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
$asociacionId = Auth::id();

if($asociacionId){
	$asociacion = asociacion::find($asociacionId);
	$numUsuarios = usuario::where('id_asociacion','=',$asociacionId)->count();
	$usuarios = usuario::where('id_asociacion','=',$asociacionId)->get();
}
?>
@section('Contenido')
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row bg-title">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h4 class="page-title">Creación de Actividades</h4>
			</div>
			@if ( Session::has('send') )
			<div class="alert alert-success margin-b-30">
				{{Session::get('send')}}
			</div>
			@endif

			@if (count($errors) > 0)
			<div class="alert alert-danger margin-b-30">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
		</div>

		<div class="panel panel-info">
			<div class="panel-heading"> Formulario de Creación  </div>
			<div class="panel-wrapper collapse in" aria-expanded="true">
				<div class="panel-body">
					<form action="crearActividad" method="post" class="form-horizontal" enctype="multipart/form-data" files=true >
						{!! csrf_field() !!}
						<input type="text" name="id" hidden value="{{ Auth::id() }}">
						<div class="form-body">
							<h3 class="box-title">Información Principal</h3>
							<hr class="m-t-0 m-b-40">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">Nombre</label>
										<div class="col-md-9">
											<input type="text" class="form-control" name="name" placeholder="" required>
										</div>

									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">Descripción</label>
										<div class="col-md-9">
											<input type="text" class="form-control" name="descripcion" placeholder="" required>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<!--/row-->


							<h3 class="box-title">Localización y Fecha </h3>
							<hr class="m-t-0 m-b-40">
							<div class="row">

								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label col-md-3">Fecha</label>
										<div class="col-md-9">
											<div class="input-group">
												<input type="text" class="form-control complex-colorpicke" id="datepicker-autoclose" name="fecha" placeholder="mm/dd/yyyy">
												<span class="input-group-addon"><i class="icon-calender"></i></span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label col-md-3">Hora</label>
										<div class="col-md-9">
											<div class="input-group">
												<input type="text" class="form-control " name="hora" placeholder="13:00">
												<span class="input-group-addon"><i class="icon-clock"></i></span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label col-md-3">Lugar</label>
										<div class="col-md-9">
											<div class="input-group">
												<input type="text" class="form-control " name="lugar" >
												<span class="input-group-addon"><i class="icon-map"></i></span>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!--/span-->
							<h3 class="box-title">Usuarios Y Voluntarios</h3>
							<hr class="m-t-0 m-b-40">
							<!--/row-->
							<div class="row">
								<div class="col-lg-4 col-md-6 col-sm-6">
									<h5 class="box-title "><b>Usuarios Participantes</b></h5>
									<div class="checkbox checkbox-success checkbox-circle">
										<!--Para saber los usuarios que hemos seleccionado tendremos que crear un metodo en el controlador, que recorra todos los id de la tabla usuarios pertenecientes a esa asociacion. Después hara el input->id del usuario para todos y comprobara si este es nulo. En caso de no serlo se traerá los datos de ese usuario para añadirlo a la tabla de usuarios participantes. -->
										@foreach ($usuarios as $element)
										<input name="{{ 'Usuario'.$element->id }}" type="checkbox" value="{{ $element->id }}">
										<label for="{{ 'Usuario'.$element->id }}"> {{ $element->nombre.' '.$element->apellidos }} </label><br>
										@endforeach
									</div>

								</div>
								<div class="col-md-6 ">
									<div class="form-group">
										<label class="control-label col-md-3">Voluntarios Necesarios</label>
										<div class="col-md-9">
											<div class="input-group">
												<input type="int" class="form-control " name="VolNecesarios" required >
											</div>
										</div>
									</div>
								</div>
							</div>
							<hr>
						</div>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn btn-success">Enviar</button>
											<button type="button" class="btn btn-default">Cancelar</button>
										</div>
									</div>
								</div>
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
