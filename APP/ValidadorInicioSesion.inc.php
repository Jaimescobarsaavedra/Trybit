<?php
include_once 'RepoUsuario.inc.php';

class validadorInicioSesion
{
    private $usuario, $error;

    public function __construct($correo, $password, $conexion)
    {
        $this-> error = "";
        if (!$this-> variable_iniciada($correo)|| !$this->variable_iniciada($password)) {
            $this-> usuario = null;
            $this-> error = "debes introducir tu correo y tu contraseña";
        }else {
            $this->usuario = RepoUsuario :: obtener_usuario_por_email($conexion, $correo);
            if (is_null($this->usuario)|| !password_verify($password, $this->usuario->getPassword())) {
                $this->error = "datos incorrectos";
            }
        }
    }

    private function variable_iniciada($variable)
    {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }
    public function obtener_usuario()
    {
        return $this->usuario;
    }
    public function obtener_error()
    {
        return $this-> error;
    }
    public function mostrar_error()
    {
        if ($this->error !== '') {
            $print_error = "<br><div class='invalid-feedback'>". $this->error.  "</div><br>";
        }
        return $print_error;
    }
}


?>