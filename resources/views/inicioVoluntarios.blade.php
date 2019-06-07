@extends('baseVoluntarios')
<?php
use App\asociacion;
use App\usuario;
use App\voluntario;
use App\oferta;
use App\UsuariosParticipantes;
use App\VoluntariosParticipantes;

$ofertas = oferta::orderBy('created_at','desc')->get();
$voluntario = voluntario::find($id);

?>

@section('navBar')
<nav class="navbar navbar-default navbar-static-top m-b-0">
	<div class="navbar-header">
		<!-- Toggle icon for mobile view -->


		<!-- /Logo -->
		<!-- Search input and Toggle icon -->
		<ul class="nav navbar-top-links navbar-left hidden-xs">
			<a class="logo" href="">
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
		<!-- .page title -->
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h4 class="page-title">Inicio</h4>
		</div>
		<!-- /.page title -->
		<!-- .breadcrumb -->

		<!-- /.breadcrumb -->
	</div>
	<!-- .row -->
	<div class="row">
		<div class="col-md-12">
			<div class="white-box">
				<h3 class="box-title">Proximas Actividades</h3>
				<div class="white-box">
					<div class="row">

						@foreach ($ofertas as $element)
						<?php
						$id = $element->id_asociacion;
						$aso = asociacion::find($id);
						$fechaSinForma = $element->fecha;
						$usuApuntados = UsuariosParticipantes::where('id_oferta', $element->id)->count();
						$fecha = date('d-m-Y', strtotime($fechaSinForma));
						if(strlen($element->descripcion)>60){
							$descripcion = str_split($element->descripcion, 28);
							$descripcion[0] = $descripcion[0].'...';


						}else{
							$descripcion = str_split($element->descripcion,28);
						}
						?>
						<div class="col-md-2 col-lg-">
							<div class="card">
								<img class="card-img-top image-responsive" src="/{{ $aso->avatar }}"  alt="Card image cap">

								<div class="card-block">
									<hr>
									<h4 class="card-title">{{ $element->nombre }} </h4>
									<p class="card-text">{{$descripcion[0]}}</p>
									<p class="card-text"><i class="fa fa-calendar"></i> {{ $fecha}} <br> <i class="fa fa-map-marker"></i> {{ $element->lugar }}<br>  <i class="fa fa-users" data-toggle="tooltip" data-placement="top" title="Voluntarios Necesarios"></i>{{ $element->voluntarios_necesarios }} &nbsp; <i class="fa fa-wheelchair" data-toggle="tooltip" data-placement="top" title="Usuarios Apuntados"></i>{{ $usuApuntados }}<br> </p>
									<a href="/actividadesVoluntarios/{{ $element->id.'_'.$voluntario->id }}" class="btn btn-primary">Ver Actividad</a>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- .row -->
	<!-- .right-sidebar -->

	<!-- /.right-sidebar -->
</div>
@endsection

@section('footer')
@parent
@endsection