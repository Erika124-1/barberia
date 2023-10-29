<?php
// Inicia la sesión para poder acceder a las variables de sesión
session_start();

// Destruye todas las variables de sesión
session_unset();

// Destruye la sesión
session_destroy();

// Redirige al usuario de vuelta a ../index.php
header("location: ../index.php");
exit();
?>