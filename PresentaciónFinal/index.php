<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="indexEstilos.css" rel="stylesheet">
    <link rel="stylesheet" href="Home_page/stylos_Home.css">
    <script src="https://kit.fontawesome.com/dd0442ec5c.js" crossorigin="anonymous"></script>
    <title>Sistema E.E.</title>
</head>

<body style="background-color:#1C2833;">

    <!--------------------------------------------------------------------NavBar----------------------------------------------------->
    <header>
        <img class="logo" src="Home_page\Normal20.png">
        <input type="checkbox" id="check">
        <label for="check" class="mostrar_menu">
            &#8801
        </label>
        <nav class="menu">
            <a href="Sobre_Nosotros/Sobre_Nosotros.php">Sobre Nosotros</a>
            <!--<a href="Sistema_ED/Carga_Alumno/Carga_Alumno.html">Carga Alumno</a>
            <a href="Sistema_ED/Carga_Profesor/Carga_Profesor.html">Carga Profesor</a>
            <a href="Sistema_ED/Carga_Materia/Carga_Materia.html">Carga Materia</a>-->
            <a href="contactanos.php">Contáctanos</a>
            <!--<a href="Sistema_ED/administrador/mostrar_preguntas.php">ABM_Preguntas</a>-->
            <a href="login.php"><button type="submit" class="btn btn-primary">Iniciar Sesión</button></a>

            <label for="check" class="esconder_menu">
                &#215
            </label>
        </nav>
    </header>
    <!--------------------------------------------------------------------/NavBar----------------------------------------------------->

    <!--------------------------------------------------------------------Banner----------------------------------------------------->

    <section id="Banner">
        <div class="Contenido_Banner">
            <h3>Sistema de Encuestas y Estadísticas</h3>

        </div>
    </section>
    <!--------------------------------------------------------------------/Banner----------------------------------------------------->

    <!--------------------------------------------------------------------Iconos----------------------------------------------------->
    <section id="iconos">
        <div class="Contenido_iconos">
            <div>
                <i class="fas fa-shipping-fast fa-2x"></i>
                <h6>Rápido</h6>
                <!--<p>Más rápido que patada de chancho.</p>-->
            </div>
            <div>
                <i class="fas fa-universal-access fa-2x"></i>
                <h6>Accesible</h6>
                <!--<p>Stephen Hawking Approves This.</p>-->
            </div>
            <div id="Responsive">
                <i class="fas fa-desktop fa-2x"></i>
                <i class="fas fa-mobile fa-2x"></i>
                <h6>Responsive</h6>
                <!--<p>Disponible en todas las plataformas</p>-->
            </div>

        </div>
    </section>
    <!--------------------------------------------------------------------/Iconos----------------------------------------------------->

    <!--------------------------------------------------------------------Footer----------------------------------------------------->
    <section>
        <div class="px-lg-4 pt-lg-2 pb-lg-4 p-2">
            <!-- Pie de Pagina -->
            <footer class="bg-dark text-center text-white">

                <div class="container p-4">
                    <!--Redes Sociales-->
                    <p>
                        Nuestras Redes Sociales!
                    </p>
                    <section class="mb-4">


                        <!-- Twitter -->
                        <a class="btn btn-outline-light btn-floating m-1" target="_blank" href="https://www.Twitter.com"
                            role="button"><i class="fab fa-twitter"></i></a>




                        <!-- Linkedin -->
                        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                                class="fab fa-linkedin-in"></i></a>

                        <div>
                            <p>
                                No somos una empresa, somos gente haciendo cosas.
                            </p>
                        </div>
                    </section>


                </div>
                <!-- Copyright -->
                <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                    © 2021 Copyright:
                    <a class="text-white" href="www.google.com.ar">MejorizarServicios.com</a>
                </div>

            </footer>
        </div>
    </section>
    <!--------------------------------------------------------------------/Footer----------------------------------------------------->
</body>

</html>