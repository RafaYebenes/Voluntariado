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
							<!-- para hacer el jquery de esto tenemos que ir cambiando la clase active una vez que todos los campos esten completos-->
							<form action="createUser" method="post" class="form-horizontal" enctype="multipart/form-data" files=true >
								<div class="wizard-pane " role="tabpanel">
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label col-md-3">Titulo</label>
												<div class="col-md-6">
													<input type="text" class="form-control" name="name" placeholder="" required>
												</div>

											</div>

											<div class="form-group ">
												<label class="control-label col-md-3">Lugar</label>
												<div class="col-md-6">
													<input type="text" class="form-control" name="apellidos" placeholder="" required>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label col-md-3">Fecha</label>
												<div class="col-md-6 input-group">
													<input type="text" class="form-control complex-colorpicke" id="datepicker-autoclose" name="fechaNacimiento" placeholder="mm/dd/yyyy">
													<span class="input-group-addon"> <span class="icon-calender"></span> </span>
												</div>

											</div>

											<div class="form-group ">
												<label class="control-label col-md-3">Hora</label>
												<div class="input-group clockpicker col-md-6" data-placement="bottom" data-align="top" data-autoclose="true">
													<input type="text" class="form-control" value="13:14">
													<span class="input-group-addon"> <span class="glyphicon glyphicon-time"></span> </span>
												</div>
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label col-md-3">Descripción</label>
												<div class="col-md-6">
													<textarea class="summernote form-control" name="body" data-height="150"></textarea>
												</div>

											</div>
										</div>
										<!--/span-->
									</div>
								</div>
								<div class="wizard-pane active" role="tabpanel">
									<div class="row">
										<div class="form-group col-md-6">
											<label class="control-label col-md-3">Voluntarios Necesarios</label>
											<input id="tch3" type="text" value="" name="tch3" data-bts-button-down-class="btn btn-default btn-outline" data-bts-button-up-class="btn btn-default btn-outline">
										</div>

										<div class="col-md-6">
											<h5 class="box-title">Public methods</h5>
											<select multiple id="public-methods" name="public-methods[]">
												<option value="elem_1">elem 1</option>
												<option value="elem_2" disabled>elem 2</option>
												<option value="elem_3">elem 3</option>
												<option value="elem_4">elem 4</option>
												<option value="elem_5">elem 5</option>
												<option value="elem_6">elem 6</option>
												<option value="elem_7">elem 7</option>

											</select>
											<div class="button-box m-t-20"> <a id="select-all" class="btn btn-danger btn-outline" href="#">select all</a> <a id="deselect-all" class="btn btn-info btn-outline" href="#">deselect all</a> <a id="add-option" class="btn btn-success btn-outline" href="#">Add option</a> <a id="refresh" class="btn btn-warning btn-outline" href="#">refresh</a> </div>
										</div>
									</div>
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
