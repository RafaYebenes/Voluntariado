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


    <link rel="stylesheet" type="text/css" href="css/animacionesEntradas.css">
    <link rel="stylesheet" type="text/css" href="css/myStyle.css">

</head>
<body >
    <nav class="nav-container">
        <a href="/">Home</a>
    </nav>

    <div class="main-container">
        <section class="height-100 imagebg text-center" data-overlay="4">
            <div class="background-image-holder">
                <img alt="background" src="img/loginAsociacionFondo.png" />
            </div>



            <div class="container pos-vertical-center">
                <div class="row">
                    <div class="col-md-7 col-lg-5">

                        <form class="slideUp" id="formLogin">
                            <div class="col-md-12">
                                <img src="img/asociacion.png"  height="150px" width="150px" >
                            </div>
                            <h2>Inicio Sesión Asociaciones</h2>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" placeholder="Email"/>
                                </div>
                                <div class="col-md-12">
                                    <input type="password" placeholder="Contraseña" />
                                </div>
                                <div class="col-md-6">
                                    <a class="btn btn--primary type--uppercase" type="">Iniciar Sesión</a>
                                </div>
                                <div class="col-md-6">
                                    <a class="btn btn-lg btn-warning type--uppercase " type="reset" id="btnRegistro" >Crear Cuenta</a>
                                </div>
                            </div>
                            <!--end of row-->
                            <span class="type--fine-print block">¿Ha olvidado sus datos?
                                <a href="page-accounts-recover.html">Recuperar cuenta</a>
                            </span>
                        </form>

                        <form class="slideDown" id="formRegistro">
                            <div class="col-md-12">
                                <img src="img/asociacion.png"  height="150px" width="150px" >
                            </div>
                            <h2>Registro Asociación</h2>
                            <div class="row">

                                <div class="col-md-4">
                                    <input type="text" name="name" placeholder="Nombre *">
                                </div>

                                <div class="col-md-4">
                                    <input type="text" name="telefono" placeholder="Telefono *">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="web" placeholder="Página Web *">
                                </div>

                                <div class="col-md-4">
                                    <input type="text" name="pais" placeholder="Pais *">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="provincia" placeholder="Provincia *">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="poblacion" placeholder="Población *">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="cp" placeholder="Código Postal *">
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="direccion" placeholder="Dirección *">
                                </div>

                                <div class="col-md-12">
                                    <input type="text" placeholder="Email *"/>
                                    <input type="password" placeholder="Contraseña *" />
                                </div>

                                <div class="col-md-6">
                                    <a class="btn btn--primary type--uppercase" type="submit">Registrar</a>
                                </div>
                                <div class="col-md-6">
                                    <a class="btn btn-warning type--uppercase btn-lg" type="button" id="btnVolver">Volver</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </div>
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

   </script>
</body>
</html>