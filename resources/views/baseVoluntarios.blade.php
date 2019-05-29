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
<?php
use App\asociacion;
use App\usuario;
use App\oferta;
use App\UsuariosParticipantes;
use App\VoluntariosParticipantes;

$ofertas = oferta::orderBy('created_at','desc')->get();
?>
<body >
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Top Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <!-- Toggle icon for mobile view -->
                <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>

                <!-- /Logo -->
                <!-- Search input and Toggle icon -->
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <a class="logo" href="index.html">
                        <b>
                            <!--This is dark logo icon--><img src="/img/iconos/UsersWhite.png" alt="home" class="dark-logo" with="40%" height="40%" />
                        </b>
                    </a>

                </ul>
                <!-- This is the message dropdown -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#">
                            <span>Actividades</span>
                        </a>

                        <!-- /.dropdown-messages -->
                    </li>
                    <!-- .Task dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#">
                            <span>Opiniones</span>
                        </a>
                    </li>
                    <!-- /.Task dropdown -->

                    <li class="right-side-toggle"> <a class="waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>
                    <!-- /.dropdown -->
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page">
            <div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Inicio</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->

                    <!-- /.breadcrumb -->
                </div>
                <!-- .row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Proximas Actividades</h3>

                            <div class="row">
                                @foreach ($ofertas as $element)
                                <?php
                                $id = $element->id_asociacion;
                                $aso = asociacion::find($id);
                                $fechaSinForma = $element->fecha;
                                $usuApuntados = UsuariosParticipantes::where('id_oferta', $element->id)->count();
                                $fecha = date('d-m-Y', strtotime($fechaSinForma));
                                $descripcion = str_split($element->descripcion, 66);
                                ?>
                                <div class="col-md-2">
                                    <div class="card">
                                        <img class="card-img-top image-responsive" src="{{ $aso->avatar }}"  alt="Card image cap">

                                        <div class="card-block">
                                            <h4 class="card-title">{{ $element->nombre }} </h4>
                                            <p class="card-text">{{$descripcion[0].'...' }}</p>
                                            <p class="card-text"><i class="fa fa-calendar"></i> {{ $fecha}}  <i class="fa fa-map-marker"></i> {{ $element->lugar }}  <i class="fa fa-users" data-toggle="tooltip" data-placement="top" title="Voluntarios Necesarios"></i>{{ $element->voluntarios_necesarios }} <i class="fa fa-wheelchair" data-toggle="tooltip" data-placement="top" title="Usuarios Apuntados"></i>{{ $usuApuntados }} </p>
                                            <a href="#" class="btn btn-primary">Ver Actividad</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .row -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Ajustes <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul class="chatonline">
                                <li>
                                    <a href="javascript:void(0)"><i class="fa fa-user"></i><span>  Perfil</span></a>
                                </li>
                                <li>
                                    <a href="/logoutVol"><i class="fa  fa-power-off"></i><span>  Logout</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.right-sidebar -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2019 &copy; Creado por Rafael Yébenes Rivera </footer>
        </div>

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
