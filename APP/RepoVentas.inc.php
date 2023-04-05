<?php
include_once 'APP/Ventas.class.php';

class RepoVentas
{
    public static function insetar_ventas($conexion, $NIT, $venta, $id_venta, $num_pago){
        $venta_insertada = false;

        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO trybit.ventas(id_venta, NIT, id_producto, cantidad, fecha, total, modo_pago, estatus, num_pago)
            VALUES(:id_venta , :NIT, :id_producto, :cantidad, :fecha, :total, :modo_pago, :estatus, :num_pago)";

                $sentencia = $conexion-> prepare($sql);

                $sentencia = bindParam(':id_venta', $id_venta, PDO::PARAM_STR);
                $sentencia = bindParam(':NIT', $NIT, PDO::PARAM_STR);
                $sentencia -> bindParam(':id_producto', $venta -> getIdProducto(), PDO::PARAM_STR);
                $sentencia -> bindParam (':cantidad', $venta -> getCantidad(), PDO::PARAM_STR);
                $sentencia -> bindParam(':fecha', $venta-> getFecha(), PDO::PARAM_STR);
                $sentencia -> bindParam(':total', $venta-> getTotal(), PDO::PARAM_STR);
                $sentencia -> bindParam(':modo_pago', $venta-> getModoPago(), PDO::PARAM_INT);
                $sentencia -> bindParam(':estatus', $venta-> getEstatus(), PDO::PARAM_INT);
                $sentencia = bindParam(':num_pago', $num_pago, PDO::PARAM_INT);

                $venta_insertada = $sentencia -> execute();

            } catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
            }
        }
        return $venta_insertada;
    }
}