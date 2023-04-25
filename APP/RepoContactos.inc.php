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

    public static function Obtener_contactos_id($conexion, $NIT)
    {
        $contactos = [];
        if (isset($conexion)){
            try {
                $sql = "SELECT * FROM trybit.contactos WHERE NIT = :NIT ";

                $sentencia = $conexion->prepare($sql);
                $sentencia -> bindParam(':NIT', $NIT, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();

                if (count($resultado)){
                    foreach ($resultado as $fila){
                        $contactos[] = new Contactos($fila['id_contacto'], $fila['NIT'], $fila['nombre'], $fila['telefono']);
                    }
                }

            }catch (PDOException $ex){
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $contactos;
    }

    public static function obtener_contacto_id($conexion, $id_contacto)
    {
        $contacto = null;
        if (isset($conexion)){
            try {
                $sql = "SELECT * FROM trybit.contactos WHERE id_contacto = :id_contacto";

                $setencia = $conexion->prepare($sql);
                $setencia->bindParam(':id_contacto', $id_contacto, PDO::PARAM_STR);
                $setencia->execute();
                $resultado = $setencia->fetch();

                if (!empty($resultado)) {
                    $contacto = new Contactos($resultado['id_contacto'], $resultado['NIT'], $resultado['nombre'], $resultado['telefono']);
                } else {
                    $contacto = new Contactos("0", "0", "0", "0");
                }
            }catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
            }
        }
        return $contacto;
    }

    public static function Obtener_contactos_seleccion($conexion, $NIT){
        $contacto = [];
        if (isset($conexion)){
            try {
                $sql = "SELECT * FROM trybit.contactos WHERE $NIT = :NIT";

                $setencia = $conexion->prepare($sql);
                $setencia->bindParam(':NIT', $NIT, PDO::PARAM_STR);
                $setencia->execute();
                $resultado = $setencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $contacto[] = new Contactos($fila['id_contacto'], $fila['NIT'], $fila['nombre'], $fila['telefono']);
                    }
                }
            }catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
            }
        }
        return $contacto;
    }
}