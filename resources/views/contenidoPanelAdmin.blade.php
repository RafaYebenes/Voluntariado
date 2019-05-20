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
				<h4 class="page-title">Panel de Administración</h4>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-md-12 col-lg-12 col-sm-12">
				<div class="white-box">
					<div class="row row-in">
						<div class="col-lg-4 col-sm-6 row-in-br">
							<div class="col-in row">
								<div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E" class="linea-icon linea-basic"></i>
									<h5 class="text-muted vb">Usuarios</h5>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-6">
									<h3 class="counter text-right m-t-15 text-danger">{{ $numUsuarios}}</h3>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="progress">
										<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: {{ $numUsuarios }}%"> <span class="sr-only"></span> </div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-sm-6 row-in-br  b-r-none">
							<div class="col-in row">
								<div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe01b;"></i>
									<h5 class="text-muted vb">Actividades</h5>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-6">
									<h3 class="counter text-right m-t-15 text-warning">169</h3>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="progress">
										<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-4">
							<div class="bg-theme m-b-15">
								<div id="myCarouse2" class="carousel vcarousel slide p-20">
									<!-- Carousel items -->
									<div class="carousel-inner ">
										<div class="active item">
											<h5 class="text-white">My Acting blown <span class="font-bold">Your Mind</span> and you also laugh at the moment</h5>
											<div class="twi-user"><img src="eliteAdmin/plugins/images/users/hritik.jpg" alt="user" class="img-circle img-responsive pull-left">
												<h4 class="text-white m-b-0">Govinda</h4>
												<p class="text-white">Actor</p>
											</div>
										</div>
										<div class="item">
											<h5 class="text-white">My Acting blown <span class="font-bold">Your Mind</span> and you also laugh at the moment</h5>
											<div class="twi-user"><img src="eliteAdmin/plugins/images/users/genu.jpg" alt="user" class="img-circle img-responsive pull-left">
												<h4 class="text-white m-b-0">Govinda</h4>
												<p class="text-white">Actor</p>
											</div>
										</div>
										<div class="item">
											<h5 class="text-white">My Acting blown <span class="font-bold">Your Mind</span> and you also laugh at the moment</h5>
											<div class="twi-user"><img src="eliteAdmin/plugins/images/users/ritesh.jpg" alt="user" class="img-circle img-responsive pull-left">
												<h4 class="text-white m-b-0">Govinda</h4>
												<p class="text-white">Actor</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--row -->
		<!-- /.row -->
		<div class="row">

			<div class="col-md-5 col-lg-3 col-sm-6 col-xs-12">
				<div class="row">


				</div>
			</div>
		</div>
		<!--row -->
		<div class="row">
			<div class="col-md-12 col-lg-8 col-sm-12">
				<div class="white-box">
					<h3 class="box-title">Proximas Actividades</h3>
                        <!--Esta sección estara formada por las proximas 5 actividades, traeremos los datos con una consulta que obtendrá 5 activiades order by fecha desc.
                            Mostrara el titulo, la fecha, el lugar, el numero de voluntarios necesarios y los voluntarios que hay apuntados.
                            Para esto ultimo realizaremos una consulta a la tabla voluntarios participantes, filtarndo por id y contaremos todos los id de los voluntarios que coincidan con el id de la actividad
                            Tambien contaremos el numero de usuarios que participan del mismo modo que contamos los participantes.
                        -->

                        <div class="table-responsive">
                        	<table class="table ">
                        		<thead>
                        			<tr>
                        				<th>Nombre Actividad</th>
                        				<th>Fecha</th>
                        				<th>Lugar</th>
                        				<th>Voluntarios Necesarios</th>
                        				<th>Voluntarios Apuntados</th>
                        				<th>Nº de Participantes</th>
                        			</tr>
                        		</thead>
                        		<tbody>
                        			<tr>
                        				<td class="txt-oflo">Elite admin</td>
                        				<td><span class="label label-megna label-rounded">SALE</span> </td>
                        				<td class="txt-oflo">April 18</td>
                        				<td><span class="text-success">$24</span></td>
                        			</tr>
                        			<tr>
                        				<td class="txt-oflo">Real Homes</td>
                        				<td><span class="label label-info label-rounded">EXTENDED</span></td>
                        				<td class="txt-oflo">April 19</td>
                        				<td><span class="text-info">$1250</span></td>
                        			</tr>
                        			<tr>
                        				<td class="txt-oflo">Medical Pro</td>
                        				<td><span class="label label-warning label-rounded">TAX</span></td>
                        				<td class="txt-oflo">April 20</td>
                        				<td><span class="text-danger">-$24</span></td>
                        			</tr>
                        			<tr>
                        				<td class="txt-oflo">Hosting press</td>
                        				<td><span class="label label-megna label-rounded">SALE</span></td>
                        				<td class="txt-oflo">April 21</td>
                        				<td><span class="text-success">$24</span></td>
                        			</tr>
                        			<tr>
                        				<td class="txt-oflo">Helping Hands</td>
                        				<td><span class="label label-success label-rounded">MEMBER</span></td>
                        				<td class="txt-oflo">April 22</td>
                        				<td><span class="text-success">$24</span></td>
                        			</tr>
                        			<tr>
                        				<td class="txt-oflo">Digital Agency</td>
                        				<td><span class="label label-megna label-rounded">SALE</span> </td>
                        				<td class="txt-oflo">April 23</td>
                        				<td><span class="text-danger">-$14</span></td>
                        			</tr>
                        			<tr>
                        				<td class="txt-oflo">Helping Hands</td>
                        				<td><span class="label label-success label-rounded">MEMBER</span></td>
                        				<td class="txt-oflo">April 22</td>
                        				<td><span class="text-success">$64</span></td>
                        			</tr>
                        		</tbody>
                        	</table>
                        	<a href="#">Check all the sales</a> </div>
                        </div>
                    </div>
                    <?php
                    $ultimosUsuarios = usuario::Where('id_asociacion',$asociacionId)->orderBy('created_at','desc')->get();
                    ?>
                    <div class="col-md-12 col-lg-4 col-sm-12">
                    	<div class="white-box">
                    		<h3 class="box-title">Ultimos Usuarios</h3>
                    		<div class="comment-center">
                    			@foreach ($ultimosUsuarios as $element)
                    			{{-- expr --}}

                    			<div class="comment-body">
                    				<div class="user-img"> <img src="{{ $element->avatar }}" alt="user" class="img-circle"></div>
                    				<div class="mail-contnet">
                    					<h5>{{ $element->nombre.' '.$element->apellidos}}</h5>
                    					<br>
                    					<span class="label label-rounded label-info">Fecha de Creación {{ $element->created_at }}</span>
                    				</div>
                    			</div>
                    			@endforeach
                    		</div>


                    		<!-- /.row -->
                    		<!-- .right-sidebar -->
                    		<div class="right-sidebar">
                    			<div class="slimscrollright">
                    				<div class="rpanel-title"> Panel de Ajustes <span><i class="ti-close right-side-toggle"></i></span> </div>
                    				<div class="r-panel-body">
                    					<ul>
                    						<li><b>Opciones de Visualización</b></li>
                    						<li>
                    							<div class="checkbox checkbox-info">
                    								<input id="checkbox1" type="checkbox" class="fxhdr">
                    								<label for="checkbox1"> Fijar Barra de Navegación </label>
                    							</div>
                    						</li>
                    						<li>
                    							<div class="checkbox checkbox-success">
                    								<input id="checkbox4" type="checkbox" class="open-close">
                    								<label for="checkbox4"> Mostar Solo Iconos </label>
                    							</div>
                    						</li>
                    						<li>
                    							<div class="checkbox checkbox-warning">
                    								<input id="checkbox2" type="checkbox" class="fxsdr">
                    								<label for="checkbox2"> Fijar Barra Lateral </label>
                    							</div>
                    						</li>
                    					</ul>
                    				</div>
                    			</div>
                    		</div>
                    		<!-- /.right-sidebar -->
                    	</div>
                    </div>    <!-- /.container-fluid -->
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

