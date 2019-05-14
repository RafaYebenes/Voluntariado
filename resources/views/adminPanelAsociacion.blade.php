<!DOCTYPE html>

<?php
use App\asociacion;
use App\usuario;
$asociacionId = Request::input('asociacion');

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
	<link rel="icon" type="image/png" sizes="16x16" href="eliteAdmin/plugins/images/favicon.png">
	<title>Elite Admin Template - The Ultimate Multipurpose admin template</title>
	<!-- Bootstrap Core CSS -->
	<link href="eliteAdmin/estilos/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="eliteAdmin/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
	<!-- Menu CSS -->
	<link href="eliteAdmin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
	<!-- toast CSS -->
	<link href="eliteAdmin/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
	<!-- morris CSS -->
	<link href="eliteAdmin/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
	<!-- animation CSS -->
	<link href="eliteAdmin/estilos/css/animate.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="eliteAdmin/estilos/css/style.css" rel="stylesheet">
	<!-- color CSS -->
	<link href="eliteAdmin/estilos/css/colors/default-dark.css" id="theme" rel="stylesheet">
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
				<div class="top-left-part"><a class="logo" href="index.html"><b><!--This is dark logo icon--><img src="eliteAdmin/plugins/images/eliteadmin-logo.png" alt="home" class="dark-logo" /><!--This is light logo     icon--><img src="eliteAdmin/plugins/images/eliteadmin-logo-dark.png" alt="home" class="light-logo" /></b><span class="hidden-xs"><!--This is dark logo text--><img src="eliteAdmin/plugins/images/eliteadmin-text.png" alt="home" class="dark-logo" /><!--This is light logo text--><img src="eliteAdmin/plugins/images/eliteadmin-text-dark.png" alt="home" class="light-logo" /></span></a></div>
				<ul class="nav navbar-top-links navbar-left hidden-xs">
					<li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
					<li>
						<form role="search" class="app-search hidden-xs">
							<input type="text" placeholder="Search..." class="form-control">
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
						<div><img src="eliteAdmin/plugins/images/users/varun.jpg" alt="user-img" class="img-circle"></div>
						<a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $asociacion->nombre }} <span class="caret"></span></a>
						<ul class="dropdown-menu animated flipInY">
							<li><a href="#"><i class="ti-user"></i> Perfil</a></li>
							<li><a href="#"><i class="ti-email"></i> Mensajes</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="#"><i class="ti-settings"></i> Ajustes de Cuenta</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="cerrarSesionAso"><i class="fa fa-power-off"></i> Salir</a></li>
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
					<li class="nav-small-cap m-t-10">--- Main Menu</li>
					<li>
						<a href="index.html" class="waves-effect active"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i>
							<span class="hide-menu"> Usuarios <span class="fa arrow"></span></span>
						</a>
						<ul class="nav nav-second-level">
							<li> <a href="#">Gestionar Usuarios</a> </li>
							<li> <a href="#">Crear Usuarios</a> </li>
						</ul>
					</li>

					<li> <a href="#" class="waves-effect"><i data-icon="/" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Actividades<span class="fa arrow"></span> </span></a>
						<ul class="nav nav-second-level">
							<li> <a href="#">Gestionar Actividades</a> </li>
							<li> <a href="#">Crear Actividad</a> </li>
						</ul>
					</li>

					<li class="nav-small-cap">--- Soporte</li>
					<li><a href="documentation.html" class="waves-effect"><i class="fa fa-circle-o text-danger"></i> <span class="hide-menu">Ayuda</span></a></li>
					<li><a href="faq.html" class="waves-effect"><i class="fa fa-circle-o text-success"></i> <span class="hide-menu">Faqs</span></a></li>
					<li class="right-side-toggle"> <a class="waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>
					<!-- /.dropdown -->
				</ul>
			</div>
			<!-- /.navbar-header -->
			<!-- /.navbar-top-links -->
			<!-- /.navbar-static-side -->
		</nav>
		<!-- Left navbar-header -->
		<div class="navbar-default sidebar" role="navigation">
			<div class="sidebar-nav navbar-collapse slimscrollsidebar">
				<div class="user-profile">
					<div class="dropdown user-pro-body">
						<div><img src="eliteAdmin/plugins/images/users/varun.jpg" alt="user-img" class="img-circle"></div>
						<a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $asociacion->nombre }} <span class="caret"></span></a>
						<ul class="dropdown-menu animated flipInY">
							<li><a href="#"><i class="ti-user"></i> Perfil</a></li>
							<li><a href="#"><i class="ti-email"></i> Mensajes</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="#"><i class="ti-settings"></i> Ajustes de Cuenta</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="cerrarSesionAso"><i class="fa fa-power-off"></i>  Salir</a></li>
						</ul>
					</div>
				</div>
				@show


				<div class="container">
					@yield('Contenido')
				</div>


				@section('footer')
				<footer class="footer text-center"> 2019 &copy; Creado por Rafael Yébenes Rivera </footer>
				@show














				<!-- jQuery -->
				<script src="eliteAdmin/plugins/bower_components/jquery/dist/jquery.min.js"></script>
				<!-- Bootstrap Core JavaScript -->
				<script src="eliteAdmin/estilos/bootstrap/dist/js/tether.min.js"></script>
				<script src="eliteAdmin/estilos/bootstrap/dist/js/bootstrap.min.js"></script>
				<script src="eliteAdmin/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
				<!-- Menu Plugin JavaScript -->
				<script src="eliteAdmin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
				<!--slimscroll JavaScript -->
				<script src="eliteAdmin/estilos/js/jquery.slimscroll.js"></script>
				<!--Wave Effects -->
				<script src="eliteAdmin/estilos/js/waves.js"></script>
				<!--Counter js -->
				<script src="eliteAdmin/plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
				<script src="eliteAdmin/plugins/bower_components/counterup/jquery.counterup.min.js"></script>
				<!--Morris JavaScript -->
				<script src="eliteAdmin/plugins/bower_components/raphael/raphael-min.js"></script>
				<script src="eliteAdmin/plugins/bower_components/morrisjs/morris.js"></script>
				<!-- Custom Theme JavaScript -->
				<script src="eliteAdmin/estilos/js/custom.min.js"></script>
				<script src="eliteAdmin/estilos/js/dashboard1.js"></script>
				<!-- Sparkline chart JavaScript -->
				<script src="eliteAdmin/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
				<script src="eliteAdmin/plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
				<script src="eliteAdmin/plugins/bower_components/toast-master/js/jquery.toast.js"></script>
				<script type="text/javascript">
					$(document).ready(function() {
						$.toast({
							heading: 'Welcome to Elite admin',
							text: 'Use the predefined ones, or specify a custom position object.',
							position: 'top-right',
							loaderBg: '#ff6849',
							icon: 'info',
							hideAfter: 3500,

							stack: 6
						})
					});
				</script>
				<!--Style Switcher -->
				<script src="eliteAdmin/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
			</body>
			</html>
