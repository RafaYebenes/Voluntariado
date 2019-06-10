<!DOCTYPE html>
<!--
   This is a starter template page. Use this page to start your new project from
   scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<?php
use App\asociacion;
use App\usuario;
use App\voluntario;
use App\oferta;
use App\UsuariosParticipantes;
use App\VoluntariosParticipantes;
use App\VoluntarioPuntuaUsuario;
use App\UsuarioPuntuaVoluntario;


$usuario = usuario::find($id);
$IdActividadesParticipadas = UsuariosParticipantes::Where('id_usuario', $id)->get();
$numActividadesParticipadas =  UsuariosParticipantes::Where('id_usuario', $id)->count();
$count = 0;
$oferta = "";
$fecha = "";

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
  <script  src="/eliteAdmin/plugins/bower_components/jquery/dist/jquery.min.js"></script>
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
  <script src="/eliteAdmin/plugins/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="/eliteAdmin/plugins/bower_components/jquery/dist/jquery.min.js"></script>

  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="/eliteAdmin/plugins/bower_components/ion-rangeslider/js/ion-rangeSlider/ion.rangeSlider.min.js"></script>
  <script src="/eliteAdmin/plugins/bower_components/ion-rangeslider/js/ion-rangeSlider/ion.rangeSlider-init.js"></script>
  <script src="/eliteAdmin/plugins/bower_components/jquery/dist/jquery.min.js"></script>
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
        @section('navBar')
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                <div class="top-left-part">

                    <a class="logo" href="">
                        <b>
                            <img src="/img/iconos/UsersWhite.png" alt="home" class="dark-logo" with="40%" height="40%" />
                        </b>
                        Voluntariado
                    </a>
                </div>

            </div>
        </nav>
        @show

        @section('sideBar')
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <div class="user-profile">
                    <div class="dropdown user-pro-body">
                        <div><img src="/{{ $usuario->avatar }}" alt="user-img" class="img-circle"></div>
                        <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $usuario->nombre }} <span class="caret"></span></a>
                        <ul class="dropdown-menu animated flipInY">
                            <li><a href="/logoutUser"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>

                <ul class="nav" id="side-menu">
                    <li class="sidebar-search hidden-sm hidden-md hidden-lg">

                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
                            </span>
                        </div>

                    </li>
                    <li class="nav-small-cap m-t-10">--- Inicio</li>
                    <li><a href="/inicioUsuario/{{ $usuario->id }}" class="waves-effect " ><i  class="linea-icon linea-basic fa fa-home"></i> <span class="hide-menu">Inicio</span></a> </li>
                    <li>
                        <a href="javascript:void(0)" class="waves-effect active"><i data-icon="v" class="fa fa-star"></i> <span class="hide-menu">Puntuaciones</span></a>
                    </li>
                </ul>
            </div>
        </div>
        @show

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">

                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Puntuaciones</h4>
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
                <!-- .row -->
                <div class="row">
                    <div class="col-md-12">
                        @foreach ($IdActividadesParticipadas as $element)

                        <div class="white-box" id="Actividad{{$element->id_oferta}}">

                            <?php
                            $oferta = oferta::find($element->id_oferta);
                            $VoluntariosParticantes = VoluntariosParticipantes::where('id_oferta', $oferta->id)->get();
                            $participantes = VoluntariosParticipantes::where('id_oferta', $oferta->id)->count();
                            $num = 0;
                            $fecha = date('d-M-Y', strtotime($oferta->fecha));

                            ?>
                            @if ($participantes > 0)

                            <h3 class="box-title">Actividad: {{ $oferta->nombre }}, Realizada el día: {{ $fecha }}</h3>
                            <div class="white-box">
                                <div class="row">

                                    @foreach ($VoluntariosParticantes as $element2)
                                    <?php

                                    $voluntario = voluntario::find($element2->id_voluntario);
                                    if(($oferta!=null)&&($voluntario !=null)){
                                        $haSidoPuntuado = UsuarioPuntuaVoluntario::where('id_actividad', $oferta->id)->where('id_voluntario', $voluntario->id)->where('id_usuario', $usuario->id)->first();

                                    }else{
                                        $haSidoPuntuado = 1;

                                    }
                                    ?>

                                    @if ($haSidoPuntuado == null)

                                    <div class="col-md-2 col-lg-">
                                        <div class="card">
                                            <img class="card-img-top image-responsive" src="/{{ $voluntario->avatar }}"  alt="Card image cap">

                                            <h4 class="card-title"><center>{{ $voluntario->nombre.' '.$voluntario->apellidos }}</center> </h4>
                                            <hr>
                                            <div class="card-body" style="margin-left: 2px; margin-right: 5px;  ">
                                                <form class="floating-labels" method="post" id="myForm" action="/puntuarVoluntario" enctype="multipart/form-data" files=true >
                                                    {!! csrf_field() !!}
                                                    <div class="form-group">
                                                        <input type="text" name="id" hidden value="{{ $oferta->id.'_'.$voluntario->id.'_'.$usuario->id }}">
                                                        <input type="text" class="form-control" name="puntuacion" id="puntuacion" required> <span class="bar"></span>
                                                        <label for="puntuacion">Puntua del 1 al 10</label>
                                                    </div>


                                                </div>
                                                <br>
                                                <div class="form-actions">
                                                    <center> <button type="submit" class="btn btn-success">Puntuar</button></center>
                                                </div>
                                            </form>
                                            <br>
                                        </div>
                                    </div>
                                    @else
                                    <?php
                                    $num = $num+1;

                                    ?>
                                    @endif
                                    @endforeach

                                    @if (($num == $participantes))

                                    <script type="text/javascript"> $('#Actividad{{ $oferta->id }}').hide(); </script>
                                    <?php $count = $count +1;?>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @if ($count == $numActividadesParticipadas)
                        <div class="white-box">
                            <h3 class="box-title">No tienes voluntarios por puntuar</h3>
                        </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- jQuery -->

    <!-- Bootstrap Core JavaScript -->


</body>
</html>

