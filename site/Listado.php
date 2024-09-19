<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Mascotas</title>
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="./css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">

</head>

<body>
    <header>
        <div class="container">
            <div class="row mt-3">
                <div class="col-md-6">
                    <button onclick="window.print()" class="btn btn-primary">
                        <i class="fas fa-print"></i> Imprimir
                    </button>
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

    // Modificamos la consulta para incluir el campo de peso
    $query_m = "SELECT *, (CASE WHEN unidad_peso = 'g' THEN peso * 1000 ELSE peso END) AS peso_convertido, unidad_peso FROM mascota";
    $query_c = "SELECT * FROM cliente";
    $query_v = "
        SELECT vacuna.*, mascota.nombre AS nombre_mascota 
        FROM vacuna
        JOIN mascota ON vacuna.id_mascota = mascota.id_mascota
    ";
    
    $resultado_m = mysqli_query($conexiondb, $query_m);
    $resultado_c = mysqli_query($conexiondb, $query_c);
    $resultado_v = mysqli_query($conexiondb, $query_v);
    mysqli_close($conexiondb);
    ?>

    <div class="container center">
        <div class="row">
            <div class="col-md-4 mt-3">
                <?php
                if (isset($_COOKIE['message'])) {
                    echo "<div class='alert " . $_COOKIE['alert'] . " alert-dismissible fade show' role='alert'>";
                    echo $_COOKIE['message'];
                    echo "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                    echo "</div>";
                    setcookie('message', '', 1);
                    setcookie('alert', '', 1);
                }
                ?>
            </div>

           <!-- Listado de mascotas -->
<div class="rows-sm-6">
    <h1 class="text-center mt-4">Listado de Mascotas</h1>
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th scope="col">N</th>
                <th scope="col">Código</th>
                <th scope="col">Nombre</th>
                <th scope="col">Fecha_nacimiento</th>
                <th scope="col">Raza</th>
                <th scope="col">Peso</th> <!-- Nueva columna para el peso -->
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $index = 1;
            while ($paciente = mysqli_fetch_assoc($resultado_m)) {
                echo "<tr>";
                echo "<th scope='row'>" . $index++ . "</th>";
                echo "<td>" . $paciente['codigo'] . "</td>";
                echo "<td>" . $paciente['nombre'] . "</td>";
                echo "<td>" . $paciente['fecha_nacimiento'] . "</td>";
                echo "<td>" . $paciente['raza'] . "</td>";
                // Mostramos el peso con la unidad de medida que fue ingresada
                echo "<td>" . $paciente['peso'] . " " . $paciente['unidad_peso'] . "</td>";
                echo "<td>";
                echo "<a href='editar_mascota.php?id_mascota=" . $paciente['id_mascota'] . "' class='btn btn-outline-primary mx-1 my-1'> <i class=for='btnradio1'>Editar</i> </a>";
                echo "<a href='eliminar_mascota.php?id_mascota=" . $paciente['id_mascota'] . "' class='btn btn-outline-primary mx-1 my-1'> <i class=for='btnradio1'>Borrar</i> </a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

            <!-- Listado de clientes -->
            <div class="rows-sm-6">
                <h1 class="text-center mt-4">Listado de clientes</h1>
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">N</th>
                            <th scope="col">Cedula</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $index = 1;
                        while ($paciente = mysqli_fetch_assoc($resultado_c)) {
                            echo "<tr>";
                            echo "<th scope='row'>" . $index++ . "</th>";
                            echo "<td>" . $paciente['cedula'] . "</td>";
                            echo "<td>" . $paciente['Nombre_cliente'] . "</td>";
                            echo "<td>" . $paciente['apellido_cliente'] . "</td>";
                            echo "<td>" . $paciente['telefono'] . "</td>";
                            echo "<td>" . $paciente['direccion'] . "</td>";
                            echo "<td>";
                            echo "<a href='editar_cliente.php?id_cliente=" . $paciente['id_cliente'] . "' class='btn btn-outline-primary mx-1 my-1'> <i class=for='btnradio1'>Editar</i> </a>";
                            echo "<a href='eliminar_cliente.php?id_cliente=" . $paciente['id_cliente'] . "' class='btn btn-outline-primary mx-1 my-1'> <i class=for='btnradio1'>Borrar</i> </a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Listado de medicamentos -->
            <div class="rows-sm-6">
                <h1 class="text-center mt-4">Listado Medicamentos</h1>
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">N</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Dosis</th>
                            <th scope="col">Mascota</th>
                            <th scope="col">Veterinario</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $index = 1;
                        while ($paciente = mysqli_fetch_assoc($resultado_v)) {
                            echo "<tr>";
                            echo "<th scope='row'>" . $index++ . "</th>";
                            echo "<td>" . $paciente['fecha'] . "</td>";
                            echo "<td>" . $paciente['dosis'] . "</td>";
                            echo "<td>" . $paciente['nombre_mascota'] . "</td>";
                            echo "<td>" . $paciente['nombre_veterinario'] . "</td>";
                            echo "<td>" . $paciente['descripcion'] . "</td>";
                            echo "<td>";
                            echo "<a href='editar_vacuna.php?id_vacunacion=" . $paciente['id_vacunacion'] . "' class='btn btn-outline-primary mx-1 my-1'> <i class=for='btnradio1'>Editar</i> </a>";
                            echo "<a href='eliminar_vacuna.php?id_vacunacion=" . $paciente['id_vacunacion'] . "' class='btn btn-outline-primary mx-1 my-1'> <i class=for='btnradio1'>Borrar</i> </a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        </div>
    </div>
</body>

</html>
