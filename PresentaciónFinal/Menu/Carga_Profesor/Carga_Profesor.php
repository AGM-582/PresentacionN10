<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="styles_Profesor.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <div class="container">
        <div class="title">Registro del Profesor</div>
        <div class="content">
            <form id="cargaProfesor" method="POST">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Nombre Completo</span>
                        <input style="background:#E5E7E9;" type="text" name="nombre"
                            placeholder="Ingrese su Nombre Completo" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Legajo</span>
                        <input style="background:#E5E7E9;" type="text" name="legajo" placeholder="Ingrese su Legajo"
                            required>
                    </div>

                    <div class="input-box">
                        <span class="details">Correo</span>
                        <input style="background:#E5E7E9;" type="email" name="correo" placeholder="Ingrese su Correo"
                            required>
                    </div>
                    <div class="input-box">
                        <span class="details">Número de Celular</span>
                        <input style="background:#E5E7E9;" type="text" name="telefono"
                            placeholder="Ingrese Número de Celular" required>
                    </div>

                </div>
                <div class="button">
                    <button id="btnGuardar">Agregar Profesor</button>
                </div>
        </div>
        </form>

        <div>

            <form action="subirProfesores.php" method="POST" enctype="multipart/form-data">

                <table>
                    <tr>
                        <td class="letra" width="250"><strong>Subir archivo de profesores completo:</strong></td>
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



<script type="text/javascript">
//en teoria esto es jquery
$(document).ready(function() {
    $('#btnGuardar').click(function() {
        var datos = $('#cargaProfesor')
            .serialize(); //serialize trabaja con el id del form y los names de los inputs
        //alert(datos);
        //return false;
        $.ajax({
            type: "POST",
            url: "registroProfesor.php",
            data: datos,
            success: function(r) {
                if (r == 0) {
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