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


    <link href="loginn.css" rel="stylesheet">


    <title>Inicio de Sesión</title>

</head>

<body style="background-color:#1C2833;">
    <!--class="bg-dark"     bg-dark fondo de negro todo html-->
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
                    <img class="d-block w-100" src="Inicio_Sesion/Normal10.png">
                </div>
                <!--Seccion de Bienvenidos-->
                <div class="px-lg-5 py-lg-0 p-3 ">
                    <h1 class="text-light">Bienvenidos</h1>
                </div>
                <!--Seccion del Formulario-->
                <!--////////////////////////-->
                <form class="form-signin" action="validacion.php" method="POST">
                    <span id="reauth-email" class="reauth-email"></span>
                    <label class="form-label text-light">Numero de Identificacion:</label>
                    <input type="text" id="inputEmail" class="form-control" placeholder="Usuario" required autofocus
                        name="id_usuario">
                    <br>
                    <label class="form-label text-light">Contraseña:</label>
                    <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required
                        name="clave">
                    <br><a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank"
                        class="form-check-label text-muted text-decoration-blue">¿Has Olvidado Tu Contraseña?</a>
                    <div id="remember" class="checkbox">
                        <!--
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
                 -->
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
                                    <button class="btn btn-primary btn-block" type="submit">Ingresar</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <!--
              <input type="submit" name="" value="Ingresar">
            -->
            </form>
            <!-- /form -->
            <!--<form class="px-lg-5 py-lg-0 p-3 ">
            <div class="mb-1 ">
              <label class="form-label text-light" >D.N.I.:</label>
              <input name="Documento" placeholder="Ingrese su Documento" type="number" class="form-control" id="Documento">
              <div id="Documento" class="form-text">(Ingrese Su Documento Sin Puntos)</div>
            </div>

            <div class="mb-4 ">
              <label  class="form-label text-light">Contraseña:</label>
              <input type="password" placeholder="Ingrese su Contraseña" class="form-control" id="Contraseña" name="Contraseña">
              <a href="https://www.google.com/?hl=es" target="_blank" class="form-check-label text-muted text-decoration-none">¿Has Olvidado Tu Contraseña?</a>
            </div>

            <button type="submit" class="btn btn-primary w-100 ">Iniciar Sesión</button>
          </form>-->
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
                            <!-- Facebook -->
                            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                                    class="fab fa-facebook-f"></i></a>

                            <!-- Twitter -->
                            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                                    class="fab fa-twitter"></i></a>

                            <!-- Google -->
                            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                                    class="fab fa-google"></i></a>

                            <!-- Instagram -->
                            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                                    class="fab fa-instagram"></i></a>

                            <!-- Linkedin -->
                            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                                    class="fab fa-linkedin-in"></i></a>

                            <!-- Github -->
                            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                                    class="fab fa-github"></i></a>
                        </section>

                        <section>
                            <form>

                                <div class="row d-flex justify-content-center">
                                    <div class="col-auto">
                                        <p class="pt-2">
                                            <strong>Suscribete a nuestra Compañía</strong>
                                        </p>
                                    </div>

                                    <div class="col-md-5 col-12">
                                        <div class="form-outline form-white mb-4">
                                            <input type="email" id="Correo" class="form-control" />
                                            <label class="form-label">Correo Electrónico</label>
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-outline-light mb-4">
                                            Suscribite
                                        </button>
                                    </div>

                                </div>
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
    <!-- Bootstrap core CSS -->
    <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">-->
    <!-- Material Design Bootstrap -->
    <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">-->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous">
    </script>-->

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    -->
</body>

</html>