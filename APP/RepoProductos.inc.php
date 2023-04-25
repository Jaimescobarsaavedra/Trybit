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

    public static function Obtener_productos_id($conexion, $NIT)
    {
        $productos = [];
        if (isset($conexion)){
            try {
                $sql = "SELECT * FROM trybit.productos WHERE NIT = :NIT ";

                $sentencia = $conexion->prepare($sql);
                $sentencia -> bindParam(':NIT', $NIT, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();

                if (count($resultado)){
                    foreach ($resultado as $fila){
                        $productos[] = new Productos($fila['id_producto'], $fila['NIT'], $fila['id_contactos'], $fila['nombre'], $fila['referencia'], $fila['descripcion'], $fila['cantidad'], $fila['precio'], $fila['fecha_entrada'], $fila['vencimiento']);
                    }
                }

            }catch (PDOException $ex){
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $productos;
    }

    public static function obtener_producto_id($conexion, $id_producto)
    {
        $productos = null;
        if (isset($conexion)){
            try {
                $sql = "SELECT * FROM trybit.productos WHERE id_producto = :id_producto";

                $setencia = $conexion->prepare($sql);
                $setencia->bindParam(':id_producto', $id_producto, PDO::PARAM_STR);
                $setencia->execute();
                $resultado = $setencia->fetch();

                if (!empty($resultado)) {
                    $productos = new Productos($resultado['id_producto'], $resultado['NIT'], $resultado['id_contactos'], $resultado['nombre'], $resultado['referencia'], $resultado['descripcion'], $resultado['cantidad'], $resultado['precio'], $resultado['fecha_entrada'], $resultado['vencimiento']);
                } else {
                    $productos = new Productos("0", "0", "0", "0", "0", "0", "0", "0", "0", "0");
                }
            }catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
            }
        }
        return $productos;
    }

    public static function Obtener_productos_seleccion($conexion, $NIT){
        $productos = [];
        if (isset($conexion)){
            try {
                $sql = "SELECT * FROM trybit.productos WHERE $NIT = :NIT";

                $setencia = $conexion->prepare($sql);
                $setencia->bindParam(':NIT', $NIT, PDO::PARAM_STR);
                $setencia->execute();
                $resultado = $setencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $productos[] = new Productos($fila['id_producto'], $fila['NIT'], $fila['id_contactos'], $fila['nombre'], $fila['referencia'], $fila['descripcion'], $fila['cantidad'], $fila['precio'], $fila['fecha_entrada'], $fila['vencimiento']);
                    }
                }
            }catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
            }
        }
        return $productos;
    }
}