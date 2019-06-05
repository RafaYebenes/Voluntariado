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
			<li >
				<a class="waves-effect waves-light" data-toggle="dropdown" href="#">
					<span>Actividades</span>
				</a>

				<!-- /.dropdown-messages -->
			</li>
			<!-- .Task dropdown -->
			<li >
				<a class="waves-effect waves-light" data-toggle="dropdown" href="#">
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
@endsection

@section('footer')
@parent
@endsection