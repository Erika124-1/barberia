<!-- Footer -->

<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<style>body {
    height: 50px; /* Para que haya suficiente espacio para desplazar la página hacia abajo */
    position: relative;
}

#scrollToTopBtn {
    position: fixed;
    bottom: 20px;
    right: 20px;
    display: none;
}</style>
<button id="scrollToTopBtn" class="btn btn-dark">
        <i class="fas fa-arrow-up"></i></button>


<!-- Agrega un elemento de entrada de texto para el buscador -->



<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/all.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap4.min.js"></script>
<script src="js/sweetalert2@10.js"></script>
<script type="text/javascript" src="js/producto.js"></script>

<script>
        // Cuando el usuario hace clic en el botón, vuelve arriba en la página
        window.onscroll = function () {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("scrollToTopBtn").style.display = "block";
    } else {
        document.getElementById("scrollToTopBtn").style.display = "none";
    }
};

// Cuando el usuario hace clic en el botón, desplázate hacia arriba
document.getElementById("scrollToTopBtn").addEventListener("click", function () {
    document.body.scrollTop = 0; // Para Safari
    document.documentElement.scrollTop = 0; // Para Chrome, Firefox, IE y Opera
});
    </script>
</body>

</html>
