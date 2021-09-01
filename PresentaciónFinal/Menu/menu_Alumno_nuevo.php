<?php
include '../conexion.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/dd0442ec5c.js" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles_menu_Alumno.css">
    <title>Menu</title>
</head>

<body>
    <section class="formulario">
        <div id="Perfil">
            <h3 style="text-align: left;"><u>Bienvenido</u>!</h3>
            <h4>Alumno</h4>
            <div class="icon">
                <h2><i class="fas fa-user-graduate"></i></h2>
            </div>
            <div id="nombre"><span>(Nombre de Usuario)</span></div>
        </div>


        <!--<div class="d-grid gap-2 col-6 mx-auto">
      <a href="">
        <button style="width: 200px" class="btn btn-primary" type="button"><i class="fas fa-clipboard-list"></i> Responder Encuesta</button>
      </a>-->
        <br>
        <div class="card text-center">
            <div class="card-header" style="color: black;">
                Nombre de la encuesta/ número de la encuesta
            </div>
            <div class="card-body">
                <h5 class="card-title" style="color: black;">Pregunta Nº1</h5>
                <p class="card-text" style="color: black;">¿la pregunta ?</p>
                <a href="http://c2220248.ferozo.com" class="btn btn-primary">Responder</a>
            </div>
            <div class="card-footer text-muted">
                Hace 2 días
            </div>
        </div>

        <!-- Button trigger modal -->
        <!--
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fas fa-info-circle"></i> ¿Necesitas ayuda?
      </button>

     
      <div class="modal fade"  style="backdrop-filter: blur(2px);" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content" style="background:  #1C2833">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color:white;">Botones</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"  style="color: white">            
              <button style="width: 200px" class="btn btn-primary" type="button">Responder</button>
              <p>Nos permite responder la pregunta</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Entiendo.</button>
              
            </div>
          </div>
        </div>
      </div>-->

        <!-- Button trigger modal -->
        <!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        <i class="fas fa-sign-out-alt"></i>  Salir de Sesión
      </button>-->

        <!-- Modal -->
        <!-- <div class="modal fade"  style="backdrop-filter: blur(2px);" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content" style="background:  #1C2833">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">¿Seguro que desea salir?</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer" style="justify-content: center;">
              <a href="http://c2220248.ferozo.com" >
                <button  type="button" class="btn btn-primary">Si</button>
              </a>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
              
              
            </div>
          </div>
        </div>
      </div>  -->



        </div>

    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
</body>

</html>