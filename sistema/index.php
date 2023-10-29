<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    </br>
    <h1 class="h2 mb-4 text-center font-weight-bold text-dark">Portal Administrador</h1>
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <canvas id="salesChart"></canvas>
        </div>
    </div>
</div>
<!-- End of Main Content -->

<script>
    // Get sales data from the database using PHP
    <?php
    require "../conexion.php";

    $query = mysqli_query($conexion, "SELECT MONTH(fecha) AS month, YEAR(fecha) AS year, SUM(totalfactura) AS total_sales FROM factura GROUP BY MONTH(fecha), YEAR(fecha) ORDER BY YEAR(fecha), MONTH(fecha)");
    $sales_data = array();

    while ($row = mysqli_fetch_assoc($query)) {
        $sales_data[] = $row;
    }

    mysqli_close($conexion);
    ?>

    // Prepare data for the chart
    var salesData = <?php echo json_encode($sales_data); ?>;

    // Extract month and total sales data for the chart
    var months = [];
    var totalSales = [];
    salesData.forEach(function(item) {
        months.push(item.month + '/' + item.year); // Format: MM/YYYY
        totalSales.push(item.total_sales);
    });

    // Create the bar chart using Chart.js
    var ctx = document.getElementById('salesChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: months,
            datasets: [{
                label: 'Total Ventas',
                data: totalSales,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<?php include_once "includes/footer.php"; ?>
