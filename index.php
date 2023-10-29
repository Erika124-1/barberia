<?php

session_start();
if (!empty($_SESSION['active'])) {
  header('location: sistema/');
} else {
  if (!empty($_POST)) {
    if (empty($_POST['usuario']) || empty($_POST['clave'])) {
      $alert = '<div class="alert alert-danger" role="alert">Ingrese su usuario y su clave</div>';
    } else {
      require_once "conexion.php";
      $user = mysqli_real_escape_string($conexion, $_POST['usuario']);
      $clave = md5(mysqli_real_escape_string($conexion, $_POST['clave']));
      $query = mysqli_query($conexion, "SELECT u.idusuario,u.correo,u.usuario,r.idrol,r.rol FROM usuario u INNER JOIN rol r ON u.rol = r.idrol WHERE u.usuario = '$user' AND u.clave = '$clave'");
      mysqli_close($conexion);
      $resultado = mysqli_fetch_assoc($query);
      // Después de autenticar al usuario en registro_formulario.php
if ($resultado) {
  $_SESSION['active'] = true;
  $_SESSION['idUser'] = $resultado['idusuario'];
  $_SESSION['email'] = $resultado['correo'];
  $_SESSION['user'] = $resultado['usuario'];
  $_SESSION['rol'] = $resultado['idrol'];
  $_SESSION['rol_name'] = $resultado['rol'];

  if ($_SESSION['rol'] == 1) { // Administrador
      header('location: sistema/');
  } else { // Cliente
      header('location: barberia/inicio.php');
  }
} else {
  $alert = '<div class="alert alert-danger" role="alert">Usuario o Contraseña Incorrecta</div>';
  session_destroy();
}

    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Dimante´s Barberia</title>
  <!-- Custom fonts for this template-->
  <link href="sistema/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="sistema/css/sb-admin-2.min.css" rel="stylesheet">
  <style>
    body {
      background-image: url(iniciar.jpg);
      background-size: cover;
      background-position: center;
      height: 100vh;
    
   
    }

    .container {
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .card {
      background: rgba(255, 255, 255, 0.8);
    }
  </style>
</head>

<body>
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h2 text-gray-900 mb-4">Iniciar Sesión</h1>
              </div>
              <form class="user" method="POST">
                <?php echo isset($alert) ? $alert : ""; ?>
                <div class="form-group">
                  <label for="">Usuario</label>
                  <input type="text" class="form-control" placeholder="Usuario" name="usuario">
                </div>
                <div class="form-group">
                  <label for="">Contraseña</label>
                  <input type="password" class="form-control" placeholder="Contraseña" name="clave">
                </div>
                <input type="submit" value="Iniciar" class="btn btn-primary">
                <hr>
                <div class="text-center">
                  <p class="small">¿No tienes una cuenta? <a href="registro_formulario.php">Regístrate aquí</a></p>
                </div>
              </form>
              <hr>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="sistema/vendor/jquery/jquery.min.js"></script>
  <script src="sistema/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="sistema/vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="sistema/js/sb-admin-2.min.js"></script>
</body>

</html>
