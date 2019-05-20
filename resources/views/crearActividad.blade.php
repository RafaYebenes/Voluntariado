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
	$numUsuarios = usuario::where('id_asociacion','=',$asociacionId)->count();

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

		<div class="row">
			<div class="col-sm-12">
				<div class="white-box">
					<p class="text-muted m-b-30 font-13"> Asistente para la creación de actividades.</p>
					<div id="exampleBasic" class=" wizard ">
						<ul class="wizard-steps" role="tablist">
							<li class="active col-md-4" role="tab">
								<h4><span>1</span>Información General</h4>
							</li>
							<li class=" col-md-4" role="tab">
								<h4><span>2</span>Usuarios Asociados</h4>
							</li>
							<li class=" col-md-4" role="tab">
								<h4><span>3</span>Confirmación      </h4>
							</li>
						</ul>
						<div class="wizard-content">
							<form action="createUser" method="post" class="form-horizontal" enctype="multipart/form-data" files=true >
								<div class="wizard-pane active" role="tabpanel">
									<div class="form-group">
										<label class="control-label ">Nombre</label>
										<div class="col-md-3">
											<input type="text" class="form-control" name="name" placeholder="" required>
										</div>
									</div>
								</div>
								<div class="wizard-pane" role="tabpanel">

								</div>
								<div class="wizard-pane" role="tabpanel">

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
