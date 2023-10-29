
<?php include_once "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['nombre']) || empty($_POST['telefono']) || empty($_POST['direccion'])) {
        $alert = '<div class="alert alert-danger" role="alert">
                                    Todo los campos son obligatorio
                                </div>';
    } else {
        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $usuario_id = $_SESSION['idUser'];

        $result = 0;
        if (is_numeric($dni) and $dni != 0) {
            $query = mysqli_query($conexion, "SELECT * FROM cliente where dni = '$dni'");
            $result = mysqli_fetch_array($query);
        }
        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">
                                    El D.I ya existe
                                </div>';
        } else {
            $query_insert = mysqli_query($conexion, "INSERT INTO cliente(dni,nombre,telefono,direccion, usuario_id) values ('$dni', '$nombre', '$telefono', '$direccion', '$usuario_id')");
            if ($query_insert) {
                $alert = '<div class="alert alert-success" role="alert">
                                    Cliente Registrado Correctamente
                                </div>';
            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                                    Error al Guardar
                            </div>';
            }
        }
    }
    mysqli_close($conexion);
}
?>
<div class="container-fluid">
    </br>
    <h1 class="h1 mb-4 text-center font-weight-bold text-dark">Nuevo Cliente</h1>
    <div class="row">
        <div class="col-lg-6 m-auto">
            <form class="" action="" method="post">
            <div class="form-group">
                    <label for="dni">D.I:</label>
                    <input type="number" placeholder="Ingresar el Documento de Identidad" name="dni" id="dni" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre del Cliente:</label>
                    <input type="text" placeholder="Ingresar el Nombre Completo" name="nombre" id="nombre" class="form-control">
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="number" placeholder="Ingresar el Teléfono" name="telefono" id="telefono" class="form-control">
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input type="text" placeholder="Ingresar la Direccion" name="direccion" id="direccion" class="form-control">
                </div>
                <a href="lista_cliente.php" class="btn btn-warning">
                    <i class="fas fa-arrow-left"></i> Regresar
                </a>
                <button type="submit" class="btn btn-primary" style="background-color: #007BFF; border-color: #007BFF;">
                    <i class="fas fa-save"></i> Guardar Cliente
                </button>
                <div class="mt-3"><?php echo isset($alert) ? $alert : ''; ?></div>
                
            </form>
        </div>
    </div>
</div>
<!-- Begin Page Content -->

</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>