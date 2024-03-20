<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
        &copy; Copyright <strong><span>Trybit</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="CSS/assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="CSS/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="CSS/assets/vendor/chart.js/chart.umd.js"></script>
<script src="CSS/assets/vendor/echarts/echarts.min.js"></script>
<script src="CSS/assets/vendor/quill/quill.min.js"></script>
<script src="CSS/assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="CSS/assets/vendor/tinymce/tinymce.min.js"></script>
<script src="CSS/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="CSS/assets/js/main.js"></script>
</body>

<script>
    function filtrarVentas(button) {
        var buttonId = button.id;
        switch (buttonId) {
            case "ventasHoy":
                document.getElementById("ventasHoyCard").style.display = "block";
                document.getElementById("ventasMesCard").style.display = "none";
                document.getElementById("ventasAnoCard").style.display = "none";
                break;
            case "ventasMes":
                document.getElementById("ventasHoyCard").style.display = "none";
                document.getElementById("ventasMesCard").style.display = "block";
                document.getElementById("ventasAnoCard").style.display = "none";
                break;
            case "ventasAno":
                document.getElementById("ventasHoyCard").style.display = "none";
                document.getElementById("ventasMesCard").style.display = "none";
                document.getElementById("ventasAnoCard").style.display = "block";
                break;
            default:
                alert("Botón no reconocido");
        }
    }
    function filtrarGanancias(button) {
        var buttonId = button.id;
        switch (buttonId) {
            case "gananciasHoy":
                document.getElementById("gananciasHoyCard").style.display = "block";
                document.getElementById("gananciasMesCard").style.display = "none";
                document.getElementById("gananciasAnoCard").style.display = "none";
                break;
            case "gananciasMes":
                document.getElementById("gananciasHoyCard").style.display = "none";
                document.getElementById("gananciasMesCard").style.display = "block";
                document.getElementById("gananciasAnoCard").style.display = "none";
                break;
            case "gananciasAno":
                document.getElementById("gananciasHoyCard").style.display = "none";
                document.getElementById("gananciasMesCard").style.display = "none";
                document.getElementById("gananciasAnoCard").style.display = "block";
                break;
            default:
                alert("Botón no reconocido");
        }
    }
    function filtrarGastos(button) {
        var buttonId = button.id;
        switch (buttonId) {
            case "gastosHoy":
                document.getElementById("gastosHoyCard").style.display = "block";
                document.getElementById("gastosMesCard").style.display = "none";
                document.getElementById("gastosAnoCard").style.display = "none";
                break;
            case "gastosMes":
                document.getElementById("gastosHoyCard").style.display = "none";
                document.getElementById("gastosMesCard").style.display = "block";
                document.getElementById("gastosAnoCard").style.display = "none";
                break;
            case "gastosAno":
                document.getElementById("gastosHoyCard").style.display = "none";
                document.getElementById("gastosMesCard").style.display = "none";
                document.getElementById("gastosAnoCard").style.display = "block";
                break;
            default:
                alert("Botón no reconocido");
        }
    }
    function filtrarGrafica1(button) {
        var buttonId = button.id;
        switch (buttonId) {
            case "grafica1Hoy":
                document.getElementById("grafica1hoyCard").style.display = "block";
                document.getElementById("grafica1mesCard").style.display = "none";
                document.getElementById("grafica1anoCard").style.display = "none";
                break;
            case "grafica1Mes":
                document.getElementById("grafica1hoyCard").style.display = "none";
                document.getElementById("grafica1mesCard").style.display = "block";
                document.getElementById("grafica1anoCard").style.display = "none";
                break;
            case "grafica1Ano":
                document.getElementById("grafica1hoyCard").style.display = "none";
                document.getElementById("grafica1mesCard").style.display = "none";
                document.getElementById("grafica1anoCard").style.display = "block";
                break;
            default:
                alert("Botón no reconocido");
        }
    }
    function filtrarGrafica2(button) {
        var buttonId = button.id;
        switch (buttonId) {
            case "grafica2Hoy":
                document.getElementById("grafica2hoyCard").style.display = "block";
                document.getElementById("grafica2mesCard").style.display = "none";
                document.getElementById("grafica2anoCard").style.display = "none";
                break;
            case "grafica2Mes":
                document.getElementById("grafica2hoyCard").style.display = "none";
                document.getElementById("grafica2mesCard").style.display = "block";
                document.getElementById("grafica2anoCard").style.display = "none";
                break;
            case "grafica2Ano":
                document.getElementById("grafica2hoyCard").style.display = "none";
                document.getElementById("grafica2mesCard").style.display = "none";
                document.getElementById("grafica2anoCard").style.display = "block";
                break;
            default:
                alert("Botón no reconocido");
        }
    }
    function filtrarVentasRecient(button) {
        var buttonId = button.id;
        switch (buttonId) {
            case "ventasRecientHoy":
                document.getElementById("ventasRecientHoyCard").style.display = "block";
                document.getElementById("ventasRecientMesCard").style.display = "none";
                document.getElementById("ventasRecientAnoCard").style.display = "none";
                break;
            case "ventasRecientMes":
                document.getElementById("ventasRecientHoyCard").style.display = "none";
                document.getElementById("ventasRecientMesCard").style.display = "block";
                document.getElementById("ventasRecientAnoCard").style.display = "none";
                break;
            case "ventasRecientAno":
                document.getElementById("ventasRecientHoyCard").style.display = "none";
                document.getElementById("ventasRecientMesCard").style.display = "none";
                document.getElementById("ventasRecientAnoCard").style.display = "block";
                break;
            default:
                alert("Botón no reconocido");
        }
    }
    function filtrarVentasAltas(button) {
        var buttonId = button.id;
        switch (buttonId) {
            case "ventasAltasHoy":
                document.getElementById("ventasAltasHoyCard").style.display = "block";
                document.getElementById("ventasAltasMesCard").style.display = "none";
                document.getElementById("ventasAltasAnoCard").style.display = "none";
                break;
            case "ventasAltasMes":
                document.getElementById("ventasAltasHoyCard").style.display = "none";
                document.getElementById("ventasAltasMesCard").style.display = "block";
                document.getElementById("ventasAltasAnoCard").style.display = "none";
                break;
            case "ventasAltasAno":
                document.getElementById("ventasAltasHoyCard").style.display = "none";
                document.getElementById("ventasAltasMesCard").style.display = "none";
                document.getElementById("ventasAltasAnoCard").style.display = "block";
                break;
            default:
                alert("Botón no reconocido");
        }
    }

</script>

<?php
conexion::cerrar_conexion();
?>

</html>