<!DOCTYPE html>
<!--
   This is a starter template page. Use this page to start your new project from
   scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="/eliteAdmin/plugins/images/favicon.png">
	<title>Voluntariado.cloud - Area de Voluntarios</title>
	<!-- Bootstrap Core CSS -->
	<link href="/eliteAdmin/estilos/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="/eliteAdmin/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
	<!-- This is Sidebar menu CSS -->
	<link href="/eliteAdmin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
	<!-- This is a Animation CSS -->
	<link href="/eliteAdmin/estilos/css/animate.css" rel="stylesheet">
	<!-- This is a Custom CSS -->
	<link href="/eliteAdmin/estilos/css/style.css" rel="stylesheet">
	<!-- color CSS you can use different color css from css/colors folder -->
    <!-- We have chosen the skin-blue (default.css) for this starter
         page. However, you can choose any other skin from folder css / colors .
     -->
     <link href="/eliteAdmin/estilos/css/colors/default-dark.css" id="theme" rel="stylesheet">
     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
     <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<?php
use App\asociacion;
use App\usuario;
use App\voluntario;
use App\oferta;
use App\UsuariosParticipantes;
use App\VoluntariosParticipantes;

$ofertas = oferta::orderBy('created_at','desc')->get();
$voluntario = voluntario::find($id);

?>
<body  class="fluid">
	<!-- Preloader -->
	<div class="preloader">
		<div class="cssload-speeding-wheel"></div>
	</div>
	<div>
		@yield('navBar')


		<div>

			@yield('Contenido')
			<!-- /.container-fluid -->

		</div>
		@section('footer')
		<footer class="footer text-center"> 2019 &copy; Creado por Rafael Yébenes Rivera </footer>
		@show
		<!-- /#page-wrapper -->

	</div>

	<!-- /#wrapper -->
	<!-- jQuery -->
	<script src="/eliteAdmin/plugins/bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="/eliteAdmin/estilos/bootstrap/dist/js/tether.min.js"></script>
	<script src="/eliteAdmin/estilos/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="/eliteAdmin/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
	<!-- Sidebar menu plugin JavaScript -->
	<script src="/eliteAdmin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
	<!--Slimscroll JavaScript For custom scroll-->
	<script src="/eliteAdmin/estilos/js/jquery.slimscroll.js"></script>
	<!--Wave Effects -->
	<script src="/eliteAdmin/estilos/js/waves.js"></script>
	<!-- Custom Theme JavaScript -->
	<script src="/eliteAdmin/estilos/js/custom.min.js"></script>
</body>

</html>
