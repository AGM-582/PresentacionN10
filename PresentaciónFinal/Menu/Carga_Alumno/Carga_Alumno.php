<?php
include '../../conexion.php';
?>


<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="stylos_Alumno.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

    <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <!--<script src="../js/alumno.js"></script>-->
    <div class="container">

        <div class="title">Registro del Alumno</div>
        <div class="content">
            <form id="cargaAlumno" method="POST">
                <div class="user-details">

                    <div class="input-box">
                        <span class="details">Nombre Completo</span>
                        <input style="background:#E5E7E9;" type="text" name="nombre" id="nombre"
                            placeholder="Ingrese su Nombre Completo">
                    </div>
                    <div class="input-box">
                        <span class="details">D.N.I.</span>
                        <input style="background:#E5E7E9;" type="number" name="dni" id="dni"
                            placeholder="Ingrese su Documento">
                    </div>

                    <div class="input-box">
                        <span class="details">Correo</span>
                        <input style="background:#E5E7E9;" type="text" name="correo" id="correo"
                            placeholder="Ingrese el E-Mail">
                    </div>

                    <!-----------------SELECT DE LAS CARRERAS CARGADAS EN BD------------------->
                    <div class="input-box">
                        <span class="details">Carrera</span>
                        <?php
                        $query = $con->query("SELECT * FROM carrera");
                        ?>

                        <select name="carrera" id="carrera" style="background:#E5E7E9;">
                            <option value="0">Seleccione:</option>
                            <?php
                            while ($valores = mysqli_fetch_array($query)) {
                            ?>
                            <?php
                                echo '<option value="' . $valores['id'] . '">' . $valores['nombre'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <!------------------------------MATERIAS------------------------------------->
                    <span>
                        <div class="title">Materias:</div>
                        <br>
                        (Este campo se autocompletará cuando seleccione la carrera a cargar)
                    </span>
                    <br>
                    <div class="container col-md-12">
                        <!------En este div se insertan los checkbox traidos con el script-->
                        <div class="radio" id="checkMateria">
                        </div>
                    </div>


                </div>
                <div class="button">
                    <button id="btnGuardar" name="enviar">Agregar Alumno</button>
                </div>

            </form>
        </div>

        <div class="boton">
            <a href="../menu.php"><button style="width: 110px;padding: 5px;border-color: #000000;border-radius: 5px;"
                    class="boton"><i class="fas fa-arrow-left"></i> Volver Atrás</button></a>
        </div>


</body>

</html>


<!------script select para carrera y materias------------------------------------------------------------------------>

<script type="text/javascript">
$(document).ready(function() {
    /*El select se completa con la opcion 0 de forma predeterminada */
    $('#carrera').val(0);
    /*si la opcion del select cambia, el fondo azul pasa a tener una altura de 0 y se llama a la funcion recargarLista (lo del fondo lo hice para que cubra toda la pantalla por mas que cambie el tamaño)*/
    $('#carrera').change(function() {
        $("body").css("height", "0");
        recargarLista();
        /*si la opcion vuelve a ser 0, el fondo vuelve a su estado original (porque sino el formulario no se acomoda al centro de la pantalla) */
        if ($('#carrera').val() == 0) {
            $("body").css("height", "100vh");
        }

    });

})
</script>
<script type="text/javascript">
function recargarLista() {
    $.ajax({
        type: "POST",
        url: "materiasAlumno.php",
        data: "carrera=" + $('#carrera').val(),
        success: function(r) {
            $('#checkMateria').html(r);
        }
    });
}
</script>


<script type="text/javascript">
//en teoria esto es jquery
$(document).ready(function() {
    $('#btnGuardar').click(function() {
        var datos = $('#cargaAlumno')
            .serialize(); //serialize trabaja con el id del form y los names de los inputs
        /*alert(datos);
        return false;*/
        $.ajax({
            type: "POST",
            url: "registroAlumno.php",
            data: datos,
            success: function(r) {
                if (r == 1) {
                    alert("Error al cargar");

                } else {
                    alert("Agregado con exito");
                }
            }
        });
        //return false; //evita que se recargue y pierda los datos del form
    });

});
</script>