<?php
include_once "includes/header.php";
include "../conexion.php";

if (!empty($_POST)) {
  $alert = "";
  if (empty($_POST['producto']) || empty($_POST['precio']) || empty($_POST['existencia']) || empty($_POST['tipo_servicio'])) {
    $alert = '<div class="alert alert-danger" role="alert">
              Todos los campos son requeridos
            </div>';
  } else {
    $codproducto = $_GET['id'];
    $producto = $_POST['producto'];
    $precio = $_POST['precio'];
    $existencia = $_POST['existencia'];
    $tipo_servicio = $_POST['tipo_servicio'];

    // Procesar la imagen
      // Lógica para manejar la imagen
      $imagen_nombre = $_FILES['imagen']['name'];
      $imagen_temp = $_FILES['imagen']['tmp_name'];

      // Si no se elige un archivo nuevo, mantener la imagen anterior
      if (empty($imagen_nombre)) {
          $query_imagen = mysqli_query($conexion, "SELECT imagen FROM producto WHERE codproducto = $codproducto");
          $imagen_actual = mysqli_fetch_assoc($query_imagen)['imagen'];
      } else {
          // Si se elige un archivo nuevo, subirlo y actualizar la imagen
          $imagen_ruta = "include/" . $imagen_nombre;
          move_uploaded_file($imagen_temp, $imagen_ruta);
          $imagen_actual = $imagen_nombre;
      }

    $query_update = mysqli_query($conexion, "UPDATE producto SET descripcion = '$producto', precio = $precio, existencia = $existencia, tipo_servicio = '$tipo_servicio', imagen = '$imagen_actual' WHERE codproducto = $codproducto");
    
    if ($query_update) {
      $alert = '<div class="alert alert-primary" role="alert">
              Servicio Actualizado
            </div>';
    } else {
      $alert = '<div class="alert alert-danger" role="alert">
                Error al Modificar
              </div>';
    }
  }
}

// Validar producto
if (empty($_REQUEST['id'])) {
  header("Location: lista_productos.php");
} else {
  $id_producto = $_REQUEST['id'];
  if (!is_numeric($id_producto)) {
    header("Location: lista_productos.php");
  }
  $query_producto = mysqli_query($conexion, "SELECT codproducto, descripcion, precio, existencia, tipo_servicio, imagen FROM producto WHERE codproducto = $id_producto");
  $result_producto = mysqli_num_rows($query_producto);

  if ($result_producto > 0) {
    $data_producto = mysqli_fetch_assoc($query_producto);
  } else {
    header("Location: lista_productos.php");
  }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">
</br>
<h1 class="h2 mb-4 text-center font-weight-bold text-dark">Modificar Servicio</h1>

  <div class="row">
    <div class="col-lg-6 m-auto">

      <div class="card">
        
        <div class="card-body">
          <form action="" method="post" enctype="multipart/form-data">
            
            
            <div class="form-group">
              <label for="producto">Servicio:</label>
              <input type="text" class="form-control" placeholder="Ingrese nombre del Servicio" name="producto" id="producto" value="<?php echo $data_producto['descripcion']; ?>">
            </div>
            <div class="form-group">
              <label for="precio">Precio:</label>
              <input type="text" placeholder="Ingrese precio" class="form-control" name="precio" id="precio" value="<?php echo $data_producto['precio']; ?>">
            </div>
            <div class="form-group">
              <label for="tipo_servicio">Tipo de Servicio:</label>
              <select class="form-control" id="tipo_servicio" name="tipo_servicio">
                <option value="1" <?php echo ($data_producto['tipo_servicio'] == 1) ? 'selected' : ''; ?>>Productos</option>
                <option value="2" <?php echo ($data_producto['tipo_servicio'] == 2) ? 'selected' : ''; ?>>Estética</option>
              </select>
            </div>
            <div class="form-group">
              <label for="existencia">Existencia:</label>
              <input type="text" placeholder="Cantidad Disponible" class="form-control" name="existencia" id="existencia" value="<?php echo $data_producto['existencia']; ?>">
            </div>
            <div class="form-group">
              <label for="imagen">Imagen</label>
              <input type="file" class="form-control-file" id="imagen" name="imagen">
            </div>
            
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <a href="lista_productos.php" class="btn btn-warning"><i class="fas fa-arrow-left"></i>Regresar</a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-sync-alt"></i> Actualizar Servicio
                </button>
            </div>

            <div class="mt-3">
            <?php echo isset($alert) ? $alert : ''; ?>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>
