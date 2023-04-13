<?php
include_once 'APP/Contactos.class.php';

class RepoContactos{
    public static function insertar_contacto($conexion, $contacto){
        $contacto_insertado = false;
        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO trybit.contactos(id_contacto, NIT, nombre, telefono)
                VALUES (:id_contacto, :NIT, :nombre, :telefono)";

                $sentencia = $conexion-> prepare($sql);

                $id_contacto_temp = $contacto -> getIdContacto();
                $NIT_temp = $contacto -> getNIT();
                $nombre_temp = $contacto-> getNombre();
                $telefono_temp = $contacto-> getTelefono();

                $sentencia -> bindParam(':id_contacto', $id_contacto_temp , PDO::PARAM_STR);
                $sentencia -> bindparam(':NIT', $NIT_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':nombre', $nombre_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':telefono', $telefono_temp, PDO::PARAM_INT);

                $contacto_insertado = $sentencia -> execute();

            } catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
            }
        }
        return $contacto_insertado;
    }
}