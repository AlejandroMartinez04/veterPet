<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Medicamentos</title>
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
    $query_v = "SELECT * FROM mascota ORDER BY nombre ASC";
    $resultado_v = mysqli_query($conexiondb, $query_v);
    mysqli_close($conexiondb);
    ?>

    <div class="col-sm-4 offset-sm-4">
        <form class="" role="form" action="guardar_vacunacion.php" method="post">
            <div class="">
                <h3>REGISTRAR MEDICAMENTO</h3>
                <P>MASCOTA<select class="form-control" name="id_mascota" class="" id="inputGroupSelect01"></P>
                <?php
                while ($vacunacion = mysqli_fetch_assoc($resultado_v)) {
                    echo "<option value='" . $vacunacion['id_mascota'] . "'>" . $vacunacion['nombre'] . "</option>";
                }
                ?>
                </select>
                </th>
                <p>FECHA: <input class="form-control" type="date" name="fecha" size="50"></p>
                <select class="form-control" name="dosis">
                    <option value="Primera Dosis Vacuna contra la Rabia">Primera Dosis Vacuna contra la Rabia</option>
                    <option value="Parvovirus" selected>Parvovirus</option>
                    <option value="Meloxicam (Metacam)">Meloxicam (Metacam)</option>
                    <option value="Prednisolona">Prednisolona</option>
                    <option value="Dosis contra Hepatitis">Dosis contra Hepatitis</option>
                    <option value="Dosis Distemper">Dosis Distemper</option>
                </select>

                <p>NOMBRE DEL VETERINARIO: <input class="form-control" type="text" name="nombre_veterinario" size="50"></p>

                <!-- Campo agregado de descripción -->
                <p>DESCRIPCIÓN: <textarea class="form-control" name="descripcion" rows="4" cols="50"></textarea></p>

                <input class="btn btn-outline-primary" type="submit" value="Enviar">
            </div>
        </form>
    </div>

    <link rel="stylesheet" href="./css/index.css">
</body>

</html>
