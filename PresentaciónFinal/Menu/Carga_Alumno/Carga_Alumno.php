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
                        <input style="background:#E5E7E9;" type="text" name="nombre" id="nombre" placeholder="Ingrese su Nombre Completo">
                    </div>
                    <div class="input-box">
                        <span class="details">D.N.I.</span>
                        <input style="background:#E5E7E9;" type="number" name="dni" id="dni" placeholder="Ingrese su Documento">
                    </div>
                    <!--<div class="input-box">
                        <span class="details">Correo</span>
                        <input style="background:#E5E7E9;" type="email" name="correo" id="correo"
                            placeholder="Ingrese su Correo" required>
                    </div>
                    <div class="input-box">
                <span class="details">Número de Celular</span>
                <input style="background:#E5E7E9;" type="number" placeholder="Ingrese Número de Celular" required>
              </div>-->
                    <!----------------------------------------------------------------------------------------------------------------->
                    <!--SELECT DE LAS CARRERAS CARGADAS EN BD-->
                    <div class="input-box">
                        <span class="details">Carrera:</span>
                        <?php
                        $query = $con->query("SELECT * FROM carrera");
                        ?>

                        <select name="carrera" style="background:#E5E7E9;">
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
                    <div class="input-box">
                        <span class="details">Correo</span>
                        <input style="background:#E5E7E9;" type="text" name="correo" id="correo" placeholder="Ingrese el E-Mail">
                    </div>
                </div>
                <div class="button">
                    <button id="btnGuardar">Agregar Alumno</button>
                </div>
        </div>

        </form>
        <div class="boton">

            <a href="../menu.php"><button style="width: 110px;padding: 5px;border-color: #000000;border-radius: 5px;" class="boton"><i class="fas fa-arrow-left"></i> Volver Atrás</button></a>
            <a href="materiasAlumno.php?"><button type="submit" style="width: 110px;padding: 5px;float: right;border-color: #000000;border-radius: 5px;" class="boton">Inscripcion Materias</button></a>

        </div>
    </div>
    </div>

</body>

</html>


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