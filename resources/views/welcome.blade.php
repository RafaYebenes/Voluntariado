<?php
$asociaciones = 1;
?>
<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
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
    <link href="css/font-roboto.css" rel="stylesheet" type="text/css" media="all" />

    <link rel="stylesheet" type="text/css" href="css/animacionesEntradas.css">

    <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />



    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #72D851;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
        .nav-tabs{

        }
        .nav-tabs .nav-link.active,
        .show>.nav-tabs .nav-link{


        }

        .box{
            margin-top: 2%;
            background: #4295F9;
            border-width: 2px;
            border-color: black;
        }
        .cuadrao{
            display: inline-block;
            padding: 5%;

        }

        .box-content{
            color: white;
        }
    </style>
</head>
<body class="enable-animation">
    <!--Barra Navegación-->
    <!--Fin Barra Navegación-->

    <!--Home Page -->

    <div class="main-container">
        <section class="page-navigator">
            <ul>
                <li>
                    <a href="#home" class="inner-link" data-title="Inicio"></a>
                </li>
                <li>
                    <a href="#about" class="inner-link" data-title="¿Quienes Somos?"></a>
                </li>
                <li>
                    <a href="#contact" class="inner-link" data-title="Contacto"></a>
                </li>
            </ul>
        </section>
        <section id="home" class="imagebg parallax height-100 text-center" data-overlay="1">
            <div class="background-image-holder">
                <img alt="background" src="img/fondo1.png" />
            </div>
            <div class="container pos-vertical-center">
                <div class="row">
                    @if ( Session::has('send') )
                    <div class="alert alert-danger margin-b-30">
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
                    <div class="col-md-6 col-lg-12">

                        <p class="lead">
                            <h2>Inicie Sesión</h2>
                            <br class="hidden-xs hidden-sm" />
                        </p>

                        <a class="btn btn--primary type--uppercase" href="loginAso">
                            <span class="btn__text">
                                Soy una Asociación
                            </span>
                        </a>
                        <!--Inicio Modal-->

                        <div class="modal-instance">
                            <a class="btn btn--primary type--uppercase modal-trigger" href="#">
                                <span class="btn__text">
                                    Soy un Usuario
                                </span>
                            </a>
                            <div class="modal-container ">
                                <div class="modal-content section-modal">
                                    <div class="container  ">
                                        <div class="">
                                            <div class="feature feature-1">
                                                <div class="feature__body boxed  text-center ">
                                                    <div class="modal-close modal-close-cross "></div>
                                                    <div class="text-block">
                                                        <h3>Accede a tu perfil</h3>
                                                        <p>
                                                            Bienvenido de nuevo. Entra con tu cuenta creada por tu asociación.
                                                        </p>
                                                    </div>
                                                    <form action="loginUser" method="post">
                                                       {!! csrf_field() !!}
                                                       <div class="row">
                                                        <div class="col-md-12">
                                                            <input type="text" name="email" placeholder="Email" />
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="password" name="password" placeholder="Contraseña" />
                                                        </div>
                                                        <div class="col-md-12">
                                                            <button class="btn btn--primary type--uppercase" type="submit">Iniciar Sesión</button>
                                                        </div>
                                                    </div>
                                                    <!--end of row-->
                                                </form>
                                            </div>
                                        </div>
                                        <!--end feature-->
                                    </div>
                                </div>
                                <!--end of container-->
                            </div>
                        </div>
                    </div>

                    <!--Fin Modal-->
                    <a class="btn btn--primary type--uppercase" href="loginVoluntario">
                        <span class="btn__text">
                            Soy un Voluntario
                        </span>
                    </a>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
    <section id="about" class="switchable parallax imagebg height-100">
        <div class="background-image-holder">
            <img alt="background" src="img/fondo2.png" />
        </div>
        <div class="container pos-vertical-center">
            <div class="row">
                <div class="col-md-7">
                </div>
                <div class="col-md-5 col-lg-4">
                    <div class="switchable__text">
                        <h2>Una nueva Perspectiva</h2>
                        <p class="lead">
                            Intentamos ayudar a que este mundo sea mejor, hemos creado una herramienta para ayudar a todo el mundo.
                        </p>
                        <hr class="short" />
                        <p>
                            De una manera sencilla pretendemos cambiar esta sociedad.
                        </p>
                    </div>
                </div>
            </div>
            <!--end of row-->

        </div>
        <!--end of container-->
    </section>

    <section class="text-center bg--dark" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                    <h2>Estamos en contacto</h2>
                    <p class="lead">
                        Trabajamos para mejorar, si tiene alguna duda o propuesta estaremos encantandos de escucharla.
                    </p>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
    <section class="text-center bg--dark">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-7">
                    <form class="text-left form-email row" data-success="Thanks for your enquiry, we'll be in touch shortly." data-error="Please fill in all fields correctly.">
                        <div class="col-md-6">
                            <label>Su nombre:</label>
                            <input type="text" name="Name" class="validate-required" />
                        </div>
                        <div class="col-md-6">
                            <label>Dirección Email:</label>
                            <input type="email" name="email" class="validate-required validate-email" />
                        </div>
                        <div class="col-md-12">
                            <label>Mensaje:</label>
                            <textarea rows="6" name="Message" class="validate-required"></textarea>
                        </div>
                        <div class="col-md-5 col-lg-4">
                            <button type="submit" class="btn btn--primary type--uppercase">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
    <footer class="text-center space--sm footer-5 bg--dark  ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-block">
                        <ul class="list-inline list--hover">
                            <li>
                                <a href="#">
                                    <span>Our Company</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span>Locations</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span>Products</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span>Work With Us</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <ul class="social-list list-inline list--hover">
                            <li>
                                <a href="#">
                                    <i class="socicon socicon-google icon icon--xs"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="socicon socicon-twitter icon icon--xs"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="socicon socicon-facebook icon icon--xs"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="socicon socicon-instagram icon icon--xs"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <span class="type--fine-print">&copy;
                            <span class="update-year"></span> Made by Rafael Yébenes Rivera</span>

                        </div>
                    </div>
                </div>
                <!--end of row-->
            </div>
            <!--Modal Usuarios  No se muestran los campos de texto-->

            <!--Fin Modal Usuarios-->
            <!--Fin Home Page -->

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


        </body>
        </html>


