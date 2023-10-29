<?php
session_start();
include('../conexion.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styless.css">
    <link rel="icon" href="icono.ico">
    <title>NOSOTROS</title>
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
                        <li><a href="inicio.php">Inicio</a></li>
                        <li><a href="nosotros.php">Nosotros</a></li>
                        <li><a href="servicios.php">Nuestros Servicios</a></li>
                        <li><a href="reserva.php">Reserva Tu Cita</a></li>
                        <li><a href="cerrar_sesion.php">Cerrar Sesión</a></li>
                    </ul>
                </nav>        
        </div>
    </header>
     <h1 class="titulo">Nuestra Empresa</h1>
     <div class="links"></div>
    <main>
    <div class="card">
        <div class="face front">
            <img src="img/1.jpg" alt="">
            <h3>Misión</h3>
        </div>
        <div class="face back">
            <h3>Misión</h3>
            <p>En Diamante´s Barbería nos comprometemos a ofrecer a nuestros clientes una experiencia excepcional de cuidado personal y estilo. Nos esforzamos por proporcionar servicios de barbería de alta calidad, combinando técnicas tradicionales con las últimas tendencias de la industria. Nuestro equipo de barberos altamente capacitados se dedica a superar las expectativas de nuestros clientes, brindando cortes de pelo y cuidado de la barba impecables en un ambiente acogedor y amigable. </p>
            <div class="link"></div>
        </div>
     </div>
     <div class="card">
        <div class="face front">
            <img src="img/2.jpg" alt="">
            <h3>Visión</h3>
        </div>
        <div class="face back">
            <h3>Visión</h3>
            <p>En Diamante´s Barbería , nos esforzamos por ser el destino preferido para hombres que buscan estilo y cuidado personal excepcionales. Nos dedicamos a liderar la industria de la barbería mediante la innovación constante en técnicas y servicios. Nuestra visión es expandirnos globalmente, manteniendo nuestros valores de profesionalidad, integridad y pasión por la barbería.</p>
            <div class="link"></div>
        </div>
     </div>

    </main>
    <footer>
        <div class="footer-txt">
            <p>©2023 | Diamante`s Barbería. All rights reserved</p>
        </div>
    </footer>
</body>

</html>