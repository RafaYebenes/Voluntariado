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
$asociacionId = Auth::id();

if($asociacionId){
	$asociacion = asociacion::find($asociacionId);
	$Usuarios = usuario::where('id_asociacion','=',$asociacionId)->get();

}
?>

@section('Contenido')
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row el-element-overlay m-b-40">
			<div class="col-md-12">
				<h4>{{ $asociacion->nombre }}<br/><small>Listado de Usuarios</small></h4>
				<hr>
			</div>
			@foreach ($Usuarios as $element)

			<div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
				<div class="white-box">
					<div class="el-card-item">
						<div class="el-card-avatar el-overlay-1">
							<img src="{{ $element->avatar }}" />
							<div class="el-overlay">
								<ul class="el-info">
									<li><a class="btn default btn-outline" href="PerfilUsuario/{{ $element->id }}" data-toggle="tooltip" data-placement="top" title="Perfil"><i class="fa fa-user"></i></a></li>
									<li><a class="btn default btn-outline" href="EliminarUsuario/{{ $element->id }}" data-toggle="tooltip" data-placement="top" title="Eliminar Usuario"><i class="fa fa-trash"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="el-card-content">
							<h3 class="box-title">{{ $element->nombre.' '.$element->apellidos }}</h3>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
@endsection

@section('footer')
@parent
@endsection
