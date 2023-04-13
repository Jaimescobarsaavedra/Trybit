<?php
include_once 'PLANTILLAS/Trybit/Default/HeadYMenu.inc.php';
$Modulo = $_GET['name'];
do{
    if (isset($Modulo) && !empty($Modulo)){
        if ($Modulo == 'AgregarCompras'){
            include_once 'PLANTILLAS/Trybit/AGREGAR/AgregarCompras.inc.php';
        }elseif ($Modulo == 'AgregarContactos'){
            include_once 'PLANTILLAS/Trybit/AGREGAR/AgregarContactos.inc.php';
        }elseif ($Modulo == 'AgregarGastos'){
            include_once 'PLANTILLAS/Trybit/AGREGAR/AgregarGastos.inc.php';
        }elseif ($Modulo == 'AgregarProductos'){
            include_once 'PLANTILLAS/Trybit/AGREGAR/AgregarProductos.inc.php';
        }elseif ($Modulo == 'AgregarVentas'){
            include_once 'PLANTILLAS/Trybit/AGREGAR/AgregarVentas.inc.php';
        }elseif ($Modulo == 'EditarCompras'){
            include_once 'PLANTILLAS/Trybit/EDITAR/EditarCompras.inc.php';
        }elseif ($Modulo == 'EditarContactos'){
            include_once 'PLANTILLAS/Trybit/EDITAR/EditarContactos.inc.php';
        }elseif ($Modulo == 'EditarGastos'){
            include_once 'PLANTILLAS/Trybit/EDITAR/EditarGastos.inc.php';
        }elseif ($Modulo == 'EditarPerfil'){
            include_once 'PLANTILLAS/Trybit/EDITAR/EditarPerfil.inc.php';
        }elseif ($Modulo == 'EditarProductos'){
            include_once 'PLANTILLAS/Trybit/EDITAR/EditarProductos.inc.php';
        }elseif ($Modulo == 'EditarVentas'){
            include_once 'PLANTILLAS/Trybit/EDITAR/EditarVentas.inc.php';
        }elseif ($Modulo == 'EliminarCompras'){
            include_once 'PLANTILLAS/Trybit/ELIMINAR/EliminarCompra.inc.php';
        }elseif ($Modulo == 'EliminarContactos'){
            include_once 'PLANTILLAS/Trybit/ELIMINAR/EliminarContacto.inc.php';
        }elseif ($Modulo == 'EliminarGastos'){
            include_once 'PLANTILLAS/Trybit/ELIMINAR/EliminarGasto.inc.php';
        }elseif ($Modulo == 'EliminarProductos'){
            include_once 'PLANTILLAS/Trybit/ELIMINAR/EliminarProducto.inc.php';
        }elseif ($Modulo == 'EliminarVentas'){
            include_once 'PLANTILLAS/Trybit/ELIMINAR/EliminarVenta.inc.php';
        }elseif ($Modulo == 'VerCompras'){
            include_once 'PLANTILLAS/Trybit/REPORTE/VerCompras.inc.php';
        }elseif ($Modulo == 'VerContabilidad'){
            include_once 'PLANTILLAS/Trybit/REPORTE/VerContabilidad.inc.php';
        }elseif ($Modulo == 'VerContactos'){
            include_once 'PLANTILLAS/Trybit/REPORTE/VerContactos.inc.php';
        }elseif ($Modulo == 'VerGastos'){
            include_once 'PLANTILLAS/Trybit/REPORTE/VerGastos.inc.php';
        }elseif ($Modulo == 'VerPerfil'){
            include_once 'PLANTILLAS/Trybit/REPORTE/VerPerfil.inc.php';
        }elseif ($Modulo == 'VerPreguntas'){
            include_once 'PLANTILLAS/Trybit/REPORTE/VerPreguntas.inc.php';
        }elseif ($Modulo == 'VerProductos'){
            include_once 'PLANTILLAS/Trybit/REPORTE/VerProductos.inc.php';
        }elseif ($Modulo == 'VerVentas'){
            include_once 'PLANTILLAS/Trybit/REPORTE/VerVentas.inc.php';
        }elseif ($Modulo == ''){
            include_once 'PLANTILLAS/Trybit/Default/MainDefault.inc.php';
        }
    }else{
        include_once 'PLANTILLAS/Trybit/Default/MainDefault.inc.php';
    }
}while($Modulo == 'Logout');

include_once 'PLANTILLAS/Trybit/Default/FooterMenu.inc.php';
?>
