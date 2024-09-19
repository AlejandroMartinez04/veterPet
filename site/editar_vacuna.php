<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Medicamentos</title>
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
$id_vacuna = $_GET['id_vacunacion'];
$query = "SELECT * FROM vacuna WHERE id_vacunacion=" . $id_vacuna;
$respuesta = mysqli_query($conexiondb, $query);
$persona = mysqli_fetch_row($respuesta);
mysqli_close($conexiondb);
?>

<div class="container mt-5">
    <h1 class="text-center">Editar Medicamento</h1>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="guardar_vacunacion.php" method="post" class="mt-4">
                <div class="form-group">
                    <label for="fecha"><b>FECHA:</b></label>
                    <input type="text" class="form-control" name="fecha" id="fecha" value='<?php echo $persona[1]; ?>'>
                </div>

                <div class="form-group">
                    <label for="dosis"><b>Dosis:</b></label>
                    <input type="text" class="form-control" name="dosis" id="dosis" value='<?php echo $persona[2]; ?>'>
                </div>

                <div class="form-group">
                    <label for="id_mascota"><b>Mascota:</b></label>
                    <input type="text" class="form-control" name="id_mascota" id="id_mascota" value='<?php echo $persona[3]; ?>'>
                </div>

                <div class="form-group">
                    <label for="nombre_veterinario"><b>Veterinario:</b></label>
                    <input type="text" class="form-control" name="nombre_veterinario" id="nombre_veterinario" value='<?php echo $persona[4]; ?>'>
                </div>

                <div class="form-group">
                    <label for="descripcion"><b>Descripción:</b></label>
                    <textarea class="form-control" name="descripcion" id="descripcion"><?php echo $persona[5]; ?></textarea>
                </div>

                <input type="hidden" name="id_vacunacion" value='<?php echo $persona[0] ?>' readonly>
                <input type="hidden" name="editar" value='si' readonly>
                <button type="submit" class="btn btn-success btn-block">GUARDAR</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
