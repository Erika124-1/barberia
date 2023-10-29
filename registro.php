<?php
if (!empty($_POST)) {
    require_once "conexion.php";
    $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
    $correo = mysqli_real_escape_string($conexion, $_POST['correo']);
    $clave = md5(mysqli_real_escape_string($conexion, $_POST['clave']));

    $query = "INSERT INTO usuario (usuario, correo, clave, rol) VALUES ('$usuario', '$correo', '$clave', 3)";
    if (mysqli_query($conexion, $query)) {
        echo "Registro exitoso";
        // Redirige a la página de inicio de sesión
        header('Location: index.php');

    } else {
        echo "Error en el registro: " . mysqli_error($conexion);
    header('Location: registro_formulario.php');
}

    mysqli_close($conexion);
}
?>

