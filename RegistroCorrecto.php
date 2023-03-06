<?php
include_once 'APP/config.inc.php';
include_once 'APP/Conexion.inc.php';
include_once 'APP/RepoUsuario.inc.php';
include_once 'APP/Redireccion.inc.php';

if (isset($_GET['nombre']) && !empty($_GET['nombre'])) {
    $nombre = $_GET['nombre'];
} else {
    Redireccion::redirigir(SERVIDOR);
    $titulo = 'Registro incorrecto';
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Registro Correcto</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="CSS/assets/img/favicon.png" rel="icosn">
    <link href="CSS/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="CSS/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="CSS/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="CSS/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="CSS/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="CSS/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="CSS/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="CSS/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="CSS/assets/css/style.css" rel="stylesheet">

</head>

<body>

    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">Trybit</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Has creado una cuenta</h5>
                                        <p class="text-center small">Satisfactoriamente</p>
                                        <p>Gracias por registrarte <b><?php echo $nombre ?></b></p>
                                        <br>
                                        <p><a href="<?php echo RUTA_LOGIN ?>">Inicia sesión</a> para comenzar a usar tu cuenta</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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

</html>