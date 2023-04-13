<?php
include_once  'APP/Productos.class.php';

class RepoProductos{
    public static function insetar_producto($conexion, $producto){
        $producto_insertado = false;

        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO trybit.productos(id_producto, NIT, id_contactos, nombre, referencia, descripcion, cantidad, precio, fecha_entrada, vencimiento)
                VALUES(:id_producto, :NIT, :id_contactos, :nombre, :referencia, :descripcion, :cantidad, :precio, :fecha_entrada, :vencimiento)";

                $sentencia = $conexion-> prepare($sql);

                $id_producto_temp = $producto -> getIdProducto();
                $NIT_temp = $producto -> getNIT();
                $id_contactos_temp = $producto -> getIdContactos();
                $nombre_temp = $producto -> getNombre();
                $referencia_temp = $producto-> getReferencia();
                $descripcion_temp = $producto-> getDescripcion();
                $cantidad_temp = $producto-> getCantidad();
                $precio_temp = $producto-> getPrecio();
                $fecha_temp = $producto-> getFechaEntrada();
                $vencimiento_temp = $producto-> getVencimiento();

                $sentencia -> bindParam(':id_producto', $id_producto_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':NIT', $NIT_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':id_contactos', $id_contactos_temp, PDO::PARAM_STR);
                $sentencia -> bindParam (':nombre', $nombre_temp , PDO::PARAM_STR);
                $sentencia -> bindParam(':referencia', $referencia_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':descripcion', $descripcion_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':cantidad', $cantidad_temp, PDO::PARAM_INT);
                $sentencia -> bindParam(':precio', $precio_temp, PDO::PARAM_INT);
                $sentencia -> bindParam(':fecha_entrada', $fecha_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':vencimiento',$vencimiento_temp , PDO::PARAM_STR);

                $producto_insertado = $sentencia -> execute();

            } catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
            }
        }
        return $producto_insertado;
    }
}