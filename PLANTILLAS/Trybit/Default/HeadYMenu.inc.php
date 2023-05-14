<?php
include_once 'APP/ControlSesion.inc.php';
include_once 'APP/Redireccion.inc.php';
include_once 'APP/config.inc.php';
include_once 'APP/Conexion.inc.php';
include_once 'APP/Compras.class.php';
include_once 'APP/Contabilidad.class.php';
include_once 'APP/Contactos.class.php';
include_once 'APP/Gastos.class.php';
include_once 'APP/Productos.class.php';
include_once 'APP/Ventas.class.php';
include_once 'APP/RepoCompras.inc.php';
include_once 'APP/RepoContabilidad.inc.php';
include_once 'APP/RepoContactos.inc.php';
include_once 'APP/RepoGastos.inc.php';
include_once 'APP/RepoProductos.inc.php';
include_once 'APP/RepoVentas.inc.php';
include_once 'APP/RepoEscribirDatos.inc.php';
include_once 'APP/RepoReportes.inc.php';
include_once 'PLANTILLAS/Trybit/Default/MuestraGraficos.inc.php';
require_once 'CSS/src/jpgraph.php';
require_once 'CSS/src/jpgraph_line.php';

conexion::abrir_conexion();
if (isset($_POST['enviar_default'])){
    Redireccion::redirigir(RUTA_TRYBIT);
}elseif (isset($_POST['enviar_AGRProducto'])){
    $id = md5(password_hash(rand(0, 100000), PASSWORD_DEFAULT));
    $producto = new Productos($id,$_SESSION['NIT'],$_POST['proveedor_producto'],$_POST['nombre_producto'], $_POST['referencia_producto'], $_POST['descripcion_producto'], $_POST['cantidad_producto'], $_POST['valor_producto'],$_POST['fecha_entrada_producto'], $_POST['vencimiento_producto']);
    $producto_insertado = RepoProductos::insetar_producto(conexion::obtener_conexion(), $producto);

    if ($producto_insertado){
        Redireccion:: redirigir(RUTA_TRYBIT);
    }
}elseif (isset($_POST['enviar_AGRContactos'])){
    $id = md5(password_hash(rand(0, 100000), PASSWORD_DEFAULT));
    $contacto = new Contactos($id,$_SESSION['NIT'], $_POST['nombre_contacto'], $_POST['telefono_Contacto']);
    $contacto_insertado = RepoContactos::insertar_contacto(conexion::obtener_conexion(), $contacto);

    if ($contacto_insertado){
        Redireccion::redirigir(RUTA_TRYBIT);
    }
}elseif (isset($_POST['enviar_AGRCompras'])) {
    $id = md5(password_hash(rand(0, 100000), PASSWORD_DEFAULT));
    $compra = new Compras($id,$_SESSION['NIT'], $_POST['proveedor_compra'], $_POST['producto_compra'], $_POST['valor_compra'], $_POST['cantidad_compra'], $_POST['fecha_compra']);
    $compra_insertada = RepoCompras :: insertar_compra(conexion ::obtener_conexion(), $compra);

    if ($compra_insertada) {
        Redireccion :: redirigir(RUTA_TRYBIT);
    }
}elseif (isset($_POST['enviar_AGRGastos'])){
    $id = md5(password_hash(rand(0, 100000), PASSWORD_DEFAULT));
    $gasto =new Gastos($id,$_SESSION['NIT'],$_POST['fecha_gasto'], $_POST['concepto_gasto'], $_POST['valor_gasto'], $_POST['categoria_gasto']);
    $gasto_insertado = RepoGastos::insertar_gasto(conexion::obtener_conexion(), $gasto);

    if ($gasto_insertado){
        Redireccion::redirigir(RUTA_TRYBIT);
    }
}elseif (isset($_POST['enviar_AGRVentas'])){
    $id = md5(password_hash(rand(0, 100000), PASSWORD_DEFAULT));
    $num_pago = md5(password_hash(rand(0, 100000), PASSWORD_DEFAULT));
    $venta = new Ventas($id,$_SESSION['NIT'], $_POST['producto_venta'], $_POST['cantidad_venta'], $_POST['fecha_venta'],'', $_POST['modo_pago_venta'],$_POST['estatus_venta'],$num_pago);
    $venta_insertada = RepoVentas::insetar_ventas(conexion::obtener_conexion(),$venta);

    if ($venta_insertada){
        Redireccion::redirigir(RUTA_TRYBIT);
    }
}elseif (isset($_POST['editar_EDICompras'])){
    $compra = [];
}
elseif (isset($_POST['enviar_logout'])) {
    $validador = ControlSesion::Sesion_iniciada();
    if (isset($validador)){
        ControlSesion::Cerrar_sesion();
        Redireccion::redirigir(RUTA_TRYBIT);
    }else{
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Trybit</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="CSS/assets/img/favicon.png" rel="icon">
    <link href="CSS/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

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

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="<?php echo RUTA_TRYBIT?>" class="logo d-flex align-items-center">
            <img src="FONTS/Images/Logo%20TRYBIT%20azul.png" alt="">
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" placeholder="Search" title="Enter search keyword">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->

            <li class="nav-item dropdown">

                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-bell"></i>
                    <span class="badge bg-primary badge-number">4</span>
                </a><!-- End Notification Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                    <li class="dropdown-header">
                        You have 4 new notifications
                        <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <i class="bi bi-exclamation-circle text-warning"></i>
                        <div>
                            <h4>Lorem Ipsum</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>30 min. ago</p>
                        </div>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <i class="bi bi-x-circle text-danger"></i>
                        <div>
                            <h4>Atque rerum nesciunt</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>1 hr. ago</p>
                        </div>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <i class="bi bi-check-circle text-success"></i>
                        <div>
                            <h4>Sit rerum fuga</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>2 hrs. ago</p>
                        </div>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <i class="bi bi-info-circle text-primary"></i>
                        <div>
                            <h4>Dicta reprehenderit</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>4 hrs. ago</p>
                        </div>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li class="dropdown-footer">
                        <a href="#">Show all notifications</a>
                    </li>

                </ul><!-- End Notification Dropdown Items -->

            </li><!-- End Notification Nav -->

            <li class="nav-item dropdown">

                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-chat-left-text"></i>
                    <span class="badge bg-success badge-number">3</span>
                </a><!-- End Messages Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                    <li class="dropdown-header">
                        You have 3 new messages
                        <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="message-item">
                        <a href="#">
                            <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                            <div>
                                <h4>Maria Hudson</h4>
                                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                <p>4 hrs. ago</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="message-item">
                        <a href="#">
                            <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                            <div>
                                <h4>Anna Nelson</h4>
                                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                <p>6 hrs. ago</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="message-item">
                        <a href="#">
                            <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                            <div>
                                <h4>David Muldon</h4>
                                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                <p>8 hrs. ago</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="dropdown-footer">
                        <a href="#">Show all messages</a>
                    </li>

                </ul><!-- End Messages Dropdown Items -->

            </li><!-- End Messages Nav -->

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo ' '. $_SESSION['nombre_usuario']; ?></span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>
                            <?php echo ' '. $_SESSION['nombre_usuario']; ?>
                        </h6>
                        <span>Web Designer</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="<?php  ?>">
                            <i class="bi bi-person"></i>
                            <span>Mi Perfil</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                            <i class="bi bi-gear"></i>
                            <span>Configuración de cuenta</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                            <i class="bi bi-question-circle"></i>
                            <span>Necesita ayuda?</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="<?php SERVIDOR?>">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Cerrar sesión</span>
                        </a>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="<?php echo RUTA_TRYBIT?>">
                <i class="bi bi-grid"></i>
                <span>Trybit</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-plus-square"></i><span>Agregar</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?php echo RUTA_AGREGAR_COMPRAS?>">
                        <i class="bi bi-circle"></i><span>Compras</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo RUTA_AGREGAR_CONTACTO?>">
                        <i class="bi bi-circle"></i><span>Contactos</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo RUTA_AGREGAR_GASTO?>">
                        <i class="bi bi-circle"></i><span>Gastos</span>
                    </a>
                </li>
                <li>
                    <a href="<?php  echo RUTA_AGREGAR_PRODUCTOS?>">
                        <i class="bi bi-circle"></i><span>Productos</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo  RUTA_AGREGAR_VENTAS?>">
                        <i class="bi bi-circle"></i><span>Ventas</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-brush"></i><span>Editar</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?php SERVIDOR?>">
                        <i class="bi bi-circle"></i><span>Compras</span>
                    </a>
                </li>
                <li>
                    <a href="<?php SERVIDOR?>">
                        <i class="bi bi-circle"></i><span>Contactos</span>
                    </a>
                </li>
                <li>
                    <a href="<?php SERVIDOR?>">
                        <i class="bi bi-circle"></i><span>Gastos</span>
                    </a>
                </li>
                <li>
                    <a href="<?php SERVIDOR?>">
                        <i class="bi bi-circle"></i><span>Perfil</span>
                    </a>
                </li>
                <li>
                    <a href="<?php SERVIDOR?>">
                        <i class="bi bi-circle"></i><span>Productos</span>
                    </a>
                </li>
                <li>
                    <a href="<?php SERVIDOR?>">
                        <i class="bi bi-circle"></i><span>Ventas</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-eraser"></i><span>Eliminar</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?php SERVIDOR?>">
                        <i class="bi bi-circle"></i><span>Compras</span>
                    </a>
                </li>
                <li>
                    <a href="<?php SERVIDOR?>">
                        <i class="bi bi-circle"></i><span>Contactos</span>
                    </a>
                </li>
                <li>
                    <a href="<?php SERVIDOR?>">
                        <i class="bi bi-circle"></i><span>Gastos</span>
                    </a>
                </li>
                <li>
                    <a href="<?php SERVIDOR?>">
                        <i class="bi bi-circle"></i><span>Productos</span>
                    </a>
                </li>
                <li>
                    <a href="<?php SERVIDOR?>">
                        <i class="bi bi-circle"></i><span>Ventas</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tablas Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-stack"></i><span>Reportes</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?php echo RUTA_VER_COMPRAS?>">
                        <i class="bi bi-circle"></i><span>Compras</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo RUTA_VER_CONTABILIDAD ?>">
                        <i class="bi bi-circle"></i><span>Contabilidad</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo RUTA_VER_CONTACTOS?>">
                        <i class="bi bi-circle"></i><span>Contactos</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo RUTA_VER_GASTOS?>">
                        <i class="bi bi-circle"></i><span>Gastos</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo RUTA_VER_PRODUCTOS?>">
                        <i class="bi bi-circle"></i><span>Productos</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo RUTA_VER_VENTAS?>">
                        <i class="bi bi-circle"></i><span>Ventas</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Charts Nav -->

        <li class="nav-heading">Paginas</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?php SERVIDOR?>">
                <i class="bi bi-person"></i>
                <span>Perfil</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?php SERVIDOR?>">
                <i class="bi bi-question-circle"></i>
                <span>Preguntas Frecuentes</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->

    </ul>

</aside><!-- End Sidebar-->