function agregarDatos(titulo, carrera, materia, descripcion, fecha_final,
    hidden_id_usuario) {
    cadena = "titulo=" + titulo +
        "&carrera=" + carrera +
        "&materia=" + materia +
        "&descripcion=" + descripcion +
        "&fecha_final=" + fecha_final +
        "&hidden_id_usuario=" + hidden_id_usuario;

    
    /*
    return false;*/
    $.ajax({
        type: "POST",
        url: "ajax_encuesta/agregarEncuesta.php",
        data: cadena,
        success: function(r) {
            if (r == 1) {
                alert("Agregado con exito");
            } else {
                alert("Error al cargar");
            }
        }
    });
} 