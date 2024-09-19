<?php

include 'db.php';

$mascota = $_POST['id_mascota'];
$fecha = $_POST['fecha'];
$dosis = $_POST['dosis'];
$nombre = $_POST['nombre_veterinario'];
$descripcion = $_POST['descripcion'];
$editar = $_POST['editar'];

$conexiondb = conectardb();

if ($editar == "si") {
    $id_vacunacion = $_POST['id_vacunacion'];
    $query = "UPDATE vacuna SET id_mascota='" . $mascota . "', fecha='" . $fecha . "', dosis='" . $dosis . "', nombre_veterinario='" . $nombre . "', descripcion='" . $descripcion . "' WHERE id_vacunacion=" . $id_vacunacion;
} else {
    $query = "INSERT INTO vacuna (id_mascota, fecha, dosis, nombre_veterinario, descripcion) VALUES 
    ('$mascota', '$fecha', '$dosis', '$nombre', '$descripcion')";
}

$respuesta = mysqli_query($conexiondb, $query);

if ($respuesta) {
    echo ("<script>alert('Se registró el el cambio');
    window.location.href='registrar_vacuna.php'</script>");
} else {
    echo ("<script>alert('Error al registrar el cambio');
    window.location.href='registrar_vacuna.php'</script>");
}

mysqli_close($conexiondb);

?>
