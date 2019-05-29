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
$asociacionId = Auth::id();


if($asociacionId){
	$asociacion = asociacion::find($asociacionId);
	$numUsuarios = usuario::where('id_asociacion','=',$asociacionId)->count();
	$numActividades = oferta::where('id_asociacion', $asociacionId)->count();
}




?>
@section('Contenido')

<div id="page-wrapper">
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
					<div class="user-bg"> <img width="100%" alt="user" src="/{{ $asociacion->avatar }}">
						<div class="overlay-box">
							<div class="user-content">
								<a><img src="/{{ $asociacion->avatar }}" class="thumb-lg img-circle" alt="img"></a>
								<h4 class="text-white">{{ $asociacion->nombre }}</h4>

							</div>
						</div>
					</div>
					<div class="user-btm-box">
						<div class="col-md-6 col-sm-6 text-center">
							<p class="text-purple"><i class="ti-user"  data-toggle="tooltip" data-placement="top" title="Usuarios"></i></p>
							<h1>{{ $numUsuarios }}</h1>
						</div>
						<div class="col-md-6 col-sm-6 text-center">
							<p class="text-warning"><i class="ti-dribbble" data-toggle="tooltip" data-placement="top" title="Actividades"></i></p>
							<h1>{{ $numActividades }}</h1>
						</div>
					</div>


				</div>
			</div>
			<div class="col-md-8 col-xs-12">
				<div class="white-box">
					<ul class="nav customtab nav-tabs" role="tablist">
						<li role="presentation" class="nav-item"><a href="#settings" class="nav-link active" aria-controls="messages" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Perfil</span></a></li>
					</ul>
					<div class="tab-content">

						<div class="tab-pane active" id="settings">
							<form class="form-horizontal form-material" action="/updateAso" enctype="multipart/form-data" method="post">
								{!! csrf_field() !!}
								<input type="hidden" name="id" value="{{ $asociacion->id }}">
								<div class="form-group">
									<label class="col-md-12">Nombre</label>
									<div class="col-md-12">
										<input type="text" placeholder="{{ $asociacion->nombre }}" name="name" class="form-control form-control-line" value="{{ $asociacion->nombre }}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-12">Dirección</label>
									<div class="col-md-12">
										<input type="text" placeholder="{{ $asociacion->direccion }}" name="direccion" class="form-control form-control-line" value="{{ $asociacion->direccion }}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-12">Pais</label>
									<div class="col-md-12">
										<input type="text" placeholder="{{ $asociacion->pais }}" name="pais" class="form-control form-control-line" value="{{ $asociacion->pais }}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-12">Provincia</label>
									<div class="col-md-12">
										<input type="text" placeholder="{{ $asociacion->provincia }}" name="provincia" class="form-control form-control-line" value="{{ $asociacion->provincia }}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-12">Población</label>
									<div class="col-md-12">
										<input type="text" placeholder="{{ $asociacion->poblacion }}" name="poblacion" class="form-control form-control-line" value="{{ $asociacion->poblacion }}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-12">CP</label>
									<div class="col-md-12">
										<input type="text" placeholder="{{ $asociacion->cp }}" name="cp" class="form-control form-control-line" value="{{ $asociacion->cp }}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-12">Web</label>
									<div class="col-md-12">
										<input type="text" placeholder="{{ $asociacion->web }}" name="web" class="form-control form-control-line" value="{{ $asociacion->web }}">
									</div>
								</div>
								<div class="form-group">
									<label for="example-email" class="col-md-12">Email</label>
									<div class="col-md-12">
										<input type="email" placeholder="{{ $asociacion->email }}" class="form-control form-control-line" name="email" id="example-email" value="{{ $asociacion->email }}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-12">Telefono</label>
									<div class="col-md-12">
										<input type="text" placeholder="{{ $asociacion->telefono }}" class="form-control form-control-line" name="telefono" value="{{ $asociacion->telefono }}">
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
</div>

@endsection

@section('footer')
@parent
@endsection
