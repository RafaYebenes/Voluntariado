<!DOCTYPE html>
<!--
   This is a starter template page. Use this page to start your new project from
   scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<?php
use App\asociacion;
use App\usuario;
use App\oferta;
use App\UsuariosParticipantes;

$usuario = usuario::where('id', $id)->get();
$actividadesRealizadas = UsuariosParticipantes::where('id_usuario', $id)->count();
$actividadesParticipadas = UsuariosParticipantes::where('id_usuario', $id)->get();
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/eliteAdmin/plugins/images/favicon.png">
    <title>Area Usuario - Voluntariado.cloud</title>
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

<body class="fix-sidebar">
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Top Navigation -->
        @section('navBar')
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <!-- Toggle icon for mobile view -->
                <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="">
                        <b>
                            <img src="/img/iconos/UsersWhite.png" alt="home" class="dark-logo" with="40%" height="40%" />
                        </b>
                        Voluntariado
                    </a>
                </div>
                <!-- /Logo -->

            </div>
        </nav>
        @show
        <!-- End Top Navigation -->
        <!-- Left navbar-header -->
        @section('sideBar')
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <!-- .User Profile -->
                <div class="user-profile">
                    <div class="dropdown user-pro-body">
                        <div><img src="/{{ $usuario[0]->avatar }}" alt="user-img" class="img-circle"></div>
                        <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $usuario[0]->nombre }} <span class="caret"></span></a>
                        <ul class="dropdown-menu animated flipInY">
                            <li><a href="/logoutUser"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
                <!-- .User Profile -->
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                        <!-- / Search input-group this is only view in mobile-->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
                            </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li class="nav-small-cap m-t-10">--- Inicio</li>
                    <li><a href="javascript:void(0)" class="waves-effect active" ><i  class="linea-icon linea-basic fa fa-home"></i> <span class="hide-menu">Inicio</span></a> </li>
                    <li>
                        <a href="javascript:void(0)" class="waves-effect "><i data-icon="v" class="fa fa-star"></i> <span class="hide-menu">Puntuaciones</span></a>
                    </li>
                </ul>
            </div>
        </div>
        @show
        <!-- Left navbar-header end -->
        <!-- Page Content -->

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
                                        @if (sizeof($actividadesParticipadas)==0)
                                        <h3>{{ $usuario[0]->nombre }} todavia no ha participado en ninguna actividad</h3>
                                        @else
                                        @foreach ($actividadesParticipadas as $element)
                                        <?php
                                        $oferta = oferta::where('id', $element->id_oferta)->get();
                                        ?>

                                        <div class="sl-item">
                                            <div class="sl-left"> <img src="/{{$usuario[0]->avatar  }}" alt="user" class="img-circle" /> </div>
                                            <div class="sl-right">
                                                <div class="m-l-40">{{$usuario[0]->nombre.' '.$usuario[0]->apellidos}} <span class="sl-date">{{ $oferta[0]->fecha }}</span>
                                                    <p>Participo en la actividad<a href="#" > {{ $oferta[0]->nombre }}</a></p>

                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>


                                <div class="tab-pane active" id="settings">
                                    <form class="form-horizontal form-material " action="/UpdateUser" enctype="multipart/form-data" method="post">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="id" value="{{ $usuario[0]->id }}">
                                        <div class="form-group">
                                            <label class="col-md-12">Nombre</label>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="{{ $usuario[0]->nombre }}" name="nombre" class="form-control form-control-line" value="{{ $usuario[0]->nombre }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Apellidos</label>
                                            <div class="col-md-12">
                                                <input type="text" name="apellidos" placeholder="{{ $usuario[0]->apellidos }}" class="form-control form-control-line" value="{{ $usuario[0]->apellidos }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-email" class="col-md-12">Email</label>
                                            <div class="col-md-12">
                                                <input type="email" placeholder="{{ $usuario[0]->email }}" class="form-control form-control-line" name="email" id="example-email" value="{{ $usuario[0]->email }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Telefono</label>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="{{ $usuario[0]->telefono }}" class="form-control form-control-line" name="telefono" value="{{ $usuario[0]->telefono }}">
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
