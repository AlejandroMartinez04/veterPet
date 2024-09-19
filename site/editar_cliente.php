<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Persona</title>
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
</head>

<body>

<header>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-6">
                <!-- Espacio para más elementos si se requiere -->
            </div>
            <div class="col-md-6 text-end">
                <a href="index.html" class="btn btn-secondary">
                    <i class="fas fa-home"></i> Inicio
                </a>
            </div>
        </div>
    </div>
</header>

<?php
include 'db.php';
$conexiondb = conectardb();
$id_cliente = $_GET['id_cliente'];
$query = "SELECT * FROM cliente WHERE id_cliente=" . $id_cliente;
$respuesta = mysqli_query($conexiondb, $query);
$persona = mysqli_fetch_row($respuesta);
mysqli_close($conexiondb);
?>

<div class="container mt-5">
    <h1 class="text-center">Editar Persona</h1>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="guardar_cliente.php" method="post" class="mt-4">
                <div class="form-group">
                    <label for="cedula"><b>CEDULA:</b></label>
                    <input type="text" class="form-control" name="cedula" id="cedula" value='<?php echo $persona[1]; ?>'>
                </div>

                <div class="form-group">
                    <label for="Nombre_cliente"><b>NOMBRE:</b></label>
                    <input type="text" class="form-control" name="Nombre_cliente" id="Nombre_cliente" value='<?php echo $persona[2]; ?>'>
                </div>

                <div class="form-group">
                    <label for="apellido_cliente"><b>APELLIDO:</b></label>
                    <input type="text" class="form-control" name="apellido_cliente" id="apellido_cliente" value='<?php echo $persona[3]; ?>'>
                </div>

                <div class="form-group">
                    <label for="telefono"><b>TELEFONO:</b></label>
                    <input type="text" class="form-control" name="telefono" id="telefono" value='<?php echo $persona[4]; ?>'>
                </div>

                <div class="form-group">
                    <label for="direccion"><b>DIRECCIÓN:</b></label>
                    <input type="text" class="form-control" name="direccion" id="direccion" value='<?php echo $persona[5]; ?>'>
                </div>

                <input type="hidden" name="id_cliente" value='<?php echo $persona[0]; ?>' readonly>
                <input type="hidden" name="editar" value='si' readonly>

                <button type="submit" class="btn btn-success btn-block">GUARDAR</button>
            </form>
        </div>
    </div>
</div>

</body>

</html>
