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