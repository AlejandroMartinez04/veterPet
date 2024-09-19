<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Mascota</title>
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
$id_mascota = $_GET['id_mascota'];
$query = "SELECT * FROM mascota WHERE id_mascota=" . $id_mascota;
$respuesta = mysqli_query($conexiondb, $query);
$persona = mysqli_fetch_row($respuesta);
mysqli_close($conexiondb);
?>

<div class="container mt-5">
    <h1 class="text-center">Editar Mascota</h1>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="guardar_mascota.php" method="post" class="mt-4">
                <div class="form-group">
                    <label for="codigo"><b>CODIGO:</b></label>
                    <input type="text" class="form-control" name="codigo" id="codigo" value='<?php echo $persona[1]; ?>'>
                </div>

                <div class="form-group">
                    <label for="nombre"><b>NOMBRE:</b></label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value='<?php echo $persona[2]; ?>'>
                </div>

                <div class="form-group">
                    <label for="fecha_nacimiento"><b>FECHA DE NACIMIENTO:</b></label>
                    <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value='<?php echo $persona[3]; ?>'>
                </div>

                <div class="form-group">
                    <label for="raza"><b>RAZA:</b></label>
                    <input type="text" class="form-control" name="raza" id="raza" value='<?php echo $persona[4]; ?>'>
                </div>

                <input type="hidden" name="id_mascota" value='<?php echo $persona[0] ?>' readonly>
                <input type="hidden" name="editar" value='si' readonly>

                <button type="submit" class="btn btn-success btn-block">GUARDAR</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
