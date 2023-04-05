<?php
include_once 'APP/Contactos.class.php';

class RepoContactos{
    public static function insertar_contacto($conexion, $NIT, $contacto,$id ){
        $contacto_insertado = false;

        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO trybit.contactos(id_contacto, NIT, id_productos, nombre, telefono, proveedor)
                VALUES (:id_contacto, :NIT, :id_productos, :nombre, :telefono, :proveedor)";

                $sentencia = $conexion-> prepare($sql);

                $sentencia = bindParam(':id_contacto', $id, PDO::PARAM_STR);
                $sentencia = bindparam(':NIT', $NIT, PDO::PARAM_STR);
                $sentencia -> bindParam(':id_producto', $contacto-> getIdProducto(), PDO::PARAM_STR);
                $sentencia -> bindParam(':nombre', $contacto-> getNombre(), PDO::PARAM_INT);
                $sentencia -> bindParam(':telefono', $contacto-> getTelefono(), PDO::PARAM_INT);
                $sentencia -> bindParam(':proveedor', $contacto-> getProveedor(), PDO::PARAM_STR);

                $contacto_insertado = $sentencia -> execute();

            } catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
            }
        }
        return $contacto_insertado;
    }
}