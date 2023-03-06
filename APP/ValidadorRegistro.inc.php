<?php

use JetBrains\PhpStorm\Internal\ReturnTypeContract;

class validadorRegistro{
    #Variables
    private $nombre;
    private $correo;

    private $aviso_inicio;
    private $aviso_cierre;
    private $password;

    private $error_nombre;
    private $error_correo;
    private $error_password;
    private $error_password2;
    
    #Constructor
    public function __construct($nombre, $correo, $password, $password2)
    {
        $this-> aviso_inicio = "<div class='invalid-feedback'>";
        $this-> aviso_cierre = "</div>";

        $this-> nombre = "";
        $this-> correo = "";
        $this-> password = "";

        $this-> error_nombre = $this-> validar_nombre($nombre);
        $this-> error_correo = $this-> validar_correo($correo);
        $this-> error_password = $this-> validar_clave($password);
        $this-> error_password2 = $this-> validar_clave2($password, $password2);

        if ($this-> error_password === "" && $this-> error_password2 === "") {
            $this-> password = $password;
        }
    }

    #Metodos privados
    private function variable_iniciada($variable)
    {
        if (isset($variable)&& !empty($variable)) {
            return true;
        }else {
            return false;
        }
    }
    private function validar_nombre($nombre)
    {
        if (!$this->variable_iniciada($nombre)) {
            return "No digitaste tu nombre, hazlo en la casilla de arriba.";
        } else {
            $this->nombre = $nombre;
        }
        return "";
    }
    private function validar_correo($correo)
    {
        if (!$this->variable_iniciada($correo)) {
            return "No digitaste tu correo, hazlo en la casilla de arriba.";
        }else {
            $this-> correo = $correo;
        }
        return "";
    }
    private function validar_clave($password)
    {
        if (!$this-> variable_iniciada($password)) {
            return "No digitaste tu contraseña, hazlo en la casilla de arriba.";
        }
        return "";
    }
    private function validar_clave2($password, $password2)
    {
        if (!$this-> variable_iniciada($password)) {
            return "Primero debes digitar tu clave en el campo superior.";
        }

        if (!$this->variable_iniciada($password2)) {
            return "No repetiste tu contraseña, hazlo en la casilla de arriba.";
        }

        if ($password != $password2) {
            return "las contraseñas no coinsiden, repite el proceso.";
        }
        return "";
    }

    #Metodos getters
    public function obtener_nombre()
    {
        return $this-> nombre;
    }
    public function obtener_correo()
    {
        return $this-> correo;
    }
    public function obtener_password()
    {
        return $this-> password;
    }
    public function obtener_error_nombre()
    {
        return $this-> error_nombre;
    }
    public function obtener_error_correo()
    {
        return $this-> error_correo;
    }
    public function obtener_error_password()
    {
        return $this-> error_password;
    }
    public function obtener_error_password2()
    {
        return $this-> error_password2;
    }

    #Metodos para mostrar los datos
    public function Mostrar_nombre()
    {
        if ($this-> nombre !== "") {
            echo 'value= "' . $this->nombre . '"';
        }
    }
    public function Mostrar_correo()
    {
        if ($this->correo !== "") {
            echo 'value= "' . $this->correo . '"';
        }
    }
    public function Mostrar_error_nombre()
    {
        if ($this->error_nombre !== "") {
            echo $this->aviso_inicio . $this->error_nombre . $this->aviso_cierre;
        }
    }
    public function Mostrar_error_correo()
    {
        if ($this->error_correo !== "") {
            echo $this->aviso_inicio . $this->error_correo . $this->aviso_cierre;
        }
    }
    public function Mostrar_error_password()
    {
        if ($this->error_password !== "") {
            echo $this->aviso_inicio . $this->error_password . $this->aviso_cierre;
        }
    }
    public function Mostrar_error_password2()
    {
        if ($this->error_password2 !== "") {
            echo $this->aviso_inicio . $this->error_password2 . $this->aviso_cierre;
        }
    }

    #Validador de registro completo
    public function Registro_valido()
    {
        if (!$this-> error_nombre === "" && !$this-> error_correo === "" &&
            !$this->error_password === "" && !$this->error_password2 === "") {
            return true;
        } else {
            return false;
        }
        
    }
}
?>