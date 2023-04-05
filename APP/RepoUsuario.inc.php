<?php
include_once 'APP/Usuario.class.php';

class RepoUsuario
{
    //obtener el número total de usuarios en la base de datos
    public static function Obtener_numero_usuarios($conexion)
    {
        $total_usuarios = null;
        if (isset($conexion)) {
            try {
                $sql = "SELECT COUNT(*) AS total FROM trybit.usuarios";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();
                $total_usuarios = $resultado ['total'];
            } catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
            }
        }
        return $total_usuarios;
    }

    public static function Insertar_usuario($conexion, $usuario)
    {
        $usuario_insertado = false;

        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO trybit.usuarios(NIT, razon_social, correo, password, fecha_registro, estado)
                VALUES(:NIT , :razon_social, :correo, :password,NOW(), 0)";

                $sentencia = $conexion-> prepare($sql);

                $NIT = $usuario->getNIT();
                $nombre_temp = $usuario->getRazonSocial();
                $correo_temp = $usuario->getCorreo();
                $password_temp = $usuario->getPassword();

                $sentencia-> bindParam(':NIT', $NIT, PDO::PARAM_STR);
                $sentencia -> bindParam (':nombre', $nombre_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':correo', $correo_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':password', $password_temp, PDO::PARAM_STR);

                $usuario_insertado = $sentencia -> execute();

            } catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
            }
        } 
        return $usuario_insertado;
    }

    public static function obtener_usuario_por_email($conexion, $correo)
    {
        $usuario = null;

        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM trybit.usuarios WHERE correo = :correo";

                $sentencia = $conexion-> prepare($sql);
                $sentencia -> bindParam(':correo', $correo, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();

                if (!empty($resultado)) {
                    $usuario = new Usuario($resultado['NIT'],
                    $resultado['razon_social'],
                    $resultado['correo'],
                    $resultado['password'],
                    $resultado['fecha_registro'],
                    $resultado['estado'],);
                }
            } catch (PDOException $ex) {
                print 'ERROR' .$ex -> getMessage();
            }
        }
        return $usuario;

    }
    public static function obtener_usuario_por_NIT($conexion, $NIT)
    {
        $usuario = null;
        if (isset($NIT)) {
            try {
                $sql = "SELECT * FROM trybit.usuarios WHERE NIT = :NIT";

                $sentencia = $conexion-> prepare($sql);
                $sentencia -> bindParam(':NIT', $NIT, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();

                if (!empty($resultado)) {
                    $usuario = new Usuario($resultado['NIT'],
                        $resultado['razon_social'],
                        $resultado['correo'],
                        $resultado['password'],
                        $resultado['fecha_registro'],
                        $resultado['estado'],);
                }
            } catch (PDOException $ex) {
                print 'ERROR' .$ex -> getMessage();
            }
        }
        return $usuario;

    }
}
