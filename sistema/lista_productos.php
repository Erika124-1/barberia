<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    </br>
    <h1 class="h1 mb-4 text-center font-weight-bold text-dark">Lista de Servicios</h1>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="registro_producto.php" class="btn btn-light" style="background-color: #ADD8E6; color: #000;">
            <i class="fas fa-plus-circle"></i> Nuevo Servicio
        </a>
    

    <!-- Search Form -->
    <form action="" method="GET" class="form-inline mb-4">
        <div class="form-group mb-2">
            <input type="text" class="form-control" id="busqueda" name="busqueda" placeholder="Buscar...">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Buscar</button>
    </form>
    </div>
    <!-- Table to display search results -->
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="table">
                    <thead class="thead-light">
                        <tr>
                            <th>Id</th>
                            <th>Servicio</th>
                            <th>Precio</th>
                            <th>Existencia</th>
                            <th>Tipo de Servicio</th>
                            <th>Imagen</th>
                            <?php if ($_SESSION['rol'] == 1) { ?>
                            <th>Acciones</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "../conexion.php";

                        if (isset($_GET['busqueda'])) {
							$busqueda = $_GET['busqueda'];
							// Usar OR para buscar en varios campos y en tipo_servicio
							$query = "SELECT * FROM producto WHERE codproducto LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%' OR precio LIKE '%$busqueda%' OR existencia LIKE '%$busqueda%' OR (tipo_servicio = 1 AND 'Producto' LIKE '%$busqueda%') OR (tipo_servicio = 2 AND 'Estética' LIKE '%$busqueda%')";
						} else {
							$query = "SELECT * FROM producto";
						}

                        $result = mysqli_query($conexion, $query);
                        $rowCount = mysqli_num_rows($result);
                        if ($rowCount > 0) {
                            while ($data = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $data['codproducto']; ?></td>
                                    <td><?php echo $data['descripcion']; ?></td>
                                    <td><?php echo $data['precio']; ?></td>
                                    <td><?php echo $data['existencia']; ?></td>
                                    <td><?php echo ($data['tipo_servicio'] == 1) ? 'Producto' : 'Estética'; ?></td>
                                    <td><img src="include/<?php echo $data['imagen']; ?>" alt="Imagen del producto" width="100"></td>
                                    <?php if ($_SESSION['rol'] == 1) { ?>
                                    <td>
                                        <a href="editar_producto.php?id=<?php echo $data['codproducto']; ?>" class="btn btn-warning"><i class='fas fa-edit'></i>Editar</a>
                                        <form action="eliminar_producto.php?id=<?php echo $data['codproducto']; ?>" method="post" class="confirmar d-inline">
                                            <button class="btn btn-danger" type="submit"><i class='fas fa-trash-alt'></i>Eliminar </button>
                                        </form>
                                    </td>
                                    <?php } ?>
                                </tr>
                        <?php }
                        } else {
                            echo "<tr><td colspan='7'>No se encontraron resultados.</td></tr>";
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include_once "includes/footer.php"; ?>
