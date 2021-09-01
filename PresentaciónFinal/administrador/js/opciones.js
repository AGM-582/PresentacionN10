// Cargar modal de boostrap para agregar nueva opción
// Usaremos el "shorter method"
$(function() {
	$("#boton_agregar").click(function() {
		$("#modal_agregar").modal("show");
	});
});


var id_pregunta = $("#id_pregunta").val();

// Mostrar encuestas
function mostrarOpciones(id_pregunta) {
    // Mostrar encuestas con el método ajax POST
    $.post("ajax_opcion/mostrarOpciones.php", {
    	id_pregunta : id_pregunta
    }, function(data, status) {
        $("#tabla_opciones").html(data);
    });
}

// Mostrar encuestas al cargar la página
$(function() {
    mostrarOpciones(id_pregunta); // Llamando a la función
});

// Agregar nueva opción
function agregarOpcion() {
    // Obtener los valores de los inputs
    var id_pregunta         = $("#id_pregunta").val();
    var valor              = $("#valor").val();
    // Agregar opción con el método ajax POST
    $.post("ajax_opcion/agregarOpcion.php",
        {
            id_pregunta         : id_pregunta,
            valor              : valor
        },
        function (data, status) {
            // Cerrar el modal
            $("#modal_agregar").modal("hide");
            // Mostrar las encuestas nuevamente
            mostrarOpciones(id_pregunta);
            // Limpiar campos del modal
            $("#valor").val("");
        }
    ) ;
}

// Eliminar Opción
function eliminarOpcion(id_opcion) {
    var conf = confirm("Estas seguro de eliminar la Opción");
    if (conf == true) {
        // Eliminar pregunta con el método ajax POST
        $.post("ajax_opcion/eliminarOpcion.php", {id_opcion: id_opcion}, function (data, status) {
            // Volver a cargar la tabla de encuestas
            mostrarOpciones(id_pregunta);
        });
    }
}


function obtenerDetallesOpcion(id_opcion) {
    // Agregar id_opcion al campo oculto
    $("#hidden_id_opcion").val(id_opcion);

    $.post("ajax_opcion/mostrarDetallesOpcion.php", {id_opcion: id_opcion}, function (data, status) {
        // PARSE json data
        var opcion = JSON.parse(data);
        // Asignamos valores de la opción al modal
        $("#modificar_valor").val(opcion.valor);
    });
    // Abrir modal de modificar
    $("#modal_modificar").modal("show");
}

// Funcion modificarDetallesOpcion del modal modificar opción
function modificarDetallesOpcion() {
    // Obtener valores
    var valor      = $("#modificar_valor").val();
    var id_opcion = $("#hidden_id_opcion").val();

    // Modificar detalles consultando al servidor usando ajax
    $.post("ajax_opcion/modificarDetallesOpcion.php",
        {
            id_opcion : id_opcion,
            valor      : valor
        },
        function (data, status) {
            // Ocultar el modal utilizando jQuery
            $("#modal_modificar").modal("hide");
            // Volver a cargar la tabla opciones         
            var id_pregunta = $("#id_pregunta").val();
            mostrarOpciones(id_pregunta);
        }
    ) ;
}