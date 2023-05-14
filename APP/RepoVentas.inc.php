<?php
include_once 'APP/Ventas.class.php';
include_once 'APP/RepoProductos.inc.php';
include_once 'APP/Productos.class.php';

class RepoVentas{
    public static function insetar_ventas($conexion, $venta){
        $venta_insertada = false;

        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO trybit.ventas(id_venta, NIT, id_producto, cantidad, fecha, total, modo_pago, estatus, num_pago)
                VALUES(:id_venta, :NIT, :id_producto, :cantidad, :fecha, :total, :modo_pago, :estatus, :num_pago)";

                $sentencia = $conexion-> prepare($sql);

                $producto = RepoProductos::obtener_producto_id(conexion::obtener_conexion(), $venta-> getIdProducto());

                $id_venta_temp = $venta -> getIdVenta();
                $NIT_temp = $venta -> getNIT();
                $id_producto_temp = $venta -> getIdProducto();
                $cantidad_temp = $venta -> getCantidad();
                $fecha_temp = $venta-> getFecha();
                $total_temp = $producto ->getPrecio() * $cantidad_temp;
                $modo_pago_temp = $venta-> getModoPago();
                $estatus_temp = $venta-> getEstatus();
                $num_pago_temp = $venta -> getNumPago();

                $sentencia -> bindParam(':id_venta', $id_venta_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':NIT', $NIT_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':id_producto', $id_producto_temp, PDO::PARAM_STR);
                $sentencia -> bindParam (':cantidad', $cantidad_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':fecha', $fecha_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':total', $total_temp, PDO::PARAM_INT);
                $sentencia -> bindParam(':modo_pago', $modo_pago_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':estatus', $estatus_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':num_pago', $num_pago_temp, PDO::PARAM_INT);

                $venta_insertada = $sentencia -> execute();

            } catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
            }
        }
        return $venta_insertada;
    }

    public static function Obtener_ventas_id($conexion, $NIT)
    {
        $ventas = [];
        if (isset($conexion)){
            try {
                $sql = "SELECT * FROM trybit.ventas WHERE NIT = :NIT ";

                $sentencia = $conexion->prepare($sql);
                $sentencia -> bindParam(':NIT', $NIT, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();

                if (count($resultado)){
                    foreach ($resultado as $fila){
                        $ventas[] = new Ventas($fila['id_venta'], $fila['NIT'], $fila['id_producto'], $fila['cantidad'], $fila['fecha'], $fila['total'], $fila['modo_pago'], $fila['estatus'], $fila['num_pago']);
                    }
                }

            }catch (PDOException $ex){
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $ventas;
    }
}