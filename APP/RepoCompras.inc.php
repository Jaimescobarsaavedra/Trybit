<?php
include_once 'APP/Compras.class.php';

class RepoCompras{
    public static function insertar_compra($conexion, $compra ){
        $compra_insertada = false;
        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO trybit.productos(id_compra, NIT, id_contacto, id_producto, valor, cantidad, fecha_compra)
                VALUES(:id_compra, :NIT, :id_contacto, :id_producto, :valor, :cantidad, :fecha_compra)";

                $sentencia = $conexion-> prepare($sql);

                $id_compra_temp = $compra -> getIdCompra();
                $NIT_temp = $compra -> getNIT();
                $id_contacto_temp = $compra -> getIdContacto();
                $id_producto_temp = $compra -> getIdProducto();
                $valor_temp = $compra -> getValor();
                $cantidad_temp = $compra -> getCantidad();
                $fecha_compra_temp = $compra -> getFechaCompra();

                $sentencia -> bindParam(':id_compra', $id_compra_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':NIT', $NIT_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':id_contacto', $id_contacto_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':id_producto', $id_producto_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':valor', $valor_temp, PDO::PARAM_INT);
                $sentencia -> bindParam(':cantidad', $cantidad_temp, PDO::PARAM_INT);
                $sentencia -> bindParam(':fecha_compra', $fecha_compra_temp, PDO::PARAM_STR);

                $compra_insertada = $sentencia -> execute();

            } catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
            }
        }
        return $compra_insertada;
    }
}