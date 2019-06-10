@extends('baseVoluntarios')
<?php
use App\asociacion;
use App\usuario;
use App\voluntario;
use App\oferta;
use App\UsuariosParticipantes;
use App\VoluntariosParticipantes;



$ids = explode('_',$id );
$idActividad = $ids[0];
$idVoluntario = $ids[1];

$voluntario = voluntario::find($idVoluntario);
$actividad = oferta::find($idActividad);
$posDelimitador = strpos($actividad->fecha, " ");

$time = str_split($actividad->fecha,$posDelimitador);

$fecha = $time[0];
$hora = $time[1];

$asociacion = asociacion::find($actividad->id_asociacion);

$usuariosParticipantes = usuariosParticipantes::where('id_oferta', $actividad->id)->get();
$voluntariosApuntados = VoluntariosParticipantes::where('id_oferta', $actividad->id)->count();


?>

@section('navBar')
<nav class="navbar navbar-default navbar-static-top m-b-0">
	<div class="navbar-header">
		<!-- Toggle icon for mobile view -->


		<!-- /Logo -->
		<!-- Search input and Toggle icon -->
		<ul class="nav navbar-top-links navbar-left hidden-xs">
			<a class="logo" href="/inicioVoluntarios/{{ $voluntario->id }}">
				<b>
					<!--This is dark logo icon--><img src="/img/iconos/UsersWhite.png" alt="home" class="dark-logo" with="40%" height="40%" />
				</b>
			</a>

		</ul>
		<!-- This is the message dropdown -->
		<ul class="nav navbar-top-links navbar-right pull-right">
			<li>

				<a class=" waves-effect waves-light" href="/perfilVoluntario/{{ $voluntario->id }}">
					<span>Perfil</span>
				</a>
			</li>
			<!-- .Task dropdown -->
			<li >
				<a class="waves-effect waves-light" href="/puntuacionesVoluntario/{{ $voluntario->id }}">
					<span>Puntuaciones</span>
				</a>
			</li>


			<!-- /.Task dropdown -->

			<li class="right-side-toggle"><a href="/logoutVol"><i class="fa  fa-power-off"></i><span>  Logout</span></a></li>
			<!-- /.dropdown -->
		</ul>
	</div>
	<!-- /.navbar-header -->
	<!-- /.navbar-top-links -->
	<!-- /.navbar-static-side -->
</nav>
@endsection


@section('Contenido')

<div class="container-fluid">
	<div class="row bg-title">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h4 class="page-title">Actividad</h4>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /row -->
	<div class="row">
		<div class="col-md-8 col-lg-9">
			<div class="white-box">
				<div class="tab-content">
					<div class="tab-pane active">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-2">Nombre</label>
									<div class="">
										<input type="text" class="form-control" name="name" placeholder="{{ $actividad->nombre }}" disabled>
									</div>

								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-2">Descripción</label>
									<div class="">
										<input type="text" class="form-control" name="descripcion" placeholder="{{ $actividad->descripcion }}" disabled>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label col-md-2">Fecha</label>
									<div class="">
										<input type="text" class="form-control" name="name" placeholder="{{ $fecha }}" disabled>
									</div>

								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label col-md-2">Hora</label>
									<div class="">
										<input type="text" class="form-control" name="name" placeholder="{{ $hora }}" disabled>
									</div>

								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group ">
									<label class="control-label col-md-2">Lugar</label>
									<div class="">
										<input type="text" class="form-control" name="descripcion" placeholder="{{ $actividad->lugar }}" disabled>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label class="control-label">Usuarios Participantes</label>
									<div class="">
										<table class="table table-striped">
											<thead>
												<tr>

												</tr>
											</thead>
											<tbody>
												@foreach ($usuariosParticipantes as $element)
												<?php
												$usuario = usuario::find($element->id_usuario);
												?>
												<tr>
													<td><img src="/{{ $usuario->avatar }}"  class="img-circle"  width="15%"></td>
													<td>{{ $usuario->nombre.' '.$usuario->apellidos }}</td>
													<td><i class="fa fa-star"></i>{{ $usuario->puntuacion }}</td>
												</tr>
												@endforeach
											</tbody>

										</table>
										<hr>
									</div>

								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group ">
									<label class="control-label ">Voluntarios Necesarios</label>
									<div class="">
										<input type="text" class="form-control" name="descripcion" placeholder="{{ $actividad->voluntarios_necesarios}}" disabled>
									</div>
								</div>
								<div class="form-group ">
									<label class="control-label ">Voluntarios Apuntados</label>
									<div class="">
										<input type="text" class="form-control" name="descripcion" placeholder="{{ $voluntariosApuntados}}" disabled>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">

									<div class="">
										<a href="/apuntame/{{$id}}"><button type="submit" class="btn btn-success">Me Apunto!</button></a>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-xs-12">
			<div class="white-box">
				<div class="user-bg"> <img width="100%" alt="user" src="/{{ $asociacion->avatar }}">
					<div class="overlay-box">
						<div class="user-content">
							<a><img src="/{{ $asociacion->avatar }}" class="thumb-lg img-circle" alt="img"></a>
						</div>
					</div>
				</div>
				<div class="user-btm-box">
					<h3 class="text-center"><b>{{ $asociacion->nombre}}</b></h3>
					<div class="col-md-6">
						<label class="control-label">Telefono: </label>{{  '  '.$asociacion->telefono }}
					</div>
					<div class="col-md-6">
						<label class="control-label">Página Web:</label>{{ '  '.$asociacion->web }}
					</div>
				</div>
			</div>
		</div>
	</div>

</div>


@endsection

@section('footer')
@parent
@endsection