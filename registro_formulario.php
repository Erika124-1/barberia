<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Include Bootstrap CSS and other meta tags if needed -->
    <!-- ... -->

    <title>Registrate</title>

    <!-- Custom styles for this template -->
    <style>
       body {
      background-image: url(registrar.jpg);
      background-size: cover;
      background-position: center;
      height: 100vh;
    
   
    }
    .card {
    background: rgba(255, 255, 255, 0.9);
}
   
    </style>
    <link href="sistema/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h2 text-gray-900 mb-4">Crear una cuenta</h1>
                            </div>
                            <form class="user  card" method="POST" action="registro.php">
                                <!-- Display alert messages here if needed -->

                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Usuario" name="usuario" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Correo electrónico" name="correo" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Contraseña" name="clave" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">Registrarse</button>
                            </form>

                            <hr>

                            <div class="text-center">
                                <a class="small" href="index.php">¿Ya tienes una cuenta? Inicia sesión aquí.</a>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="sistema/vendor/jquery/jquery.min.js"></script>
    <script src="sistema/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="sistema/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="sistema/js/sb-admin-2.min.js"></script>

</body>

</html>
