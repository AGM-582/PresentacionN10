// Agregar nueva pregunta
function agregarAlumno() {
    // Obtener los valores de los inputs
    var nombre 	= $("#nombre").val();
    var dni  = $("#dni").val();
    var correo 	= $("#correo").val();
    var escuela = $("#escuela").val();
    var division = $("#division").val();
    var grado 	= $("#grado").val();
    var usuario = $("#usuario").val();
    var anio 	= $("#anio").val();
    //var sexo 	= $("#sexo").val();
    // Agregar encuesta con el método ajax POST
    $.post("ajax_alumno/registroAlumno.php",
        {
        	nombre : nombre,
            dni  : dni,
            correo 	: correo,
            escuela 	: escuela,
            division : division,
            grado : grado,
            usuario : usuario,
            anio : anio,
            //sexo : sexo,

        }//,
      //  window.print("AAAAAAAAAA")
        /*function (data, status) {
            // Cerrar el modal
            $("#modal_agregar").modal("hide");
            // Mostrar las encuestas nuevamente
            mostrarPreguntas(id_encuesta);
            // Limpiar campos del modal
            $("#titulo").val("");
        }*/
    ) ;
}