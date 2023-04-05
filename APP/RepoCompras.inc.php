<?php
include_once 'APP/Compras.class.php';

class RepoCompras{
    public static function insetar_compra($conexion, $NIT, $compra,$id ){
        $compra_insertada = false;

        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO trybit.productos(id_compra, NIT, id_contacto, id_producto, valor, cantidad, fecha_compra)
            VALUES(:id_compra, :NIT, :id_contacto, :id_producto, :valor, :cantidad, :fecha_compra)";

                $sentencia = $conexion-> prepare($sql);

                $sentencia = bindParam(':id_compra', $id, PDO::PARAM_STR);
                $sentencia = bindParam(':NIT', $NIT, PDO::PARAM_STR);
                $sentencia -> bindParam(':id_contacto', $compra-> getIdContacto(), PDO::PARAM_STR);
                $sentencia -> bindParam(':id_producto', $compra-> getIdProducto(), PDO::PARAM_STR);
                $sentencia -> bindParam(':valor', $compra-> getValor(), PDO::PARAM_INT);
                $sentencia -> bindParam(':cantidad', $compra-> getCantidad(), PDO::PARAM_INT);
                $sentencia -> bindParam(':fecha_compra', $compra-> getFechaCompra(), PDO::PARAM_STR);

                $compra_insertada = $sentencia -> execute();

            } catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
            }
        }
        return $compra_insertada;
    }
}