@extends('baseVoluntarios')
<link href="/eliteAdmin/plugins/bower_components/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet">
<link href="/eliteAdmin/plugins/bower_components/ion-rangeslider/css/ion.rangeSlider.skinModern.css" rel="stylesheet">
<?php
use App\asociacion;
use App\usuario;
use App\voluntario;
use App\oferta;
use App\UsuariosParticipantes;
use App\VoluntariosParticipantes;
use App\VoluntarioPuntuaUsuario;


$voluntario = voluntario::find($id);
$IdActividadesParticipadas = VoluntariosParticipantes::Where('id_voluntario', $id)->get();
$numActividadesParticipadas =  VoluntariosParticipantes::Where('id_voluntario', $id)->count();
$count = 0;
$oferta = "";
$fecha = "";

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

		<!-- .page title -->
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h4 class="page-title">Puntuaciones</h4>
		</div>

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
	<!-- .row -->
	<div class="row">
		<div class="col-md-12">
			@foreach ($IdActividadesParticipadas as $element)

			<div class="white-box" id="Actividad{{$element->id_oferta}}">

				<?php
				$oferta = oferta::find($element->id_oferta);
				$usuariosParticantes = UsuariosParticipantes::where('id_oferta', $oferta->id)->get();
				$participantes = UsuariosParticipantes::where('id_oferta', $oferta->id)->count();
				$num = 0;
				$fecha = date('d-M-Y', strtotime($oferta->fecha));

				?>
				<h3 class="box-title">Actividad: {{ $oferta->nombre }}, Realizada el día: {{ $fecha }}</h3>
				<div class="white-box">
					<div class="row">

						@foreach ($usuariosParticantes as $element2)
						<?php

						$usuario = usuario::find($element2->id_usuario);
						if(($oferta!=null)&&($usuario!=null)){
							$haSidoPuntuado = VoluntarioPuntuaUsuario::where('id_actividad', $oferta->id)->where('id_voluntario', $voluntario->id)->where('id_usuario', $usuario->id)->first();
						}else{
							$haSidoPuntuado = null;

						}
						?>
						@if ($haSidoPuntuado == null)

						<div class="col-md-2 col-lg-">
							<div class="card">
								<img class="card-img-top image-responsive" src="/{{ $usuario->avatar }}"  alt="Card image cap">
								<h4 class="card-title"><center>{{ $usuario->nombre.' '.$usuario->apellidos }}</center> </h4>
								<hr>
								<div class="card-body" style="margin-left: 2px; margin-right: 5px;	">
									<form class="floating-labels" method="post" id="myForm" action="/puntuarUsuario" enctype="multipart/form-data" files=true >
										{!! csrf_field() !!}
										<div class="form-group">
											<input type="text" name="id" hidden value="{{ $oferta->id.'_'.$voluntario->id.'_'.$usuario->id }}">
											<input type="text" class="form-control" name="puntuacion" id="puntuacion" required> <span class="bar"></span>
											<label for="puntuacion">Puntua del 1 al 10</label>
										</div>


									</div>
									<br>
									<div class="form-actions">
										<center> <button type="submit" class="btn btn-success">Puntuar</button></center>
									</div>
								</form>
								<br>
							</div>
						</div>
						@else
						<?php
						$num = $num+1;
						?>
						@endif
						@endforeach
						@if ($num == $participantes)
						<script type="text/javascript">$('#Actividad{{ $oferta->id }}').hide() </script>
						<?php $count = $count +1;?>
						@endif
					</div>
				</div>
			</div>
			@endforeach
			@if ($count == $numActividadesParticipadas)
			<div class="white-box">
				<h3 class="box-title">No tienes usuarios por puntuar</h3>
			</div>
			@endif
		</div>
	</div>
	<!-- .row -->
	<!-- .right-sidebar -->

	<!-- /.right-sidebar -->
</div>
@endsection


<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/eliteAdmin/plugins/bower_components/ion-rangeslider/js/ion-rangeSlider/ion.rangeSlider.min.js"></script>
<script src="/eliteAdmin/plugins/bower_components/ion-rangeslider/js/ion-rangeSlider/ion.rangeSlider-init.js"></script>
<script src="/eliteAdmin/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">

</script>