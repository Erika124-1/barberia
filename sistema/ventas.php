<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <br>
    <h1 class="h1 mb-4 text-center font-weight-bold text-dark">Ventas Totales</h1>
    <!-- Search Form -->
    <form action="" method="GET" class="form-inline mb-3">
        <div class="form-group mx-sm-3 mb-2">
            <label for="busqueda" class="sr-only">Buscar:</label>
            <input type="text" class="form-control" id="busqueda" name="busqueda" placeholder="Buscar...">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Buscar</button>
    </form>

    <!-- Page Content -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Table to Display Data -->
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="table">
                    <thead class="thead-light">
                        <tr>
                            <th>Id</th>
                            <th>Fecha</th>
                            <th>Total</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require "../conexion.php";

                        // Check if search query is provided
                        if (isset($_GET['busqueda'])) {
                            $busqueda = $_GET['busqueda'];
                            // Adjust the SQL query to include search conditions
                            $query = mysqli_query($conexion, "SELECT nofactura, fecha, codcliente, totalfactura, estado FROM factura WHERE nofactura LIKE '%$busqueda%' OR fecha LIKE '%$busqueda%' OR totalfactura LIKE '%$busqueda%' ORDER BY nofactura DESC");
                        } else {
                            // Default query without search conditions
                            $query = mysqli_query($conexion, "SELECT nofactura, fecha, codcliente, totalfactura, estado FROM factura ORDER BY nofactura DESC");
                        }

                        mysqli_close($conexion);
                        $cli = mysqli_num_rows($query);

                        if ($cli > 0) {
                            while ($dato = mysqli_fetch_array($query)) {
                        ?>
                                <tr>
                                    <td><?php echo $dato['nofactura']; ?></td>
                                    <td><?php echo $dato['fecha']; ?></td>
                                    <td><?php echo $dato['totalfactura']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary view_factura" cl="<?php echo $dato['codcliente']; ?>" f="<?php echo $dato['nofactura']; ?>">
                                            <i class="fas fa-file-invoice"></i> Factura
                                        </button>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan='4'>No se encontraron resultados.</td></tr>";
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
