<?php
include_once 'APP/Usuario.class.php';

class RepoUsuario
{
    //obtener la cuenta de usuarios obteniendolos todos
    public static function Obtener_users($conexion)
    {
        $usuarios = array();
        if (isset($conexion)) {
            try {
                include_once 'Usuario.class.php';
                //Consulta SQL
                $sql = "SELECT * FROM trybit.usuarios";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchALL();
                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $usuarios[] = new Usuario($fila[$id], $fila[$nombre], $fila[$correo], $fila[$contraseña], $fila[$rol], $fila[$fecha_registro], $fila[$activo], $fila[$tipo_usuario], );
                    }
                }else {
                    print "No hay usuarios inscritos";
                }
            } catch (PDOException $ex) {
                print "ERROR " . $ex -> getMessage();
            }
        }
        return $usuarios;
    }
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

    public static function Insertar_usuario($conexion, $usuario, $id)
    {
        $usuario_insertado = false;

        if (isset($conexion)) {
            try {
                include_once 'APP/Usuario.class.php';
                $sql = "INSERT INTO trybit.usuarios(id, nombre, correo, password, rol, fecha_registro, estado)
                VALUES(:id , :nombre, :correo, :password, '', NOW(), 0)";

                $sentencia = $conexion-> prepare($sql);

                $nombre_temp = $usuario->obtener_nombre();
                $correo_temp = $usuario->obtener_correo();
                $password_temp = $usuario->obtener_contrasena();

                $sentencia-> bindParam(':id', $id, PDO::PARAM_STR);
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
                $sql = "SELECT * FROM usuarios WHERE correo = :correo";

                $sentencia = $conexion-> prepare($sql);
                $sentencia -> bindParam(':correo', $correo, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();

                if (!empty($resultado)) {
                    $usuario = new Usuario($resultado['id'],
                    $resultado['nombre'],
                    $resultado['correo'],
                    $resultado['password'],
                    $resultado['rol'],
                    $resultado['fecha_registro'],
                    $resultado['estado'],);
                }
            } catch (PDOException $ex) {
                print 'ERROR' .$ex -> getMessage();
            }
        } else {
            # code...
        }
        return $usuario;

    }
}

?>