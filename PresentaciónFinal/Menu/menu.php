<?php
include '../conexion.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="menuEstilos.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/dd0442ec5c.js" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles_menu.css">

    <title>Menu</title>
</head>

<body>
    <section class="formulario">
        <div id="Perfil">
            <h3 style="text-align: left;"><u>Bienvenido</u>!</h3>
            <h4>Coordinador</h4>
            <div class="icon">
                <h2><i class="fas fa-user-edit"></i></i></h2></i>
            </div>
            <div id="nombre"><span>
                    <?php
                    session_start();
                    if (isset($_SESSION['u_usuario'])) {
                        echo $_SESSION['u_usuario'];
                    }
                    ?>
                </span></div>
        </div>
        <hr>

        <div class="d-grid gap-2 col-6 mx-auto">
            <a href="Carga_Carrera/Carga_Carrera.php">
                <button style="width: 200px;" class="btn btn-primary" type="button"><i class="fas fa-book"></i> Alta de
                    Carrera</button>
            </a>

            <a href="Carga_Profesor/Carga_Profesor.php">
                <button style="width: 200px;" class="btn btn-primary" type="button"><i
                        class="fas fa-chalkboard-teacher"></i> Alta de Profesor</button>
            </a>
            <a href="Carga_Materia/Carga_Materia.php">
                <button style="width: 200px;" class="btn btn-primary" type="button"><i class="fas fa-book"></i> Alta de
                    Materia</button>
            </a>
            <a href="Carga_Alumno/Carga_Alumno.php">
                <button style="width: 200px;" class="btn btn-primary" type="button"><i class="fas fa-user-graduate"></i>
                    Alta de Alumno</button>
            </a>
            <hr style="width: 200px;">
            <a href="../administrador/index.php">
                <button style="width: 200px" class="btn btn-primary" type="button"><i class="fas fa-clipboard-list"></i>
                    Encuestas</button>
            </a>
            <!--<hr style="width: 200px;">

            <div class="dropdown">
                <a style="width: 200px;" class="btn btn-primary dropdown-toggle" href="#" role="button"
                    id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="far fa-edit"></i> Informes
                </a>

                <ul style="background-color: #24303c; width: 200px;" class="dropdown-menu"
                    aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="Graficos/Diagrama_Torta.html"
                            style="color: white;background-color: #24303c"><i class="fas fa-chart-pie"></i> Diagrama de
                            Torta</a></li>
                    <hr style="color: white;">
                    <li><a class="dropdown-item" href="Graficos/Diagrama_Barra.html"
                            style="color: white;background-color: #24303c"><i class="fas fa-chart-bar"></i> Diagrama de
                            Barras</a></li>
                    <hr style="color: white;">
                    <li><a class="dropdown-item" href="Graficos/Diagrama_Linea.html"
                            style="color: white;background-color: #24303c"><i class="fas fa-chart-line"></i> Diagrama de
                            Linea</a></li>
                    <hr style="color: white;">
                    <li><a class="dropdown-item" href="Graficos/Diagrama_Anillo.html"
                            style="color: white;background-color: #24303c"><i class="fas fa-circle-notch"></i> Diagrama
                            de Anillo</a></li>

                </ul>
            </div>-->
            <hr style="width: 200px;">

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fas fa-info-circle"></i> ¿Necesitas ayuda?
            </button>

            <!-- Modal -->
            <div class="modal fade" style="backdrop-filter: blur(2px);" id="exampleModal" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content" style="background:  #1C2833">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="color:white;">Botones</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="color: white">
                            <!--<p>Los <a href="#" role="button" class="btn btn-primary popover-test" title="Popover title" data-bs-content="Popover body content is set in this attribute.">botones</a>  </p>
              <hr>-->
                            <button style="width: 200px;" class="btn btn-primary" type="button"><i
                                    class="fas fa-book"></i> Alta de Carrera</button><br>
                            <p>Nos dirige al formulario de carreras, para poder registrarla en el sistema.</p>
                            <hr>
                            <button style="width: 200px;" class="btn btn-primary" type="button"><i
                                    class="fas fa-chalkboard-teacher"></i> Alta de Profesor</button><br>
                            <p>Nos dirige al formulario de profesor, para poder registrarlo en el sistema.</p>
                            <hr>
                            <button style="width: 200px;" class="btn btn-primary" type="button"><i
                                    class="fas fa-book"></i> Alta de Materia</button><br>
                            <p>Nos dirige al formulario de materia, para poder registrarlo en el sistema.</p>
                            <hr>
                            <button style="width: 200px;" class="btn btn-primary" type="button"><i
                                    class="fas fa-user-graduate"></i> Alta de Alumno</button><br>
                            <p>Nos dirige a el formulario de alumno, para poder registrarlo en el sistema.</p>
                            <hr>
                            <button style="width: 200px" class="btn btn-primary" type="button"><i
                                    class="fas fa-clipboard-list"></i> Encuestas</button>
                            <p>Nos permite Crear/Diseñar la encuesta para que el alumno pueda evaluar al docente.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Entiendo.</button>

                        </div>
                    </div>
                </div>
            </div>
            <hr style="width: 200px;">
            <!-- Button trigger modal -->
            <button type="button" class="float-right btn btn-danger" data-bs-toggle="modal"
                data-bs-target="#staticBackdrop">
                <i class="fas fa-sign-out-alt"></i> Salir de Sesión
            </button>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" style="backdrop-filter: blur(2px);" data-bs-backdrop="static"
                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content" style="background:  #1C2833">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">¿Seguro que desea salir?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-footer" style="justify-content: center;">
                            <a href="../index.php">
                                <button type="button" class="btn btn-primary">Si</button>
                            </a>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>


                        </div>
                    </div>
                </div>
            </div>


        </div>

    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
</body>

</html>