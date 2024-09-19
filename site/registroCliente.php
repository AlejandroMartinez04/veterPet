<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>registro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your keywords">
    <meta name="author" content="Your name">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/preview.css" type="text/css">
    <script type="text/javascript" src="js/include_script.js"></script>
</head>
<body>
    <!--content wrapper-->
    <div id="wrapper">
        <section>
            <div class="dynamicContent">
                <div class="inner">
                    <div class="container">
                        <div class="row">
                            <div class="span5 center">
                                <img src="img/page1_pic1.jpg" alt="" class="marg_1">
                                <h2>Bienvenido<span class="color_1">.</span></h2>
                                <img src="img/separator.png" alt="" class="marg_2">
                                
                                <!-- Aquí empieza el formulario de registro -->
                                <div class="col-sm-4 offset-sm-4">
                                    <br>
                                    <form action="guardar_cliente.php" method="post">
    <h3>
        <b><label for="cedula">REGISTRO DE CLIENTE:</label></b>
    </h3>

    <div class="mb-3">
        <b><label for="cedula">CEDULA:</label></b>
        <input class="form-control" type="text" name="cedula" id="cedula" required pattern="\d+" title="Solo se permiten números">
    </div>
    <div class="mb-3">
        <b><label for="nombre_cliente">NOMBRE:</label></b>
        <input class="form-control" type="text" name="Nombre_cliente" id="nombre_cliente" required>
    </div>
    <div class="mb-3">
        <b><label for="apellido_cliente">APELLIDO:</label></b>
        <input class="form-control" type="text" name="apellido_cliente" id="apellido_cliente" required>
    </div>
    <div class="mb-3">
        <b><label for="telefono">TELEFONO:</label></b>
        <input class="form-control" type="text" name="telefono" id="telefono" required pattern="\d+" title="Solo se permiten números">
    </div>
    <div class="mb-3">
        <b><label for="direccion">DIRECCIÓN:</label></b>
        <input class="form-control" type="text" name="direccion" id="direccion" required>
    </div>
    <input type="hidden" name="editar" value='no' readonly>
    <input class="btn btn-outline-primary" type="submit" value="GUARDAR">
</form>


                                </div>
                              
                                
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script>
    document.querySelector('form').addEventListener('submit', function(event) {
        let cedula = document.getElementById('cedula').value.trim();
        let nombre = document.getElementById('nombre_cliente').value.trim();
        let apellido = document.getElementById('apellido_cliente').value.trim();
        let telefono = document.getElementById('telefono').value.trim();
        let direccion = document.getElementById('direccion').value.trim();

        // Expresión regular solo números
        let soloNumeros = /^\d+$/;

        // Validación de campos vacíos
        if (!cedula || !nombre || !apellido || !telefono || !direccion) {
            alert('Todos los campos son obligatorios.');
            event.preventDefault(); // Detiene el envío del formulario
            return;
        }

        // Validación de cédula y teléfono (solo números)
        if (!soloNumeros.test(cedula)) {
            alert('La cédula solo debe contener números.');
            event.preventDefault(); // Detiene el envío del formulario
            return;
        }

        if (!soloNumeros.test(telefono)) {
            alert('El teléfono solo debe contener números.');
            event.preventDefault(); // Detiene el envío del formulario
        }
    });
</script>


    
</body>
</html>
