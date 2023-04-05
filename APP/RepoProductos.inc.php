<?php

include_once 'APP/config.inc.php';
include_once  'APP/Conexion.inc.php';
include_once  'APP/Productos.class.php';

class RepoProductos{

    public static function insetar_producto($conexion, $NIT, $producto, $id_producto){
        $producto_insertado = false;

        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO trybit.productos(id_producto, nombre, referencia, descripcion, cantidad, precio, fecha_entrada, vencimiento)
            VALUES(:id_producto , :nombre, :referencia, :descripcion, :cantidad, :precio, :fecha_entrada, :vencimiento)";

                $sentencia = $conexion-> prepare($sql);

                $sentencia-> bindParam(':id_producto', $id_producto, PDO::PARAM_STR);
                $sentencia-> bindParam(':NIT', $NIT, PDO::PARAM_STR);
                $sentencia -> bindParam (':nombre', $producto -> getNombre(), PDO::PARAM_STR);
                $sentencia -> bindParam(':referencia', $producto-> getReferencia(), PDO::PARAM_STR);
                $sentencia -> bindParam(':descripcion', $producto-> getDescripcion(), PDO::PARAM_STR);
                $sentencia -> bindParam(':cantidad', $producto-> getCantidad(), PDO::PARAM_INT);
                $sentencia -> bindParam(':precio', $producto-> getPrecio(), PDO::PARAM_INT);
                $sentencia -> bindParam(':fecha_entrada', $producto-> getFechaEntrada(), PDO::PARAM_INT);
                $sentencia -> bindParam(':vencimiento', $producto-> getVencimiento(), PDO::PARAM_INT);

                $producto_insertado = $sentencia -> execute();

            } catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
            }
        }
        return $producto_insertado;
    }
}