<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Site Description Here">

    <!Fuentes -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,400i,500,600,700%7CMerriweather:300,300i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/stack-interface.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/socicon.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/lightbox.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/flickity.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/iconsmind.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/jquery.steps.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/theme.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/custom.css" rel="stylesheet" type="text/css" media="all" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,400i,500,600,700%7CMerriweather:300,300i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



    <link rel="stylesheet" type="text/css" href="css/animacionesEntradas.css">
    <link rel="stylesheet" type="text/css" href="css/myStyle.css">
</head>

<body >


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
<a id="start"></a>
<div class="nav-container ">

    <div class="nav-container ">
        <div class="bar bar--sm visible-xs">
            <div class="container">
                <div class="row">
                    <div class="col-3 col-md-2">
                        <a href="index.html">
                            <img class="logo logo-dark" alt="logo" src="img/logo-dark.png" />
                            <img class="logo logo-light" alt="logo" src="img/logo-light.png" />
                        </a>
                    </div>
                    <div class="col-9 col-md-10 text-right">
                        <a href="#" class="hamburger-toggle" data-toggle-class="#menu1;hidden-xs">
                            <i class="icon icon--sm stack-interface stack-menu"></i>
                        </a>
                    </div>
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </div>
        <!--end bar-->
        <nav id="menu1" class="bar bar--sm bar-1 hidden-xs bar--transparent bar--absolute">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1 col-md-2 hidden-xs">
                        <div class="bar__module">
                            <a href="/">
                                <img class="logo logo-dark" alt="logo" src="img/iconos/multiUsers.png" />
                                <img class="logo logo-light" alt="logo" src="img/iconos/multiUsers.png" />
                            </a>
                        </div>
                        <!--end module-->
                    </div>
                    <div class="col-lg-11 col-md-12 text-right text-left-xs text-left-sm">
                        <div class="bar__module">
                            <ul class="menu-horizontal text-left">
                                <li class="">
                                    <a href="/"><span class="dropdown__trigger">Inicio</span></a>
                                    <!--end dropdown container-->
                                </li>
                                <li class="">
                                    <a href="/#about"><span class="dropdown__trigger">¿Quienes Somos?</span></a>
                                    <!--end dropdown container-->
                                </li>
                                <li class="">
                                 <a href="/#contact"><span class="dropdown__trigger">Contacto</span></a>
                                 <!--end dropdown container-->
                             </li>
                         </ul>
                     </div>

                     <!--end module-->
                 </div>
             </div>
             <!--end of row-->
         </div>
         <!--end of container-->
     </nav>
     <!--end bar-->
 </div>
 <!--end bar-->
</div>

<div class="main-container">
    <section class="height-100 imagebg text-center" data-overlay="4">
        <div class="background-image-holder">
            <img alt="background" src="img/loginAsociacionFondo.png" />
        </div>
        <div class="container pos-vertical-center">
            <div class="row">
                <div class="col-md-7 col-lg-5">

                    <!--Formulario Inicio Sesión-->
                    <form class="slideUp" id="formLogin" action="/loginVoluntario" method="post">
                     {!! csrf_field() !!}
                     <div class="col-md-12">
                        <img src="img/iconos/multiUsers.png"  height="150px" width="150px" >
                    </div>
                    <h2>Inicio Sesión Voluntarios</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" name="email" placeholder="Email"/>
                        </div>
                        <div class="col-md-12">
                            <input type="password" name="password" placeholder="Contraseña" />
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class=" btn btn-primary type--uppercase btn-lg btn-block " > Iniciar Sesión   </button>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-warning type--uppercase  btn-block" id="btnRegistro">Crear Cuenta</button>
                            <!--<a class=" btn btn-warning type--uppercase  " type="button" id="btnRegistro">Crear Cuenta</a>-->
                        </div>
                    </div>

                    <span class="type--fine-print block">¿Ha olvidado sus datos?
                        <a href="page-accounts-recover.html">Recuperar cuenta</a>
                    </span>
                </form>
                <!--Fin Formulario Inicio Sesión-->
                <!--Cominezo Formulario Registro-->
                <form class="slideDown" id="formRegistro" action="createVoluntario" enctype="multipart/form-data" files=true  method="post">
                   {!! csrf_field() !!}
                   <div class="col-md-12">
                    <img src="img/iconos/multiUsers.png"  height="130px" width="130px" >
                </div>
                <h2>Registro Voluntarios</h2>
                <div class="row">

                    <div class="col-md-4">
                        <input type="text" name="name" placeholder="Nombre *" required>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="apellidos" placeholder="Apellidos *" required>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="fechaNacimiento" placeholder="dd/mm/yyyy"  data-toggle="tooltip" data-placement="top" title="Edad" required>
                    </div>
                    <div class="col-md-12">
                        <input required type="file" value="" class="form-control" name="avatar" data-toggle="tooltip" data-placement="top" title="Imagen de Perfil" >
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="pais" placeholder="Pais *" required id="Elemento">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="provincia" placeholder="Provincia *" id="Elemento" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="poblacion" placeholder="Población *" id="Elemento" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="cp" placeholder="Código Postal *" id="Elemento" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="direccion" placeholder="Dirección *" id="Elemento" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="telefono" placeholder="Telefono *"  id="Elemento" required>
                    </div>
                    <div class="col-md-12" id="Elemento">
                        <input type="text" placeholder="Email *" name="email" required/>
                        <input type="password" placeholder="Contraseña *"  name="password" required/>
                    </div>

                    <div class="col-md-6">
                        <button type="submit" class=" btn btn-primary type--uppercase btn-lg btn-block " > Registro  </button>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-warning type--uppercase  btn-block" id="btnVolver">Volver</button>
                    </div>
                </div>
            </form>
            <!--Fin Formulario Registro-->
        </div>
    </div>
    <!--end of row-->
</div>
<!--end of container-->
</section>
</div>

<!--<div class="loader"></div>-->

<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/flickity.min.js"></script>
<script src="js/easypiechart.min.js"></script>
<script src="js/parallax.js"></script>
<script src="js/typed.min.js"></script>
<script src="js/datepicker.js"></script>
<script src="js/isotope.min.js"></script>
<script src="js/ytplayer.min.js"></script>
<script src="js/lightbox.min.js"></script>
<script src="js/granim.min.js"></script>
<script src="js/jquery.steps.min.js"></script>
<script src="js/countdown.min.js"></script>
<script src="js/twitterfetcher.min.js"></script>
<script src="js/spectragram.min.js"></script>
<script src="js/smooth-scroll.min.js"></script>
<script src="js/scripts.js"></script>

<script type="text/javascript">
    $('#formRegistro').hide();
    $('#btnRegistro').click(function(){
        $('#formLogin').hide();
        $('#formRegistro').show();
    });
    $('#btnVolver').click(function(){
       $('#formLogin').show();
       $('#formRegistro').hide();
   });

    $('.datepicker').datepicker({
        format: "dd/mm/yyyy",
        language: "es",
        autoclose: true,
        autoSize: true

    });
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
  });
</script>
</body>
</html>