<?php
include_once 'APP/config.inc.php';

$componentes_url = parse_url($_SERVER['REQUEST_URI']);

$ruta = $componentes_url['path'];
$partes_ruta = explode('/', $ruta);
$partes_ruta = array_filter($partes_ruta);
$partes_ruta = array_slice($partes_ruta, 0);


$ruta_elegida = 'PLANTILLAS/Trybit/Default/404.inc.php';

if ($partes_ruta[0] == 'trybit') {
    if (count($partes_ruta) == 1) {
        $ruta_elegida = 'PLANTILLAS/Trybit/Default/Home.inc.php';
    } elseif (count($partes_ruta) == 2) {
        switch ($partes_ruta[1]) {
            case 'login';
                $ruta_elegida = 'InicioSesion.inc.php';
                break;
            case 'registro';
                $ruta_elegida = 'Registro.inc.php';
                break;
            case 'logout';
                $ruta_elegida = 'Logout.inc.php';
                break;
            case 'principal';
                $ruta_elegida = 'PLANTILLAS/Trybit/Default/MainDefault.inc.php';
                break;
            case 'agregarcompras';
                $ruta_elegida = 'PLANTILLAS/Trybit/AGREGAR/AgregarCompras.inc.php';
                break;
            case 'agregarcontactos';
                $ruta_elegida = 'PLANTILLAS/Trybit/AGREGAR/AgregarContactos.inc.php';
                break;
            case 'agregargastos';
                $ruta_elegida = 'PLANTILLAS/Trybit/AGREGAR/AgregarGastos.inc.php';
                break;
            case 'agregarproductos';
                $ruta_elegida = 'PLANTILLAS/Trybit/AGREGAR/AgregarProductos.inc.php';
                break;
            case 'agregarventas';
                $ruta_elegida = 'PLANTILLAS/Trybit/AGREGAR/AgregarVentas.inc.php';
                break;
            case 'vercompras';
                $ruta_elegida = 'PLANTILLAS/Trybit/VER/VerCompras.inc.php';
                break;
            case 'vercontactos';
                $ruta_elegida = 'PLANTILLAS/Trybit/VER/VerContactos.inc.php';
                break;
            case 'vergastos';
                $ruta_elegida = 'PLANTILLAS/Trybit/VER/VerGastos.inc.php';
                break;
            case 'verproductos';
                $ruta_elegida = 'PLANTILLAS/Trybit/VER/VerProductos.inc.php';
                break;
            case 'verventas';
                $ruta_elegida = 'PLANTILLAS/Trybit/VER/VerVentas.inc.php';
                break;
        }
    }
}


include_once $ruta_elegida;