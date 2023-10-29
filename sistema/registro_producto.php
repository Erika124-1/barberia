<?php 
include_once "includes/header.php";
include "../conexion.php";

if (!empty($_POST)) {
    $alert = "";

    if (empty($_POST['producto']) || empty($_POST['precio']) || empty($_POST['cantidad'])) {
        $alert = '<div class="alert alert-danger" role="alert">
                    Todos los campos son obligatorios
                </div>';
    } else {
        $producto = $_POST['producto'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];
        $tipo_servicio = $_POST['tipo_servicio']; // Nuevo campo para el tipo de servicio
        $usuario_id = $_SESSION['idUser'];

        // Procesar la imagen
        $imagen_nombre = $_FILES['imagen']['name'];
        $imagen_temp = $_FILES['imagen']['tmp_name'];
        $imagen_ruta = "include/" . $imagen_nombre;
        
        // Mover el archivo de imagen a la carpeta include
        move_uploaded_file($imagen_temp, $imagen_ruta);

        // Insertar datos en la base de datos
        $query_insert = mysqli_query($conexion, "INSERT INTO producto(descripcion, precio, existencia, tipo_servicio, imagen, usuario_id) 
                                                VALUES ('$producto', '$precio', '$cantidad', '$tipo_servicio', '$imagen_nombre', '$usuario_id')");

        if ($query_insert) {
            $alert = '<div class="alert alert-primary" role="alert">
                        Servicio Registrado Correctamente
                    </div>';
        } else {
            $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar el producto
                    </div>';
        }
    }
}
?>

<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">
</br>
<h1 class="h1 mb-4 text-center font-weight-bold text-dark">Nuevo Servicio</h1>  
    <!-- Page Heading -->
    

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-6 m-auto">
            <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                
                <div class="form-group">
                    <label for="producto">Servicio:</label>
                    <input type="text" placeholder="Ingrese nombre del Servicio" name="producto" id="producto" class="form-control">
                </div>

                <div class="form-group">
                    <label for="precio">Precio:</label>
                    <input type="text" placeholder="Ingrese precio" class="form-control" name="precio" id="precio">
                </div>

                <div class="form-group">
                    <label for="cantidad">Cantidad:</label>
                    <input type="number" placeholder="Ingrese cantidad" class="form-control" name="cantidad" id="cantidad">
                </div>

                <div class="form-group">
                    <label for="tipo_servicio">Tipo de Servicio:</label>
                    <select class="form-control" name="tipo_servicio" id="tipo_servicio">
                        <option value="1">Producto</option>
                        <option value="2">Estética</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="imagen">Imagen</label>
                    <input type="file" class="form-control-file" name="imagen" id="imagen">
                </div>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="lista_productos.php" class="btn btn-warning"><i class="fas fa-arrow-left"></i>Regresar</a>
        <button type="submit" class="btn btn-primary" style="background-color: #007BFF; border-color: #007BFF;">
                    <i class="fas fa-save"></i> Guardar Servicio
                </button>
    </div>
            </form>
            <div class="mt-3">
            <?php echo isset($alert) ? $alert : ''; ?>

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include_once "includes/footer.php"; ?>
