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
$usuario = usuario::where('id',$id)->get();

if($asociacionId){
	$asociacion = asociacion::find($asociacionId);
}

$actividadesRealizadas = UsuariosParticipantes::where('id_usuario', $id)->count();
$actividadesParticipadas = UsuariosParticipantes::where('id_usuario', $id)->get();


?>
@section('Contenido')

<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row bg-title">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h4 class="page-title">Perfil</h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-xs-12">
				<div class="white-box">
					<div class="user-bg"> <img width="100%" alt="user" src="/{{ $usuario[0]->avatar }}">
						<div class="overlay-box">
							<div class="user-content">
								<a><img src="/{{ $usuario[0]->avatar }}" class="thumb-lg img-circle" alt="img"></a>
								<h4 class="text-white">{{ $usuario[0]->nombre.' '.$usuario[0]->apellidos }}</h4>

							</div>
						</div>
					</div>
					<div class="user-btm-box">
						<div class="col-md-6 col-sm-6 text-center">
							<p class="text-purple"><i class="ti-dribbble"  data-toggle="tooltip" data-placement="top" title="Actividades Realizadas"></i></p>
							<h1>{{ $actividadesRealizadas }}</h1>
						</div>
						<div class="col-md-6 col-sm-6 text-center">
							<p class="text-warning"><i class="ti-star" data-toggle="tooltip" data-placement="top" title="Puntuación"></i></p>
							<h1>{{ $usuario[0]->puntuacion }}</h1>
						</div>
					</div>


				</div>
			</div>
			<div class="col-md-8 col-xs-12">
				<div class="white-box">
					<ul class="nav customtab nav-tabs" role="tablist">
						<li role="presentation" class="nav-item"><a href="#settings" class="nav-link active" aria-controls="messages" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Perfil</span></a></li>
						<li role="presentation" class="nav-item"><a href="#home" class="nav-link " aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="fa fa-home"></i></span><span class="hidden-xs">Actividad</span></a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane" id="home">
							<div class="steamline">
								@foreach ($actividadesParticipadas as $element)
								<?php
								$oferta = oferta::where('id', $element->id_oferta)->get();
								?>

								<div class="sl-item">
									<div class="sl-left"> <img src="/{{$usuario[0]->avatar  }}" alt="user" class="img-circle" /> </div>
									<div class="sl-right">
										<div class="m-l-40">{{$usuario[0]->nombre.' '.$usuario[0]->apellidos}} <span class="sl-date">{{ $oferta[0]->fecha }}</span>
											<p>Participo en la actividad<a href="#"> {{ $oferta[0]->nombre }}</a></p>

										</div>
									</div>
								</div>
								<hr>
								@endforeach
							</div>
						</div>


						<div class="tab-pane active" id="settings">
							<form class="form-horizontal form-material">
								<div class="form-group">
									<label class="col-md-12">Nombre</label>
									<div class="col-md-12">
										<input type="text" placeholder="{{ $usuario[0]->nombre }}" class="form-control form-control-line">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-12">Apellidos</label>
									<div class="col-md-12">
										<input type="text" placeholder="{{ $usuario[0]->apellidos }}" class="form-control form-control-line">
									</div>
								</div>
								<div class="form-group">
									<label for="example-email" class="col-md-12">Email</label>
									<div class="col-md-12">
										<input type="email" placeholder="{{ $usuario[0]->email }}" class="form-control form-control-line" name="example-email" id="example-email">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-12">Contraseña</label>
									<div class="col-md-12">
										<input type="password" value="password" class="form-control form-control-line">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-12">Telefono</label>
									<div class="col-md-12">
										<input type="text" placeholder="{{ $usuario[0]->telefono }}" class="form-control form-control-line">
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
