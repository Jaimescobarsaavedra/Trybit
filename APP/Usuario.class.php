<?php
class Usuario
{
    private $NIT, $razon_social, $correo, $password, $fecha_registro, $estado;

    public function __construct($NIT, $razon_social, $correo, $password, $fecha_registro, $estado)
    {
        $this->NIT = $NIT;
        $this->razon_social = $razon_social;
        $this->correo = $correo;
        $this->password = $password;
        $this->fecha_registro = $fecha_registro;
        $this->estado = $estado;
    }
    public function getNIT()
    {
        return $this->NIT;
    }
    public function getRazonSocial()
    {
        return $this->razon_social;
    }
    public function getCorreo()
    {
        return $this->correo;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getFechaRegistro()
    {
        return $this->fecha_registro;
    }
    public function getEstado()
    {
        return $this->estado;
    }

    public function setRazonSocial($razon_social): void
    {
        $this->razon_social = $razon_social;
    }
    public function setCorreo($correo): void
    {
        $this->correo = $correo;
    }
    public function setPassword($password): void
    {
        $this->password = $password;
    }

}