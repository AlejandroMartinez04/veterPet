<?php
include 'db.php';

// Capturamos los datos del formulario
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$nacimiento = $_POST['fecha_nacimiento'];
$raza = $_POST['raza'];
$peso = $_POST['peso'];
$unidad_peso = $_POST['unidad_peso'];  // Nueva variable para la unidad de peso
$editar = isset($_POST['editar']) ? $_POST['editar'] : 'no';

$conexiondb = conectardb();

if ($editar == "si") {
    $id_mascota = $_POST['id_mascota']; 
    $query = "UPDATE mascota SET codigo='$codigo', nombre='$nombre', fecha_nacimiento='$nacimiento', raza='$raza', peso='$peso', unidad_peso='$unidad_peso' WHERE id_mascota=$id_mascota";
} else {
    // Incluimos el campo peso y unidad de peso en la inserción
    $query = "INSERT INTO mascota (codigo, nombre, fecha_nacimiento, raza, peso, unidad_peso) 
              VALUES ('$codigo', '$nombre', '$nacimiento', '$raza', '$peso', '$unidad_peso')";
}

$respuesta = mysqli_query($conexiondb, $query);

if ($respuesta) {
    echo "<script>alert('Se registró la mascota');
          window.location.href='registromascota.html';</script>";
} else {
    echo "<script>alert('Error al registrar la mascota');
          window.location.href='registromascota.html';</script>";
}

mysqli_close($conexiondb);
?>
