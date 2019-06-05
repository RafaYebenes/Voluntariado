@extends('baseVoluntarios')


<?php
use App\asociacion;
use App\usuario;
use App\voluntario;
use App\oferta;
use App\UsuariosParticipantes;
use App\VoluntariosParticipantes;

$voluntario = voluntario::find($id);
$numActividades = voluntariosparticipantes::where('id_voluntario', $id)->count();

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

				<a class=" waves-effect waves-light" href="#">
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
<div class="container-fluid">

	<div class="row bg-title">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h4 class="page-title">Perfil</h4>
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
	<div class="row">
		<div class="col-md-4 col-xs-12">
			<div class="white-box">
				<div class="user-bg"> <img width="100%" alt="user" src="/{{ $voluntario->avatar }}">
					<div class="overlay-box">
						<div class="user-content">
							<a><img src="/{{ $voluntario->avatar }}" class="thumb-lg img-circle" alt="img"></a>
							<h4 class="text-white">{{ $voluntario->nombre.' '.$voluntario->apellidos }}</h4>

						</div>
					</div>
				</div>
				<div class="user-btm-box">
					<div class="col-md-6 col-sm-6 text-center">
						<p class="text-purple"><i class="ti-dribbble"  data-toggle="tooltip" data-placement="top" title="Actividades Realizadas"></i></p>
						<h1>{{ $numActividades }}</h1>
					</div>
					<div class="col-md-6 col-sm-6 text-center">
						<p class="text-warning"><i class="ti-star" data-toggle="tooltip" data-placement="top" title="Puntuación"></i></p>
						<h1>{{ $voluntario->puntuacion }}</h1>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-8 col-lg-8">
			<div class="white-box">
				<ul class="nav customtab nav-tabs" role="tablist">
					<li role="presentation" class="nav-item"><a href="#settings" class="nav-link active" aria-controls="messages" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Perfil</span></a></li>
				</ul>
				<div class="tab-content">



					<div class="tab-pane active" id="settings">
						<form class="form-horizontal form-material " action="/UpdateVoluntario" enctype="multipart/form-data" method="post">
							{!! csrf_field() !!}
							<input type="hidden" name="id" value="{{ $voluntario->id }}">
							<div class="form-group">
								<label class="col-md-12">Nombre</label>
								<div class="col-md-12">
									<input type="text" placeholder="{{ $voluntario->nombre }}" name="nombre" class="form-control form-control-line" value="{{ $voluntario->nombre }}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-12">Apellidos</label>
								<div class="col-md-12">
									<input type="text" name="apellidos" placeholder="{{ $voluntario->apellidos }}" class="form-control form-control-line" value="{{ $voluntario->apellidos }}">
								</div>
							</div>
							<div class="form-group">
								<label for="example-email" class="col-md-12">Email</label>
								<div class="col-md-12">
									<input type="email" placeholder="{{ $voluntario->email }}" class="form-control form-control-line" name="email" id="example-email" value="{{ $voluntario->email }}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-12">Telefono</label>
								<div class="col-md-12">
									<input type="text" placeholder="{{ $voluntario->telefono }}" class="form-control form-control-line" name="telefono" value="{{ $voluntario->telefono }}">
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-12">
									<button class="btn btn-success">Actualizar Perfil</button>
								</div>
							</div>
						</form>
					</div>
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