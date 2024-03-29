<?php
include_once 'APP/Contactos.class.php';
include_once 'APP/Compras.class.php';
include_once 'APP/Productos.class.php';
include_once 'APP/RepoProductos.inc.php';
include_once 'APP/RepoReportes.inc.php';
include_once 'APP/RepoCompras.inc.php';
include_once 'APP/RepoContactos.inc.php';

class RepoEscribirDatos{
    public static function escribir_mis_compras()
    {
        $i = 1;
        $compras = RepoCompras::Obtener_compras_id(conexion::obtener_conexion(), $_SESSION['NIT']);
        if (count($compras)) {
            foreach ($compras as $compra) {
                $indice = $i;
                self::escribir_mi_compra($compra, $indice);
                $i++;
            }
        }
    }

    public static function escribir_mi_compra($compra, $indice)
    {
        if (!isset($compra)) {
            return;
        }

        $contacto = RepoContactos::obtener_contacto_id(conexion::obtener_conexion(), $compra-> getIdContacto());
        $producto = RepoProductos::obtener_producto_id(conexion::obtener_conexion(), $compra-> getIdProducto());

        ?>
        <tr class="trbody">
            <td><?php echo $indice ?></td>
            <td><?php echo $contacto -> getNombre() ?></td>
            <td><?php echo $producto -> getNombre() ?></td>
            <td>$<?php echo number_format(intval($compra-> getValor()), 0, ",", ".") ?></td>
            <td><?php echo $compra -> getCantidad()?></td>
            <td><?php echo $compra -> getFechaCompra()?></td>
        </tr>
        <?php
    }

    public static function escribir_mis_contactos()
    {
        $i = 1;
        $contactos = RepoContactos::Obtener_contactos_id(conexion::obtener_conexion(), $_SESSION['NIT']);
        if (count($contactos)) {
            foreach ($contactos as $contacto) {
                $indice = $i;
                self::escribir_mi_contacto($contacto, $indice);
                $i++;
            }
        }
    }

    public static function escribir_mi_contacto($contacto, $indice)
    {
        if (!isset($contacto)) {
            return;
        }

        ?>
        <tr class="trbody">
            <td><?php echo $indice ?></td>
            <td><?php echo $contacto -> getNombre() ?></td>
            <td><?php echo $contacto -> getTelefono() ?></td>
        </tr>
        <?php
    }

    public static function escribir_mis_gastos()
    {
        $i = 1;
        $gastos = RepoGastos::Obtener_gastos_id(conexion::obtener_conexion(), $_SESSION['NIT']);
        if (count($gastos)) {
            foreach ($gastos as $gasto) {
                $indice = $i;
                self::escribir_mi_gasto($gasto, $indice);
                $i++;
            }
        }
    }

    public static function escribir_mi_gasto($gasto, $indice)
    {
        if (!isset($gasto)) {
            return;
        }
        ?>
        <tr class="trbody">
            <td><?php echo $indice ?></td>
            <td><?php echo $gasto -> getConcepto() ?></td>
            <td><?php echo $gasto -> getFechaGastos() ?></td>
            <td>$<?php echo number_format(intval($gasto->getValor()), 0, ",", ".")  ?></td>
            <td><?php echo $gasto -> getCategoria() ?></td>
        </tr>
        <?php
    }
    public static function escribir_mis_productos()
    {
        $i = 1;
        $productos = RepoProductos::Obtener_productos_id(conexion::obtener_conexion(), $_SESSION['NIT']);
        if (count($productos)) {
            foreach ($productos as $producto) {
                $indice = $i;
                self::escribir_mi_producto($producto, $indice);
                $i++;
            }
        }
    }

    public static function escribir_mi_producto($producto, $indice)
    {
        if (!isset($producto)) {
            return;
        }

        $contacto = RepoContactos::obtener_contacto_id(conexion::obtener_conexion(), $producto-> getIdContactos());
        ?>
        <tr class="trbody">
            <td><?php echo $indice ?></td>
            <td><?php echo $contacto -> getNombre() ?></td>
            <td><?php echo $producto -> getNombre() ?></td>
            <td><?php echo $producto -> getReferencia() ?></td>
            <td><?php echo $producto -> getDescripcion() ?></td>
            <td><?php echo $producto -> getCantidad() ?></td>
            <td>$<?php echo number_format(intval($producto->getPrecio()), 0, ",", ".")  ?></td>
            <td><?php echo $producto -> getFechaEntrada() ?></td>
            <td><?php echo $producto -> getVencimiento() ?></td>
        </tr>
        <?php
    }

    public static function escribir_mis_ventas()
    {
        $i = 1;
        $ventas = RepoVentas::Obtener_ventas_id(conexion::obtener_conexion(), $_SESSION['NIT']);
        if (count($ventas)) {
            foreach ($ventas as $venta) {
                $indice = $i;
                self::escribir_mi_venta($venta, $indice);
                $i++;
            }
        }
    }

    public static function escribir_mi_venta($venta, $indice)
    {
        if (!isset($venta)) {
            return;
        }
        $producto = RepoProductos::obtener_producto_id(conexion::obtener_conexion(), $venta-> getIdProducto());
        ?>
        <tr class="trbody">
            <td><?php echo $indice ?></td>
            <td><?php echo $producto -> getNombre() ?></td>
            <td><?php echo $venta -> getCantidad() ?></td>
            <td><?php echo $venta -> getFecha() ?></td>
            <td>$<?php echo number_format(intval($venta -> getTotal()), 0, ",", ".")  ?></td>
            <td><?php echo $venta -> getModoPago() ?></td>
            <td><?php echo $venta -> getEstatus() ?></td>
        </tr>
        <?php
    }
    public static function escribir_mis_ventas_recientes_hoy()
    {
        $i = 1;
        $ventas = RepoVentas::Obtener_ultimas_ventas_id_hoy(conexion::obtener_conexion(), $_SESSION['NIT']);
        if (count($ventas)) {
            foreach ($ventas as $venta) {
                $indice = $i;
                self::escribir_mi_venta_reciente($venta, $indice);
                $i++;
            }
        }
    }
    public static function escribir_mis_ventas_recientes_mes()
    {
        $i = 1;
        $ventas = RepoVentas::Obtener_ultimas_ventas_id_mes(conexion::obtener_conexion(), $_SESSION['NIT']);
        if (count($ventas)) {
            foreach ($ventas as $venta) {
                $indice = $i;
                self::escribir_mi_venta_reciente($venta, $indice);
                $i++;
            }
        }
    }
    public static function escribir_mis_ventas_recientes_ano()
    {
        $i = 1;
        $ventas = RepoVentas::Obtener_ultimas_ventas_id_ano(conexion::obtener_conexion(), $_SESSION['NIT']);
        if (count($ventas)) {
            foreach ($ventas as $venta) {
                $indice = $i;
                self::escribir_mi_venta_reciente($venta, $indice);
                $i++;
            }
        }
    }

    public static function escribir_mi_venta_reciente($venta, $indice)
    {
        if (!isset($venta)) {
            return;
        }

        $producto = RepoProductos::obtener_producto_id(conexion::obtener_conexion(), $venta-> getIdProducto());

        ?>
        <tr class="trbody">
            <td><?php echo $indice ?></td>
            <td><?php echo $producto -> getNombre() ?></td>
            <td><?php echo $venta -> getCantidad() ?></td>
            <td><?php echo $venta -> getFecha() ?></td>
            <td>$<?php echo number_format(intval($venta -> getTotal()), 0, ",", ".")  ?></td>
            <td><?php echo $venta -> getModoPago() ?></td>
            <td><?php echo $venta -> getEstatus() ?></td>
        </tr>
        <?php
    }
    public static function escribir_mis_ventas_altas_hoy()
    {
        $i = 1;
        $ventas = RepoVentas::Obtener_ventas_altas_id_hoy(conexion::obtener_conexion(), $_SESSION['NIT']);
        if (count($ventas)) {
            foreach ($ventas as $venta) {
                $indice = $i;
                self::escribir_mi_venta_alta($venta, $indice);
                $i++;
            }
        }
    }
    public static function escribir_mis_ventas_altas_mes()
    {
        $i = 1;
        $ventas = RepoVentas::Obtener_ventas_altas_id_mes(conexion::obtener_conexion(), $_SESSION['NIT']);
        if (count($ventas)) {
            foreach ($ventas as $venta) {
                $indice = $i;
                self::escribir_mi_venta_alta($venta, $indice);
                $i++;
            }
        }
    }
    public static function escribir_mis_ventas_altas_ano()
    {
        $i = 1;
        $ventas = RepoVentas::Obtener_ventas_altas_id_ano(conexion::obtener_conexion(), $_SESSION['NIT']);
        if (count($ventas)) {
            foreach ($ventas as $venta) {
                $indice = $i;
                self::escribir_mi_venta_alta($venta, $indice);
                $i++;
            }
        }
    }
    public static function escribir_mi_venta_alta($venta, $indice)
    {
        if (!isset($venta)) {
            return;
        }

        $producto = RepoProductos::obtener_producto_id(conexion::obtener_conexion(), $venta-> getIdProducto());

        ?>
        <tr class="trbody">
            <td><?php echo $indice ?></td>
            <td><?php echo $producto -> getNombre() ?></td>
            <td><?php echo $venta -> getCantidad() ?></td>
            <td><?php echo $venta -> getFecha() ?></td>
            <td>$<?php echo number_format(intval($venta -> getTotal()), 0, ",", ".")  ?></td>
            <td><?php echo $venta -> getModoPago() ?></td>
            <td><?php echo $venta -> getEstatus() ?></td>
        </tr>
        <?php
    }

    public static function escribir_contactos_seleccion(){
        $contactos = RepoContactos::Obtener_contactos_seleccion(Conexion::obtener_conexion(), $_SESSION['NIT']);
        if (count($contactos)) {
            foreach ($contactos as $contacto) {
                self::escribir_por_contacto($contacto);
            }
        }
    }
    public static function escribir_por_contacto($contacto)
    {
        if (!isset($contacto)) {
            return;
        }
        ?>
        <option value="<?php echo $contacto->getIdContacto() ?>"><?php echo $contacto->getNombre() ?></option>
        <?php
    }
    public static function escribir_productos_seleccion(){
        $productos = RepoProductos::Obtener_productos_seleccion(conexion::obtener_conexion(), $_SESSION['NIT']);
        if (count($productos)) {
            foreach ($productos as $producto) {
                self::escribir_por_producto($producto);
            }
        }
    }
    public static function escribir_por_producto($producto){
        if (!isset($producto)) {
            return;
        }
        ?>
        <option value="<?php echo $producto->getIdProducto() ?>"><?php echo $producto->getNombre() ?></option>
        <?php
    }
    public static function escribir_categoria_grafica_gastos_hoy(){
        $resultado = RepoReportes::reporte_categoria_gastos_hoy(conexion::obtener_conexion(), $_SESSION['NIT']);
        $array = [];
        foreach ($resultado as $resultadito) {
            $array[] = $resultadito["categoria"];
        }
        $json = json_encode($array);

        return $json;
    }
    public static function escribir_categoria_grafica_gastos_mes(){
        $resultado = RepoReportes::reporte_categoria_gastos_mes(conexion::obtener_conexion(), $_SESSION['NIT']);
        $array = [];
        foreach ($resultado as $resultadito) {
            $array[] = $resultadito["categoria"];
        }
        $json = json_encode($array);

        return $json;
    }
    public static function escribir_categoria_grafica_gastos_ano(){
        $resultado = RepoReportes::reporte_categoria_gastos_ano(conexion::obtener_conexion(), $_SESSION['NIT']);
        $array = [];
        foreach ($resultado as $resultadito) {
            $array[] = $resultadito["categoria"];
        }
        $json = json_encode($array);

        return $json;
    }
    public static function escribir_cuenta_grafica_gastos_hoy(){
        $resultado = RepoReportes::reporte_categoria_gastos_hoy(conexion::obtener_conexion(), $_SESSION['NIT']);
        $array = [];
        foreach ($resultado as $resultadito) {
            $array[] = $resultadito["num_gastos"];
        }
        $json = json_encode($array);

        return $json;
    }
    public static function escribir_cuenta_grafica_gastos_mes(){
        $resultado = RepoReportes::reporte_categoria_gastos_mes(conexion::obtener_conexion(), $_SESSION['NIT']);
        $array = [];
        foreach ($resultado as $resultadito) {
            $array[] = $resultadito["num_gastos"];
        }
        $json = json_encode($array);

        return $json;
    }
    public static function escribir_cuenta_grafica_gastos_ano(){
        $resultado = RepoReportes::reporte_categoria_gastos_ano(conexion::obtener_conexion(), $_SESSION['NIT']);
        $array = [];
        foreach ($resultado as $resultadito) {
            $array[] = $resultadito["num_gastos"];
        }
        $json = json_encode($array);

        return $json;
    }
    public static function escribir_producto_grafica_ventas_ano(){
        $resultado = RepoReportes::reporte_cantidad_ventas_producto_ano(conexion::obtener_conexion(), $_SESSION['NIT']);
        $array = [];
        foreach ($resultado as $resultadito) {
            $array[] = $resultadito["nombre"];
        }
        $json = json_encode($array);

        return $json;
    }
    public static function escribir_cantidad_producto_grafica_ventas_hoy(){
        $resultado = RepoReportes::reporte_cantidad_ventas_producto_hoy(conexion::obtener_conexion(), $_SESSION['NIT']);
        $array = [];
        foreach ($resultado as $resultadito) {
            $array[] = $resultadito["cant_producto"];
        }
        $json = json_encode($array);

        return $json;
    }
    public static function escribir_cantidad_producto_grafica_ventas_mes(){
        $resultado = RepoReportes::reporte_cantidad_ventas_producto_mes(conexion::obtener_conexion(), $_SESSION['NIT']);
        $array = [];
        foreach ($resultado as $resultadito) {
            $array[] = $resultadito["cant_producto"];
        }
        $json = json_encode($array);

        return $json;
    }
    public static function escribir_cantidad_producto_grafica_ventas_ano(){
        $resultado = RepoReportes::reporte_cantidad_ventas_producto_ano(conexion::obtener_conexion(), $_SESSION['NIT']);
        $array = [];
        foreach ($resultado as $resultadito) {
            $array[] = $resultadito["cant_producto"];
        }
        $json = json_encode($array);

        return $json;
    }
    public static function escribir_cantidad_producto_grafica_compras_hoy(){
        $resultado = RepoReportes::reporte_cantidad_compras_producto_hoy(conexion::obtener_conexion(), $_SESSION['NIT']);
        $array = [];
        foreach ($resultado as $resultadito) {
            $array[] = $resultadito["cant_producto"];
        }
        $json = json_encode($array);

        return $json;
    }
    public static function escribir_cantidad_producto_grafica_compras_mes(){
        $resultado = RepoReportes::reporte_cantidad_compras_producto_mes(conexion::obtener_conexion(), $_SESSION['NIT']);
        $array = [];
        foreach ($resultado as $resultadito) {
            $array[] = $resultadito["cant_producto"];
        }
        $json = json_encode($array);

        return $json;
    }
    public static function escribir_cantidad_producto_grafica_compras_ano(){
        $resultado = RepoReportes::reporte_cantidad_compras_producto_ano(conexion::obtener_conexion(), $_SESSION['NIT']);
        $array = [];
        foreach ($resultado as $resultadito) {
            $array[] = $resultadito["cant_producto"];
        }
        $json = json_encode($array);

        return $json;
    }

}