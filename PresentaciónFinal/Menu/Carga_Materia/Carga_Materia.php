<?php
include '../../conexion.php';
?>


<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="styles_Materia.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <div class="container">
        <div class="title">Registro de la Materia</div>
        <div class="content">
            <form id="cargaMateria" method="POST">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Nombre de la Materia</span>
                        <input style="background:#E5E7E9;" name="nombre" type="text"
                            placeholder="Ingrese su Nombre de la materia" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Carrera:</span>
                        <?php
                        $query = $con->query("SELECT * FROM carrera");
                        ?>
                        <!--SELECT DE LAS CARRERAS CARGADAS EN BD-->
                        <select name="carrera" id="carrera">
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
                    <!---SELECT ANIOS DEPENDIENDO DE CARRERA------------------------------------------------------->
                    <div class="input-box" id="selectAnio">
                        <span class="details">Año</span>
                    </div>


                    <!---------------------------------------------------------------------------------------------->
                    <div class="input-box">
                        <span class="details">Profesor:</span>
                        <?php
                        $query = $con->query("SELECT * FROM profesor");
                        ?>
                        <!--SELECT DE LOS PROFESORES CARGADOS EN BD-->
                        <select name="profesor">
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
                </div>
                <div class="button">
                    <button id="btnGuardar">Agregar Materia</button>
                </div>
        </div>
        </form>

        <div>

            <form action="subirMaterias.php" method="POST" enctype="multipart/form-data">

                <table>
                    <tr>
                        <td class="letra" width="250"><strong>Subir archivo de materias completo:</strong></td>
                        <td><input type="file" name="foto" id="foto"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" name="enviar" value="SUBIR" class="boton">
                        </td>
                    </tr>
                </table>

            </form>
        </div>
        <br>
        
        <div class="boton">
            <a href="../menu.php"><button style="width: 110px;padding: 5px;border-color: #000000;border-radius: 5px;"
                    class="boton"><i class="fas fa-arrow-left"></i> Volver Atrás</button></a>
        </div>

    </div>

</body>

</html>

<!------script select -------------------------------------------------------------------------------->
<script type="text/javascript">
$(document).ready(function() {
    $('#carrera').val(1);
    recargarLista();
    $('#carrera').change(function() {
        recargarLista();
    });
})
</script>
<script type="text/javascript">
function recargarLista() {
    $.ajax({
        type: "POST",
        url: "cargaSelect.php",
        data: "carrera=" + $('#carrera').val(),
        success: function(r) {
            $('#selectAnio').html(r);
        }
    });
}
</script>

<!------------------------------------------------------------------------------------------------------>

<script type="text/javascript">
//en teoria esto es jquery
$(document).ready(function() {
    $('#btnGuardar').click(function() {
        var datos = $('#cargaMateria')
            .serialize(); //serialize trabaja con el id del form y los names de los inputs
        //alert(datos);
        //return false;
        $.ajax({
            type: "POST",
            url: "registroMateria.php",
            data: datos,
            success: function(r) {
                if (r == 1) {
                    alert("Agregado con exito");
                } else {
                    alert("Error al cargar");
                }
            }
        });
        //return false; //evita que se recargue y pierda los datos del form
    });

});
</script>