<?php
session_start();
include('../conexion.php'); // Incluye el archivo de conexión a la base de datos
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESERVA TU CITA</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="icono.ico">

    <style>
        .form-container {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 10px;
            margin-top: 50px;
        }
        .footer-txt {
            text-align: center;
            padding: 10px;
            background-color: #070707;
            position: relative;
            bottom: 0;
            width: 100%;
        }
        
        .titulo {
            font-family: serif;
            text-align: center;
            border-bottom: 2px solid black;
            padding-bottom: 2px;
            margin-bottom: 12px;
            font-size:60px;
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
   

    <div class="container form-container">
         <h1 class="mt-5 titulo">Reserva tu Cita</h1>
         <form action="https://formsubmit.co/diamantesbarberianeiva@gmail.com" method="POST" >
            <div class="form-group">
                <h1 name="Reserva de Citas"></h1>
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="tel" class="form-control" id="telefono" name="telefono" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo Electrónico:</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
            <div class="form-group">
                <label for="tipo_servicio">Tipo de Servicio:</label>
                <select class="form-control" id="tipo_servicio" name="tipo_servicio" required>
                    <option value="estetica">Estética</option>
                    <option value="producto">Producto</option>
                    <option value="ambos">Ambos</option>
                </select>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required>
            </div>
            <div class="form-group">
                <label for="hora">Hora:</label>
                <input type="time" class="form-control" id="hora" name="hora" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Aceptar</button>
                <a href="reserva.php" class="btn btn-secondary">Cancelar</a>
            </div>
            <input type="hidden" name="_next" value="http://localhost/torrez/barberia/reserva.php">
            <input type="hidden" name="_captcha" value="false">

        </form>
    </div>
    </br>
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
