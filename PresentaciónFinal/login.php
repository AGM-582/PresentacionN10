<?php
session_start();   // Necesitamos una sesion
if (isset($SESSION['u_usuario'])) {  // comparamos si existe
    header("Location: validacion.php"); // si existe, lo redireccionamos a sesion.php
} else {
    session_destroy();  // si no existe, destruimos sesion
}
?>﻿
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->


    <link href="Login_Estilos/loginn.css" rel="stylesheet">


    <title>Inicio de Sesión</title>

</head>

<body style="background-color:#1C2833;">
    <!--class="bg-dark"     bg-dark fondo de negro todo html-->

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>



    <section>
        <!--------------------------------------------------------------------->
        <div class="row g-0">
            <!--Seccion de imagenes-->
            <div class="col-lg-6 px-lg-5 pt-lg-2 pb-lg-3 p-2">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>

                    <div class="carousel-inner">
                        <div class="carousel-item">
                            <img src="Inicio_Sesion/imagen2.jpg" class="d-block w-100 " alt="...">
                        </div>
                        <div class="carousel-item active">
                            <img src="Inicio_Sesion/imagen3.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="Inicio_Sesion/imagen4.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <!-- ----------------------------------------------------------------------------- -->
            <!--Seccion de Logo-->
            <div class="col-lg-5">
                <div class="px-lg-5 pt-lg-2 pb-lg-3 p-2">
                    <img class="d-block w-100" src="Home_Page/normal20.png">
                </div>
                <!--Seccion de Bienvenidos-->
                <div class="px-lg-5 py-lg-0 p-3 ">
                    <h1 class="text-light">Bienvenidos</h1>
                </div>
                <!--Seccion del Formulario-->
                <!--////////////////////////-->
                <form class="form-signin" id="validacion" method="POST">
                    <span id="reauth-email" class="reauth-email"></span>
                    <label class="form-label text-light">Correo:</label>
                    <input type="text" id="inputEmail" class="form-control" placeholder="Ingrese su correo" required
                        autofocus name="id_usuario">
                    <br>
                    <label class="form-label text-light">Contraseña:</label>
                    <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required
                        name="clave">
                    <br><a href="contactanos.php" target="_blank"
                        class="form-check-label text-muted text-decoration-blue">¿Has Olvidado Tu Contraseña?</a>
                    <div id="remember" class="checkbox">
                    </div>
                    <div id="mensaje_error" class="mensaje_error">

                    </div>


                    <!--SECTOR DE LOS BOTONES RE LOCOS-->
                    <br>
                    <div class="align-center">
                        <div class="btn-group btn-group-sm" style="align-content:center;" role="group"
                            aria-label="button group">
                            <div>
                                <div class="py-lg-1 p-3">
                                    <a href="index.php"><button class="btn btn-warning btn-block"
                                            type="button">Regresar</button></a>
                                </div>
                            </div>
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            <div>
                                <div class="py-lg-1 p-3">
                                    <button class="btn btn-primary btn-block" id="ingresar">Ingresar</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <!--
              <input type="submit" name="" value="Ingresar">
            -->
            </form>

        </div>
        </div>

        <!-------------------------------------------------------------------------------------------->
        <section>
            <div class="px-lg-4 pt-lg-2 pb-lg-4 p-2">
                <!-- Pie de Pagina -->
                <footer class="bg-dark text-center text-white">

                    <div class="container p-4">
                        <!--Redes Sociales-->
                        <p>
                            Encuentranos En Nuestras Redes Sociales!
                        </p>
                        <section class="mb-4">


                            <!-- Twitter -->
                            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                                    class="fab fa-twitter"></i></a>



                            <!-- Linkedin -->
                            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                                    class="fab fa-linkedin-in"></i></a>

                        </section>

                        <section>
                            <form>
                                <div>
                                    <p>
                                        No somos una empresa, somos gente haciendo cosas.
                                    </p>
                                </div>
                            </form>

                        </section>
                    </div>
                    <!-- Copyright -->
                    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                        © 2021 Copyright:
                        <a class="text-white" href="www.google.com.ar">Mejorizar.com</a>
                    </div>
                </footer>
            </div>
        </section>

    </section>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kdam+Thmor&display=swap" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="Login_Estilos/mdb.css" rel="stylesheet">

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="Login_Estilos/Bootstrap_Popper.js">
    </script>

</body>

</html>


<script type="text/javascript">
//en teoria esto es jquery
$(document).ready(function() {
    $('#ingresar').click(function() {
        var datos = $('#validacion')
            .serialize(); //serialize trabaja con el id del form y los names de los inputs
        //alert(datos);
        //return false;
        $.ajax({
            type: "POST",
            url: "validacion.php",
            data: datos,
            success: function(r) {
                if (r == "1") {
                    window.location.replace("Menu/menu.php")
                } else if (r == "2") {
                    window.location.replace("usuario/index.php")
                } else {
                    $('#mensaje_error').html("Credenciales Incorrectas");
                }
            }
        });
        return false; //evita que se recargue y pierda los datos del form
    });

});
</script>