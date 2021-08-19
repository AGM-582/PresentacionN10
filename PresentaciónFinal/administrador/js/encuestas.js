// Cargar modal de boostrap para agregar nueva encuesta
// Usaremos el "shorter method"
$(function() {
	$("#boton_agregar").click(function() {
		$("#modal_agregar").modal("show");
	});
});

// Mostrar encuestas
function mostrarEncuestas() {
    // Mostrar encuestas con el método ajax POST
    $.post("ajax_encuesta/mostrarEncuestas.php", {}, function(data, status) {
        $("#tabla_encuestas").html(data);
    });
}

// Mostrar encuestas al cargar la página
$(function() {
    mostrarEncuestas(); // Llamando a la función
});


// Agregar nueva encuesta
function agregarEncuesta() {
    // Obtener los valores de los inputs
    var id_usuario  = $("#hidden_id_usuario").val();
    var titulo      = $("#titulo").val();
    var carrera     = $("#carrera").val();
    var materia     = $("#materia").val("");
    var descripcion = $("#descripcion").val();
    var fecha_final = $("#fecha_final").val();
    // Agregar encuesta con el método ajax POST
    $.post("ajax_encuesta/agregarEncuesta4.php",
        {
            titulo      : titulo,
            carrera     : carrera,
            materia     : materia,
            descripcion : descripcion,
            fecha_final : fecha_final,
            id_usuario  : id_usuario
        },
        function (data, status) {
            // Cerrar el modal
            $("#modal_agregar").modal("hide");
            // Mostrar las encuestas nuevamente
            mostrarEncuestas();
            // Limpiar campos del modal
            $("#titulo").val("");
            $("#carrera").val("");
            $("#materia").val("");
            $("#descripcion").val("");
            $("#fecha_final").val("");
        }
    ) ;
}

// Eliminar encuesta
function eliminarEncuesta(id_encuesta) {
    var conf = confirm("Estas seguro de eliminar la Encuesta");
    if (conf == true) {
        // Eliminar encuesta con el método ajax POST
        $.post("ajax_encuesta/eliminarEncuesta.php", {id_encuesta: id_encuesta}, function (data, status) {
            // Volver a cargar la tabla de encuestas
            mostrarEncuestas();
        });
    }
}

// Publicar encuesta
function publicarEncuesta(id_encuesta) {
    var conf = confirm("Estas seguro de publicar la Encuesta");
    if (conf == true) {
        // Publicar encuesta con el método ajax POST
        $.post("ajax_encuesta/publicarEncuesta.php", {id_encuesta: id_encuesta}, function (data, status) {
            // Volver a cargar la tabla de encuestas
            mostrarEncuestas();
        });
    }
}

// Finalizar encuesta
function finalizarEncuesta(id_encuesta) {
    var conf = confirm("Estas seguro de finalizar la Encuesta");
    if (conf == true) {
        // Publicar encuesta con el método ajax POST
        $.post("ajax_encuesta/finalizarEncuesta.php", {id_encuesta: id_encuesta}, function (data, status) {
            // Volver a cargar la tabla de encuestas
            mostrarEncuestas();
        });
    }
}

function obtenerDetallesEncuesta(id_encuesta) {
    // Agregar id_encuesta al campo oculto
    $("#hidden_id_encuesta").val(id_encuesta);

    $.post("ajax_encuesta/mostrarDetallesEncuesta.php", {id_encuesta: id_encuesta}, function (data, status) {
        // PARSE json data
        var encuesta = JSON.parse(data);
        // Asignamos valores de la encuesta al modal
        $("#modificar_titulo").val(encuesta.titulo);
        $("#modificar_descripcion").val(encuesta.descripcion);
        $("#modificar_fecha_final").val(encuesta.fecha_final);
    });
    // Abrir modal de modificar
    $("#modal_modificar").modal("show");
}

// Funcion modificarDetallesEncuesta del modal modificar producto
function modificarDetallesEncuesta() {
    // Obtener valores
    var titulo      = $("#modificar_titulo").val();
    var id_encuesta = $("#hidden_id_encuesta").val();
    var descripcion = $("#modificar_descripcion").val();
    var fecha_final = $("#modificar_fecha_final").val();

    // Modificar detalles consultando al servidor usando ajax
    $.post("ajax_encuesta/modificarDetallesEncuesta.php",
        {
            id_encuesta : id_encuesta,
            titulo      : titulo,
            descripcion : descripcion,
            fecha_final : fecha_final
        },
        function (data, status) {
            // Ocultar el modal utilizando jQuery
            $("#modal_modificar").modal("hide");
            // Volver a cargar la tabla productos
            mostrarEncuestas();
        }
    ) ;
}