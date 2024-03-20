<?php
include_once 'APP/ControlSesion.inc.php';
include_once 'APP/Redireccion.inc.php';
include_once 'APP/RepoEscribirDatos.inc.php';
include_once 'APP/Gastos.class.php';

if (!ControlSesion::sesion_iniciada()) {
    Redireccion::redirigir(RUTA_LOGIN);
}
include_once 'PLANTILLAS/Trybit/Default/HeadYMenu.inc.php';

?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Trybit</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo RUTA_TRYBIT?>">Home</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filtro</h6>
                                    </li>
                                    <li><a id="ventasHoy" class="dropdown-item" href="#" onclick="filtrarVentas(this)">Hoy</a></li>
                                    <li><a id="ventasMes" class="dropdown-item" href="#" onclick="filtrarVentas(this)">Este mes</a></li>
                                    <li><a id="ventasAno" class="dropdown-item" href="#" onclick="filtrarVentas(this)">Este año</a></li>
                                </ul>
                            </div>
                            <?php
                            $ventasHoy = RepoReportes::reporte_ventas_hoy(conexion::obtener_conexion(), $_SESSION['NIT']);
                            $ventasMes = RepoReportes::reporte_ventas_mes(conexion::obtener_conexion(), $_SESSION['NIT']);
                            $ventasAno = RepoReportes::reporte_ventas_ano(conexion::obtener_conexion(), $_SESSION['NIT']);
                            ?>
                            <div id="ventasHoyCard" style="display: block;" class="card-body">
                                <h5 class="card-title">Ventas<span>| Hoy </span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>$ <?php echo number_format($ventasHoy, 0, ",", ".") ?></h6>
                                    </div>
                                </div>
                            </div>
                            <div id="ventasMesCard" style="display: none;" class="card-body">
                                <h5 class="card-title">Ventas<span>| Este Mes </span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>$ <?php echo number_format($ventasMes, 0, ",", ".") ?></h6>
                                    </div>
                                </div>
                            </div>
                            <div id="ventasAnoCard" style="display: none;" class="card-body">
                                <h5 class="card-title">Ventas<span>| Este Año </span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>$ <?php echo number_format($ventasAno, 0, ",", ".") ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Ganancias Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card Ganancias-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filtro</h6>
                                    </li>
                                    <li><a id="gananciasHoy" class="dropdown-item" href="#" onclick="filtrarGanancias(this)">Hoy</a></li>
                                    <li><a id="gananciasMes" class="dropdown-item" href="#" onclick="filtrarGanancias(this)">Este mes</a></li>
                                    <li><a id="gananciasAno" class="dropdown-item" href="#" onclick="filtrarGanancias(this)">Este año</a></li>
                                </ul>
                            </div>
                            <?php
                            $gananciasHoy = RepoReportes::reporte_ganancias_hoy(conexion::obtener_conexion(), $_SESSION['NIT']);
                            $gananciasMes = RepoReportes::reporte_ganancias_mes(conexion::obtener_conexion(), $_SESSION['NIT']);
                            $gananciasAno = RepoReportes::reporte_ganancias_ano(conexion::obtener_conexion(), $_SESSION['NIT']);
                            ?>
                            <div id="gananciasHoyCard" style="display: block;" class="card-body">
                                <h5 class="card-title">Ganancias<span>| Hoy </span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>$ <?php echo number_format($gananciasHoy, 0, ",", ".") ?></h6>
                                    </div>
                                </div>
                            </div>
                            <div id="gananciasMesCard" style="display: none;" class="card-body">
                                <h5 class="card-title">Ganancias<span>| Este Mes </span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>$ <?php echo number_format($gananciasMes, 0, ",", ".") ?></h6>
                                    </div>
                                </div>
                            </div>
                            <div id="gananciasAnoCard" style="display: none;" class="card-body">
                                <h5 class="card-title">Ganancias<span>| Este Año </span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>$ <?php echo number_format($gananciasAno, 0, ",", ".") ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Ganancias Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-4 col-xl-12">

                        <div class="card info-card customers-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filtro</h6>
                                    </li>
                                    <li><a id="gastosHoy" class="dropdown-item" href="#" onclick="filtrarGastos(this)">Hoy</a></li>
                                    <li><a id="gastosMes" class="dropdown-item" href="#" onclick="filtrarGastos(this)">Este mes</a></li>
                                    <li><a id="gastosAno" class="dropdown-item" href="#" onclick="filtrarGastos(this)">Este año</a></li>
                                </ul>
                            </div>
                            <?php
                            $gastosHoy = RepoReportes::reporte_gastos_hoy(conexion::obtener_conexion(), $_SESSION['NIT']);
                            $gastosMes = RepoReportes::reporte_gastos_mes(conexion::obtener_conexion(), $_SESSION['NIT']);
                            $gastosAno = RepoReportes::reporte_gastos_ano(conexion::obtener_conexion(), $_SESSION['NIT']);
                            ?>
                            <div id="gastosHoyCard" style="display: block;" class="card-body">
                                <h5 class="card-title">Gastos<span>| Hoy </span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>$ <?php echo number_format($gastosHoy, 0, ",", ".") ?></h6>
                                    </div>
                                </div>
                            </div>
                            <div id="gastosMesCard" style="display: none;" class="card-body">
                                <h5 class="card-title">Gastos<span>| Este Mes </span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>$ <?php echo number_format($gastosMes, 0, ",", ".") ?></h6>
                                    </div>
                                </div>
                            </div>
                            <div id="gastosAnoCard" style="display: none;" class="card-body">
                                <h5 class="card-title">Gastos<span>| Este Año </span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>$ <?php echo number_format($gastosAno, 0, ",", ".") ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!-- End Customers Card -->

                    <!-- Reports -->
                    <div class="col-12">
                        <div class="card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filtro tiempo</h6>
                                    </li>
                                    <li><a id="grafica1Hoy" class="dropdown-item" href="#" onclick="filtrarGrafica1(this)">Hoy</a></li>
                                    <li><a id="grafica1Mes" class="dropdown-item" href="#" onclick="filtrarGrafica1(this)">Este mes</a></li>
                                    <li><a id="grafica1Ano" class="dropdown-item" href="#" onclick="filtrarGrafica1(this)">Este año</a></li>
                                </ul>
                            </div>

                            <?php
                            $grafica1comprasHoy = RepoEscribirDatos::escribir_cantidad_producto_grafica_compras_hoy();
                            $grafica1comprasMes = RepoEscribirDatos::escribir_cantidad_producto_grafica_compras_mes();
                            $grafica1comprasAno = RepoEscribirDatos::escribir_cantidad_producto_grafica_compras_ano();
                            $grafica1ventasHoy = RepoEscribirDatos::escribir_cantidad_producto_grafica_ventas_hoy();
                            $grafica1ventasMes = RepoEscribirDatos::escribir_cantidad_producto_grafica_ventas_mes();
                            $grafica1ventasAno = RepoEscribirDatos::escribir_cantidad_producto_grafica_ventas_ano();
                            $grafica1Nombre = RepoEscribirDatos::escribir_producto_grafica_ventas_ano();
                            ?>
                            <div id="grafica1hoyCard" style="display: block;" class="card-body">
                                <h5 class="card-title">Reportes Cantidad<span>/Hoy</span></h5>

                                <!-- Line Chart -->
                                <div id="reportsChartHoy1"></div>
                                <div id="chart"></div>
                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        new ApexCharts(document.querySelector("#reportsChartHoy1"), {
                                            series: [{
                                                name: 'Ventas',
                                                data: <?php echo $grafica1ventasHoy ?>
                                            },{
                                                name: 'Compras',
                                                data: <?php echo $grafica1comprasHoy ?>
                                            }],
                                            chart: {
                                                height: 350,
                                                type: 'area',
                                                toolbar: {
                                                    show: false
                                                },
                                            },
                                            markers: {
                                                size: 4
                                            },
                                            colors: ['#FA6C62','#7FFA8E'],
                                            fill: {
                                                type: "gradient",
                                                gradient: {
                                                    shadeIntensity: 1,
                                                    opacityFrom: 0.3,
                                                    opacityTo: 0.4,
                                                    stops: [0, 90, 100]
                                                }
                                            },
                                            dataLabels: {
                                                enabled: false
                                            },
                                            stroke: {
                                                curve: 'smooth',
                                                width: 2
                                            },
                                            xaxis: {
                                                categories: <?php echo $grafica1Nombre ?>
                                            },
                                            tooltip: {
                                                x: {
                                                    format: 'dd/MM/yy HH:mm'
                                                },
                                            }
                                        }).render();
                                    });
                                </script>
                                <!-- End Line Chart -->

                            </div>
                            <div id="grafica1mesCard" style="display: none;" class="card-body">
                                <h5 class="card-title">Reportes Cantidad<span>/Este Mes</span></h5>

                                <!-- Line Chart -->
                                <div id="reportsChartMes1"></div>
                                <div id="chart"></div>
                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        new ApexCharts(document.querySelector("#reportsChartMes1"), {
                                            series: [{
                                                name: 'Ventas',
                                                data: <?php echo $grafica1ventasMes ?>
                                            },{
                                                name: 'Compras',
                                                data: <?php echo $grafica1comprasMes ?>
                                            }],
                                            chart: {
                                                height: 350,
                                                type: 'area',
                                                toolbar: {
                                                    show: false
                                                },
                                            },
                                            markers: {
                                                size: 4
                                            },
                                            colors: ['#FA6C62','#7FFA8E'],
                                            fill: {
                                                type: "gradient",
                                                gradient: {
                                                    shadeIntensity: 1,
                                                    opacityFrom: 0.3,
                                                    opacityTo: 0.4,
                                                    stops: [0, 90, 100]
                                                }
                                            },
                                            dataLabels: {
                                                enabled: false
                                            },
                                            stroke: {
                                                curve: 'smooth',
                                                width: 2
                                            },
                                            xaxis: {
                                                categories: <?php echo $grafica1Nombre ?>
                                            },
                                            tooltip: {
                                                x: {
                                                    format: 'dd/MM/yy HH:mm'
                                                },
                                            }
                                        }).render();
                                    });
                                </script>
                                <!-- End Line Chart -->

                            </div>
                            <div id="grafica1anoCard" style="display: none;" class="card-body">
                                <h5 class="card-title">Reportes Cantidad<span>/Este Año</span></h5>

                                <!-- Line Chart -->
                                <div id="reportsChartAno1"></div>
                                <div id="chart"></div>
                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        new ApexCharts(document.querySelector("#reportsChartAno1"), {
                                            series: [{
                                                name: 'Ventas',
                                                data: <?php echo $grafica1ventasAno ?>
                                            },{
                                                name: 'Compras',
                                                data: <?php echo $grafica1comprasAno ?>
                                            }],
                                            chart: {
                                                height: 350,
                                                type: 'area',
                                                toolbar: {
                                                    show: false
                                                },
                                            },
                                            markers: {
                                                size: 4
                                            },
                                            colors: ['#FA6C62','#7FFA8E'],
                                            fill: {
                                                type: "gradient",
                                                gradient: {
                                                    shadeIntensity: 1,
                                                    opacityFrom: 0.3,
                                                    opacityTo: 0.4,
                                                    stops: [0, 90, 100]
                                                }
                                            },
                                            dataLabels: {
                                                enabled: false
                                            },
                                            stroke: {
                                                curve: 'smooth',
                                                width: 2
                                            },
                                            xaxis: {
                                                categories: <?php echo $grafica1Nombre ?>
                                            },
                                            tooltip: {
                                                x: {
                                                    format: 'dd/MM/yy HH:mm'
                                                },
                                            }
                                        }).render();
                                    });
                                </script>
                                <!-- End Line Chart -->

                            </div>

                        </div>
                    </div><!-- End Reports -->


                    <!-- Reports -->
                    <div class="col-12">
                        <div class="card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filtro tiempo</h6>
                                    </li>
                                    <li><a id="grafica2Hoy" class="dropdown-item" href="#" onclick="filtrarGrafica2(this)">Hoy</a></li>
                                    <li><a id="grafica2Mes" class="dropdown-item" href="#" onclick="filtrarGrafica2(this)">Este mes</a></li>
                                    <li><a id="grafica2Ano" class="dropdown-item" href="#" onclick="filtrarGrafica2(this)">Este año</a></li>
                                </ul>
                            </div>

                            <?php
                            $grafica2gastosHoy = RepoEscribirDatos::escribir_cuenta_grafica_gastos_hoy();
                            $grafica2gastosMes = RepoEscribirDatos::escribir_cuenta_grafica_gastos_mes();
                            $grafica2gastosAno = RepoEscribirDatos::escribir_cuenta_grafica_gastos_ano();
                            $grafica2nombreHoy = RepoEscribirDatos::escribir_categoria_grafica_gastos_hoy();
                            $grafica2nombreMes = RepoEscribirDatos::escribir_categoria_grafica_gastos_mes();
                            $grafica2nombreAno = RepoEscribirDatos::escribir_categoria_grafica_gastos_ano();

                            ?>
                            <div id="grafica2hoyCard" style="display: block;" class="card-body">
                                <h5 class="card-title">Reportes Cantidad Gastos<span>/Hoy</span></h5>

                                <!-- Line Chart -->
                                <div id="reportsChart2hoy"></div>

                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        new ApexCharts(document.querySelector("#reportsChart2hoy"), {
                                            series: [{
                                                name: 'Gastos',
                                                data: <?php echo $grafica2gastosHoy ?>
                                            }],
                                            chart: {
                                                height: 350,
                                                type: 'area',
                                                toolbar: {
                                                    show: false
                                                },
                                            },
                                            markers: {
                                                size: 4
                                            },
                                            colors: ['#4154f1'],
                                            fill: {
                                                type: "gradient",
                                                gradient: {
                                                    shadeIntensity: 1,
                                                    opacityFrom: 0.3,
                                                    opacityTo: 0.4,
                                                    stops: [0, 90, 100]
                                                }
                                            },
                                            dataLabels: {
                                                enabled: false
                                            },
                                            stroke: {
                                                curve: 'smooth',
                                                width: 2
                                            },
                                            xaxis: {
                                                categories: <?php echo $grafica2nombreHoy ?>
                                            },
                                            tooltip: {
                                                x: {
                                                    format: 'dd/MM/yy HH:mm'
                                                },
                                            }
                                        }).render();
                                    });
                                </script>
                                <!-- End Line Chart -->

                            </div>
                            <div id="grafica2mesCard" style="display: none;" class="card-body">
                                <h5 class="card-title">Reportes Cantidad Gastos<span>/Este Mes</span></h5>

                                <!-- Line Chart -->
                                <div id="reportsChart2mes"></div>

                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        new ApexCharts(document.querySelector("#reportsChart2mes"), {
                                            series: [{
                                                name: 'Gastos',
                                                data: <?php echo $grafica2gastosMes ?>
                                            }],
                                            chart: {
                                                height: 350,
                                                type: 'area',
                                                toolbar: {
                                                    show: false
                                                },
                                            },
                                            markers: {
                                                size: 4
                                            },
                                            colors: ['#4154f1'],
                                            fill: {
                                                type: "gradient",
                                                gradient: {
                                                    shadeIntensity: 1,
                                                    opacityFrom: 0.3,
                                                    opacityTo: 0.4,
                                                    stops: [0, 90, 100]
                                                }
                                            },
                                            dataLabels: {
                                                enabled: false
                                            },
                                            stroke: {
                                                curve: 'smooth',
                                                width: 2
                                            },
                                            xaxis: {
                                                categories: <?php echo $grafica2nombreMes ?>
                                            },
                                            tooltip: {
                                                x: {
                                                    format: 'dd/MM/yy HH:mm'
                                                },
                                            }
                                        }).render();
                                    });
                                </script>
                                <!-- End Line Chart -->

                            </div>
                            <div id="grafica2anoCard" style="display: none;" class="card-body">
                                <h5 class="card-title">Reportes Cantidad Gastos<span>/Este Año</span></h5>

                                <!-- Line Chart -->
                                <div id="reportsChart2ano"></div>

                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        new ApexCharts(document.querySelector("#reportsChart2ano"), {
                                            series: [{
                                                name: 'Gastos',
                                                data: <?php echo $grafica2gastosAno ?>
                                            }],
                                            chart: {
                                                height: 350,
                                                type: 'area',
                                                toolbar: {
                                                    show: false
                                                },
                                            },
                                            markers: {
                                                size: 4
                                            },
                                            colors: ['#4154f1'],
                                            fill: {
                                                type: "gradient",
                                                gradient: {
                                                    shadeIntensity: 1,
                                                    opacityFrom: 0.3,
                                                    opacityTo: 0.4,
                                                    stops: [0, 90, 100]
                                                }
                                            },
                                            dataLabels: {
                                                enabled: false
                                            },
                                            stroke: {
                                                curve: 'smooth',
                                                width: 2
                                            },
                                            xaxis: {
                                                categories: <?php echo $grafica2nombreAno ?>
                                            },
                                            tooltip: {
                                                x: {
                                                    format: 'dd/MM/yy HH:mm'
                                                },
                                            }
                                        }).render();
                                    });
                                </script>
                                <!-- End Line Chart -->

                            </div>

                        </div>
                    </div><!-- End Reports -->

                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filtro</h6>
                                    </li>
                                    <li><a id="ventasRecientHoy" class="dropdown-item" href="#" onclick="filtrarVentasRecient(this)">Hoy</a></li>
                                    <li><a id="ventasRecientMes" class="dropdown-item" href="#" onclick="filtrarVentasRecient(this)">Este mes</a></li>
                                    <li><a id="ventasRecientAno" class="dropdown-item" href="#" onclick="filtrarVentasRecient(this)">Este año</a></li>
                                </ul>
                            </div>

                            <div id="ventasRecientHoyCard" style="display: block;" class="card-body">
                                <h5 class="card-title">Ventas recientes <span>| Hoy</span></h5>

                                <table class="table table-borderless">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Productos</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Modo pago</th>
                                        <th scope="col">Estatus</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        RepoEscribirDatos::escribir_mis_ventas_recientes_hoy();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div id="ventasRecientMesCard" style="display: none;" class="card-body">
                                <h5 class="card-title">Ventas recientes <span>| Este Mes</span></h5>

                                <table class="table table-borderless">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Productos</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Modo pago</th>
                                        <th scope="col">Estatus</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    RepoEscribirDatos::escribir_mis_ventas_recientes_mes();
                                    ?>
                                    </tbody>
                                </table>

                            </div><div id="ventasRecientAnoCard" style="display: none;" class="card-body">
                                <h5 class="card-title">Ventas recientes <span>| Este Año</span></h5>

                                <table class="table table-borderless">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Productos</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Modo pago</th>
                                        <th scope="col">Estatus</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    RepoEscribirDatos::escribir_mis_ventas_recientes_ano();
                                    ?>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div><!-- End Recent Sales -->

                    <!-- Top Selling -->
                    <div class="col-12">
                        <div class="card top-selling overflow-auto">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filtro</h6>
                                    </li>
                                    <li><a id="ventasAltasHoy" class="dropdown-item" href="#" onclick="filtrarVentasAltas(this)">Hoy</a></li>
                                    <li><a id="ventasAltasMes" class="dropdown-item" href="#" onclick="filtrarVentasAltas(this)">Este mes</a></li>
                                    <li><a id="ventasAltasHoy" class="dropdown-item" href="#" onclick="filtrarVentasAltas(this)">Este año</a></li>
                                </ul>
                            </div>

                            <div id="ventasAltasHoyCard" style="display: block;" class="card-body pb-0">
                                <h5 class="card-title">Top ventas <span>| Hoy</span></h5>

                                <table class="table table-borderless">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Productos</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Modo pago</th>
                                        <th scope="col">Estatus</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    RepoEscribirDatos::escribir_mis_ventas_altas_hoy();
                                    ?>
                                    </tbody>
                                </table>

                            </div>
                            <div id="ventasAltasMesCard" style="display: none;" class="card-body pb-0">
                                <h5 class="card-title">Top ventas <span>| Este Mes</span></h5>

                                <table class="table table-borderless">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Productos</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Modo pago</th>
                                        <th scope="col">Estatus</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    RepoEscribirDatos::escribir_mis_ventas_altas_mes();
                                    ?>
                                    </tbody>
                                </table>

                            </div>
                            <div id="ventasAltasAnoCard" style="display: none;" class="card-body pb-0">
                                <h5 class="card-title">Top ventas <span>| Este Año</span></h5>

                                <table class="table table-borderless">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Productos</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Modo pago</th>
                                        <th scope="col">Estatus</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    RepoEscribirDatos::escribir_mis_ventas_altas_ano();
                                    ?>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div><!-- End Top Selling -->

                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">

                <!-- Recent Activity -->
                <div class="card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filtro</h6>
                            </li>
                            <li><a class="dropdown-item" href="#" onclick="guardarSeleccion('Hoy', 'ActReciente')">Hoy</a></li>
                            <li><a class="dropdown-item" href="#" onclick="guardarSeleccion('Mes', 'ActReciente')">Este mes</a></li>
                            <li><a class="dropdown-item" href="#" onclick="guardarSeleccion('Año', 'ActReciente')">Este año</a></li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Actividad reciente <span>| Hoy</span></h5>

                        <div class="activity">

                            <div class="activity-item d-flex">
                                <div class="activite-label">32 min</div>
                                <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                                <div class="activity-content">
                                    Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a>
                                    beatae
                                </div>
                            </div><!-- End activity item-->

                            <div class="activity-item d-flex">
                                <div class="activite-label">56 min</div>
                                <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                                <div class="activity-content">
                                    Voluptatem blanditiis blanditiis eveniet
                                </div>
                            </div><!-- End activity item-->

                            <div class="activity-item d-flex">
                                <div class="activite-label">2 hrs</div>
                                <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                                <div class="activity-content">
                                    Voluptates corrupti molestias voluptatem
                                </div>
                            </div><!-- End activity item-->

                            <div class="activity-item d-flex">
                                <div class="activite-label">1 day</div>
                                <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                                <div class="activity-content">
                                    Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati
                                        voluptatem</a> tempore
                                </div>
                            </div><!-- End activity item-->

                            <div class="activity-item d-flex">
                                <div class="activite-label">2 days</div>
                                <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                                <div class="activity-content">
                                    Est sit eum reiciendis exercitationem
                                </div>
                            </div><!-- End activity item-->

                            <div class="activity-item d-flex">
                                <div class="activite-label">4 weeks</div>
                                <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                                <div class="activity-content">
                                    Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
                                </div>
                            </div><!-- End activity item-->

                        </div>

                    </div>
                </div><!-- End Recent Activity -->

                <!-- Budget Report -->
                <div class="card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filtro</h6>
                            </li>
                            <li><a class="dropdown-item" href="#" onclick="guardarSeleccion('Hoy', 'Repo')">Hoy</a></li>
                            <li><a class="dropdown-item" href="#" onclick="guardarSeleccion('Mes', '')">Este mes</a></li>
                            <li><a class="dropdown-item" href="#" onclick="guardarSeleccion('Año', '')">Este año</a></li>
                        </ul>
                    </div>

                    <div class="card-body pb-0">
                        <h5 class="card-title">Reporte de presupuesto <span>| Este mes</span></h5>

                        <div id="budgetChart" style="min-height: 400px;" class="echart"></div>

                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({
                                    legend: {
                                        data: ['Presupuesto Asignado', 'Gasto Actual']
                                    },
                                    radar: {
                                        // shape: 'circle',
                                        indicator: [{
                                            name: 'Ventas',
                                            max: 6500
                                        },
                                            {
                                                name: 'Administración',
                                                max: 16000
                                            },
                                            {
                                                name: 'Information Technology',
                                                max: 30000
                                            },
                                            {
                                                name: 'Customer Support',
                                                max: 38000
                                            },
                                            {
                                                name: 'Development',
                                                max: 52000
                                            },
                                            {
                                                name: 'Marketing',
                                                max: 25000
                                            }
                                        ]
                                    },
                                    series: [{
                                        name: 'Presupuesto vs Gasto',
                                        type: 'radar',
                                        data: [{
                                            value: [4200, 3000, 20000, 35000, 50000, 18000],
                                            name: 'Allocated Budget'
                                        },
                                            {
                                                value: [5000, 14000, 28000, 26000, 42000, 21000],
                                                name: 'Actual Spending'
                                            }
                                        ]
                                    }]
                                });
                            });
                        </script>

                    </div>
                </div><!-- End Budget Report -->

                <!-- Website Traffic -->
                <div class="card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filtro</h6>
                            </li>
                            <li><a class="dropdown-item" href="#" onclick="guardarSeleccion('Hoy', '')">Hoy</a></li>
                            <li><a class="dropdown-item" href="#" onclick="guardarSeleccion('Mes', '')">Este mes</a></li>
                            <li><a class="dropdown-item" href="#" onclick="guardarSeleccion('Año', '')">Este año</a></li>
                        </ul>
                    </div>

                    <div class="card-body pb-0">
                        <h5 class="card-title">Website Traffic <span>| Hoy</span></h5>

                        <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                echarts.init(document.querySelector("#trafficChart")).setOption({
                                    tooltip: {
                                        trigger: 'item'
                                    },
                                    legend: {
                                        top: '5%',
                                        left: 'center'
                                    },
                                    series: [{
                                        name: 'Access From',
                                        type: 'pie',
                                        radius: ['40%', '70%'],
                                        avoidLabelOverlap: false,
                                        label: {
                                            show: false,
                                            position: 'center'
                                        },
                                        emphasis: {
                                            label: {
                                                show: true,
                                                fontSize: '18',
                                                fontWeight: 'bold'
                                            }
                                        },
                                        labelLine: {
                                            show: false
                                        },
                                        data: [{
                                            value: 1048,
                                            name: 'Search Engine'
                                        },
                                            {
                                                value: 735,
                                                name: 'Direct'
                                            },
                                            {
                                                value: 580,
                                                name: 'Email'
                                            },
                                            {
                                                value: 484,
                                                name: 'Union Ads'
                                            },
                                            {
                                                value: 300,
                                                name: 'Video Ads'
                                            }
                                        ]
                                    }]
                                });
                            });
                        </script>

                    </div>
                </div><!-- End Website Traffic -->
                
            </div><!-- End Right side columns -->

        </div>
    </section>

</main><!-- End #main -->
<?php include_once 'PLANTILLAS/Trybit/Default/FooterMenu.inc.php'?>
