<?php
session_start();
include('../conexion.php'); // Incluye el archivo de conexión a la base de datos
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NUESTROS SERVICIOS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="icono.ico">

    <style>
        body {
            background-color: #474747;
    color: white;
    font-family: sans-serif;
    margin: 0;
    padding: 0;
        }

        .custom-card {
            background-color: #343434;
            border: 5px solid #4B4B4B;
        }

        .custom-card img {
            height: 200px;
            object-fit: cover;
        }

        .card-title, .card-text {
            font-size: 20px;
        }

        .titulo {
            font-family: serif;
            text-align: center;
            border-bottom: 2px solid white;
            padding-bottom: 2px;
            margin-bottom: 20px;
        }
        .footer-txt {
            text-align: center;
            padding: 10px;
            background-color: #070707;
            position: relative;
            bottom: 0;
            width: 100%;
        }


h2 {
    font-size: 65px;
    line-height: 80px;
    color: #FFFFFF;
    text-transform: uppercase;
    font-family: 'Bebas Neue', cursive;
    margin-bottom: 20px;
}
.h2 {
    font-size: 55px;
}
p {
    font-size: 16px;
    color: #AFAFAF;
    margin: 10px 0;
}
    </style>
</head>
<body>
<header class="header">
        <div class="menu container">
           <a href="inicio.php"><img src="img/image.jpg" class="log" alt=""></a>
           <input type="checkbox" id="menu">
            <label for="menu">
                <img src="images/menu.png" class="menu-icono" alt="">
             </label>    
            
                <nav class="navbar">
                    <ul>
                        <li><a class="a" href="inicio.php">Inicio</a></li>
                        <li><a class="a" href="nosotros.php">Nosotros</a></li>
                        <li><a class="a" href="servicios.php">Nuestros Servicios</a></li>
                        <li><a href="reserva.php">Reserva Tu Cita</a></li>
                        <li><a href="cerrar_sesion.php">Cerrar Sesión</a></li>
                    </ul>
                </nav>        
        </div>
    </header>
    <div class="container mt-5">
        <h1 class="mt-5 titulo">ESTÉTICA</h1>
        <div class="row">
            <?php
            // Consulta SQL para obtener servicios de estética
            $sql = "SELECT * FROM producto WHERE tipo_servicio = '2'";
            $result = $conexion->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-3 mb-4">';
                    echo '<div class="card custom-card h-100">';
                    echo '<img src="../sistema/include/' . $row['imagen'] . '" class="card-img-top img-fluid" alt="' . $row['descripcion'] . '">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row['descripcion'] . '</h5>';
                    echo '<p class="card-text">Precio: $' . $row['precio'] . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo 'No se encontraron servicios de estética.';
            }
            ?>
        </div>
        <h1 class="titulo">PRODUCTOS</h1>
        <div class="row">
            <?php
            // Consulta SQL para obtener productos
            $sql = "SELECT * FROM producto WHERE tipo_servicio = '1'";
            $result = $conexion->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-3 mb-4">';
                    echo '<div class="card custom-card h-100">';
                    echo '<img src="../sistema/include/' . $row['imagen'] . '" class="card-img-top img-fluid" alt="' . $row['descripcion'] . '">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row['descripcion'] . '</h5>';
                    echo '<p class="card-text">Precio: $' . $row['precio'] . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo 'No se encontraron productos.';
            }
            $conexion->close();
            ?>
        </div>

        
    </div>
    <footer class="footer-txt">
        <div class="footer-txt">
            <p>©2023 | Diamante`s Barbería. All rights reserved</p>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
