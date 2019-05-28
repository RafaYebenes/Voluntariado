<!DOCTYPE html>

<?php
use App\asociacion;
use App\usuario;
$asociacionId = Auth::id();

if($asociacionId){
	$asociacion = asociacion::find($asociacionId);
	$numUsuarios = usuario::where('id_asociacion','=',$asociacionId)->count();

}
?>

<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE="edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" type="image/png" sizes="16x16" href="/eliteAdmin/plugins/images/favicon.png">
	<title>Voluntariado </title>
	<!-- Bootstrap Core CSS -->
	<link href="/eliteAdmin/estilos/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="/eliteAdmin/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
	<!-- Menu CSS -->
	<link href="/eliteAdmin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
	<!-- toast CSS -->
	<link href="/eliteAdmin/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
	<!-- morris CSS -->
	<link href="/eliteAdmin/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
	<!-- animation CSS -->
	<link href="/eliteAdmin/estilos/css/animate.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="/eliteAdmin/estilos/css/style.css" rel="stylesheet">
	<!-- color CSS -->
	<link href="/eliteAdmin/estilos/css/colors/default-dark.css" id="theme" rel="stylesheet">

	<link href="/eliteAdmin/plugins/bower_components/jquery-wizard-master/css/wizard.css" rel="stylesheet">
	<link href="/eliteAdmin/plugins/bower_components/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script>
	(function(i, s, o, g, r, a, m) {
		i['GoogleAnalyticsObject'] = r;
		i[r] = i[r] || function() {
			(i[r].q = i[r].q || []).push(arguments)
		}, i[r].l = 1 * new Date();
		a = s.createElement(o),
		m = s.getElementsByTagName(o)[0];
		a.async = 1;
		a.src = g;
		m.parentNode.insertBefore(a, m)
	})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

	ga('create', 'UA-19175540-9', 'auto');
	ga('send', 'pageview');
</script>
</head>

<body>



	<!-- Preloader -->
	<div class="preloader">
		<div class="cssload-speeding-wheel"></div>
	</div>
	<div id="wrapper">
		<!-- Navigation -->
		@section('navBar')
		<nav class="navbar navbar-default navbar-static-top m-b-0">
			<div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
				<div class="top-left-part"><a class="logo" href="/"><b><!--This is dark logo icon--><img src="/img/asociacionWhite.png" width="50%" height="50%" alt="home" class="dark-logo" /><!--This is light logo     icon--><img src="/img/asociacionWhite.png" alt="home" class="light-logo" /></b><span class="hidden-xs">Voluntariado<!--This is light logo text--><img src="/img/asociacionWhite.png" alt="home" class="light-logo" /></span></a></div>
				<ul class="nav navbar-top-links navbar-left hidden-xs">
					<li><a href="#" class="open-close hidden-xs waves-effect waves-light"></a></li>
					<li>
						<form role="search" class="app-search hidden-xs">
							<input type="text" placeholder="Buscar..." class="form-control">
							<a href=""><i class="fa fa-search"></i></a>
						</form>
					</li>
				</ul>
				<ul class="nav navbar-top-links navbar-right pull-right">
					<li class="dropdown">
						<a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><i class="icon-envelope"></i>
							<div class="notify"></div>
						</a>
					</li>

					<li class="dropdown">
						<a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><i class="icon-note"></i>
							<div class="notify"></div>
						</a>
						<ul class="dropdown-menu dropdown-tasks animated slideInUp">
						</ul>
					</li>
					<li class="right-side-toggle">
						<a class="waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i>
						</a>
					</li>
				</ul>
			</div>
		</nav>
		@show
		<!-- Left navbar-header -->
		@section('sideBar')
		<div class="navbar-default sidebar" role="navigation">
			<div class="sidebar-nav navbar-collapse slimscrollsidebar">
				<div class="user-profile">
					<div class="dropdown user-pro-body">
						<div><img src="/eliteAdmin/plugins/images/users/varun.jpg" alt="user-img" class="img-circle"></div>

						<a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $asociacion->nombre }}<span class="caret"></span></a>
						<ul class="dropdown-menu animated flipInY">
							<li><a href="#"><i class="ti-settings"></i> Ajustes de Cuenta</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="/cerrarSesionAso"><i class="fa fa-power-off"></i> Salir</a></li>
						</ul>
					</div>
				</div>
				<ul class="nav" id="side-menu">
					<li class="sidebar-search hidden-sm hidden-md hidden-lg">
						<!-- input-group -->
						<div class="input-group custom-search-form">
							<input type="text" class="form-control" placeholder="Search...">
							<span class="input-group-btn">
								<button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
							</span>
						</div>
					</li>
					<li class="nav-small-cap m-t-10">--- Menu Principal</li>
					<li>
						<a href="/" class=" active"><i class="" data-icon=""></i>
							<span class="hide-menu"> Inicio </span>
						</a>
					</li>
					<li>

						<a href="index.html" class="waves-effect "><i class="linea-icon linea-basic fa fa-group" ></i>
							<span class="hide-menu"> Usuarios <span class="fa arrow"></span></span>
						</a>
						<ul class="nav nav-second-level">
							<li> <a href="/GestionarUsuarios">Gestionar Usuarios</a> </li>
							<li> <a href="/GoToCrearUsuario">Crear Usuarios</a> </li>
						</ul>
					</li>

					<li> <a href="#" class="waves-effect"><i data-icon="v" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Actividades<span class="fa arrow"></span> </span></a>
						<ul class="nav nav-second-level">
							<li> <a href="#">Gestionar Actividades</a> </li>
							<li> <a href="../GotoCrearActividad">Crear Actividad</a> </li>
						</ul>
					</li>

					<li class="nav-small-cap">--- Soporte</li>
					<li><a href="documentation.html" class="waves-effect"><i class="fa fa-circle-o text-danger"></i> <span class="hide-menu">Ayuda</span></a></li>
					<li><a href="faq.html" class="waves-effect"><i class="fa fa-circle-o text-success"></i> <span class="hide-menu">Faqs</span></a></li>

					<!-- /.dropdown -->
				</ul>

			</div>

			@show
			<!-- Left navbar-header -->

		</div>

		<div >

			@yield('Contenido')
		</div>


		@section('footer')
		<footer class="footer text-center"> 2019 &copy; Creado por Rafael Yébenes Rivera </footer>
		@show














		<!-- jQuery -->
		<script src="/eliteAdmin/plugins/bower_components/jquery/dist/jquery.min.js"></script>
		<!-- Bootstrap Core JavaScript -->
		<script src="/eliteAdmin/estilos/bootstrap/dist/js/tether.min.js"></script>
		<script src="/eliteAdmin/estilos/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="/eliteAdmin/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
		<!-- Menu Plugin JavaScript -->
		<script src="/eliteAdmin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
		<!--slimscroll JavaScript -->
		<script src="/eliteAdmin/estilos/js/jquery.slimscroll.js"></script>
		<!--Wave Effects -->
		<script src="/eliteAdmin/estilos/js/waves.js"></script>
		<!--Counter js -->
		<script src="/eliteAdmin/plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
		<script src="/eliteAdmin/plugins/bower_components/counterup/jquery.counterup.min.js"></script>
		<!--Morris JavaScript -->
		<script src="/eliteAdmin/plugins/bower_components/raphael/raphael-min.js"></script>
		<script src="/eliteAdmin/plugins/bower_components/morrisjs/morris.js"></script>
		<!-- Custom Theme JavaScript -->
		<script src="/eliteAdmin/estilos/js/custom.min.js"></script>
		<script src="/eliteAdmin/estilos/js/dashboard1.js"></script>
		<!-- Sparkline chart JavaScript -->
		<script src="/eliteAdmin/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
		<script src="/eliteAdmin/plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
		<script src="/eliteAdmin/plugins/bower_components/toast-master/js/jquery.toast.js"></script>
		<script src="/eliteAdmin/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="/eliteAdmin/plugins/bower_components/jquery-asColorPicker-master/libs/jquery-asColor.js"></script>
		<script src="/eliteAdmin/plugins/bower_components/jquery-asColorPicker-master/libs/jquery-asGradient.js"></script>
		<script src="/eliteAdmin/plugins/bower_components/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js"></script>
		<link rel="stylesheet" href="/eliteAdmin/plugins/bower_components/jquery-wizard-master/libs/formvalidation/formValidation.min.css">
		<!-- FormValidation plugin and the class supports validating Bootstrap form -->
		<script src="/eliteAdmin/plugins/bower_components/jquery-wizard-master/libs/formvalidation/formValidation.min.js"></script>
		<script src="/eliteAdmin/plugins/bower_components/jquery-wizard-master/libs/formvalidation/bootstrap.min.js"></script>
		<script src="/eliteAdmin/plugins/bower_components/jquery-wizard-master/dist/jquery-wizard.min.js"></script>
		<script src="/eliteAdmin/plugins/bower_components/moment/moment.js"></script>
		<script src="/eliteAdmin/estilos/js/custom.min.js"></script>
		<script src="/eliteAdmin/plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.js"></script>
		<script src="/eliteAdmin/plugins/bower_components/sweetalert/sweetalert.min.js"></script>
		<script src="/eliteAdmin/plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>

		<script type="text/javascript">

			$(document).ready(function() {

				if({{ $numUsuarios }} < 1){
					$.toast({
						heading: 'Bienvenido',
						text: 'No olvides crear usuarios',
						position: 'top-right',
						loaderBg: '#ff6849',
						icon: 'info',
						hideAfter: 3500,

						stack: 6
					})
				}

			});
			//Datepicker jquery
			jQuery('.mydatepicker, #datepicker').datepicker();
			jQuery('#datepicker-autoclose').datepicker({
				autoclose: true,
				todayHighlight: true
			});
			jQuery('#date-range').datepicker({
				toggleActive: true
			});
			jQuery('#datepicker-inline').datepicker({

				todayHighlight: true
			});
			//Fin Datepicker Jquery
			$('#accordion').wizard({
				step: '[data-toggle="collapse"]',

				buttonsAppendTo: '.panel-collapse',

				templates: {
					buttons: function() {
						var options = this.options;
						return '<div class="panel-footer"><ul class="pager">' +
						'<li class="previous">' +
						'<a href="#' + this.id + '" data-wizard="back" role="button">' + options.buttonLabels.back + '</a>' +
						'</li>' +
						'<li class="next">' +
						'<a href="#' + this.id + '" data-wizard="next" role="button">' + options.buttonLabels.next + '</a>' +
						'<a href="#' + this.id + '" data-wizard="finish" role="button">' + options.buttonLabels.finish + '</a>' +
						'</li>' +
						'</ul></div>';
					}
				},

				onBeforeShow: function(step) {
					step.$pane.collapse('show');
				},

				onBeforeHide: function(step) {
					step.$pane.collapse('hide');
				},

				onFinish: function() {
					swal("Message Finish!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.");
				}
			});

			$('#exampleBasic').wizard({
				onFinish: function() {
					swal("Message Finish!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.");
				}
			});

			 // For multiselect

			 $('#pre-selected-options').multiSelect();
			 $('#optgroup').multiSelect({
			 	selectableOptgroup: true
			 });

			 $('#public-methods').multiSelect();
			 $('#select-all').click(function() {
			 	$('#public-methods').multiSelect('select_all');
			 	return false;
			 });
			 $('#deselect-all').click(function() {
			 	$('#public-methods').multiSelect('deselect_all');
			 	return false;
			 });
			 $('#refresh').on('click', function() {
			 	$('#public-methods').multiSelect('refresh');
			 	return false;
			 });
			 $('#add-option').on('click', function() {
			 	$('#public-methods').multiSelect('addOption', {
			 		value: 42,
			 		text: 'test 42',
			 		index: 0
			 	});
			 	return false;
			 });

			  //Bootstrap-TouchSpin
			  $(".vertical-spin").TouchSpin({
			  	verticalbuttons: true,
			  	verticalupclass: 'ti-plus',
			  	verticaldownclass: 'ti-minus'
			  });
			  var vspinTrue = $(".vertical-spin").TouchSpin({
			  	verticalbuttons: true
			  });
			  if (vspinTrue) {
			  	$('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
			  }

			  $("input[name='tch1']").TouchSpin({
			  	min: 0,
			  	max: 100,
			  	step: 0.1,
			  	decimals: 2,
			  	boostat: 5,
			  	maxboostedstep: 10,
			  	postfix: '%'
			  });
			  $("input[name='tch2']").TouchSpin({
			  	min: -1000000000,
			  	max: 1000000000,
			  	stepinterval: 50,
			  	maxboostedstep: 10000000,
			  	prefix: '$'
			  });
			  $("input[name='tch3']").TouchSpin();

			  $("input[name='tch3_22']").TouchSpin({
			  	initval: 40
			  });

			  $("input[name='tch5']").TouchSpin({
			  	prefix: "pre",
			  	postfix: "post"
			  });

			</script>
			<!--Style Switcher -->
			<script src="eliteAdmin/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
		</body>
		</html>
		=======


	</script>
	<!--Style Switcher -->
	<script src="eliteAdmin/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>

