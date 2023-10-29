<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    </br>
    <h1 class="h1 mb-4 text-center font-weight-bold text-dark">Lista de Clientes</h1>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="registro_cliente.php" class="btn btn-light" style="background-color: #ADD8E6; color: #000;">
            <i class="fas fa-user-plus mr-2"></i> Nuevo Cliente
        </a>
        <form action="" method="GET" class="form-inline">
            <div class="form-group mb-2">
                <label for="busqueda" class="sr-only">Buscar:</label>
                <input type="text" class="form-control" id="busqueda" name="busqueda" placeholder="Buscar...">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Buscar</button>
        </form>
    </div>

    <!-- Contenedor para mostrar los resultados de la búsqueda -->
    <div class="row">
        <div class="col-lg-12">

            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="table">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-dark">ID</th>
                            <th class="text-dark">D.I</th>
                            <th class="text-dark">Nombre</th>
                            <th class="text-dark">Telefono</th>
                            <th class="text-dark">Dirección</th>
                            <?php if ($_SESSION['rol'] == 1) { ?>
                                <th class="text-dark">Acciones</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "../conexion.php";

                        if (isset($_GET['busqueda'])) {
                            $busqueda = $_GET['busqueda'];
                            $query = "SELECT * FROM cliente WHERE dni LIKE '%$busqueda%' OR nombre LIKE '%$busqueda%' OR telefono LIKE '%$busqueda%' OR direccion LIKE '%$busqueda%'";
                        } else {
                            $query = "SELECT * FROM cliente";
                        }

                        $result = mysqli_query($conexion, $query);
                        $rowCount = mysqli_num_rows($result);
                        if ($rowCount > 0) {
                            while ($data = mysqli_fetch_assoc($result)) {
                        ?>
                                <tr>
                                    <td><?php echo $data['idcliente']; ?></td>
                                    <td><?php echo $data['dni']; ?></td>
                                    <td><?php echo $data['nombre']; ?></td>
                                    <td><?php echo $data['telefono']; ?></td>
                                    <td><?php echo $data['direccion']; ?></td>
                                    <?php if ($_SESSION['rol'] == 1) { ?>
                                        <td>
                                            <a href="editar_cliente.php?id=<?php echo $data['idcliente']; ?>" class="btn btn-warning"><i class='fas fa-edit'></i>Editar</a>
                                            <form action="eliminar_cliente.php?id=<?php echo $data['idcliente']; ?>" method="post" class="confirmar d-inline">
                                                <button class="btn btn-danger" type="submit"><i class='fas fa-trash-alt'></i> Eliminar</button>
                                            </form>
                                        </td>
                                    <?php } ?>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan='6'>No se encontraron resultados.</td></tr>";
                        }
                        ?>
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
