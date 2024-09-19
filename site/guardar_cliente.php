<?php

include 'db.php';

$cedula = $_POST['cedula'];
$nombre = $_POST['Nombre_cliente'];
$apellido = $_POST['apellido_cliente'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$editar = $_POST['editar'];

$conexiondb = conectardb();

if ($editar == "si") {
    $id_cliente = $_POST['id_cliente'];
    $query = "UPDATE cliente SET cedula='$cedula', nombre_cliente='$nombre', apellido_cliente='$apellido', telefono='$telefono', direccion='$direccion' WHERE id_cliente=$id_cliente";
} else {
    $query = "INSERT INTO cliente (cedula, nombre_cliente, apellido_cliente, telefono, direccion) VALUES ('$cedula', '$nombre', '$apellido', '$telefono', '$direccion')";
}

$respuesta = mysqli_query($conexiondb, $query);

if ($respuesta) {
    // Mostrar el mensaje de éxito y redirigir a registroCliente.php
    echo "<script>
            alert('Se registró el cliente correctamente.');
            window.location.href = 'registroCliente.php';
          </script>";
} else {
    // Mostrar error en caso de fallo en la consulta SQL
    echo "<div class='alert alert-danger'>Error: " . mysqli_error($conexiondb) . "</div>";
}

mysqli_close($conexiondb);
?>