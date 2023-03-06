<?php
class Usuario
{
    private $id, $nombre, $correo, $contrasena, $rol, $fecha_registro, $activo;

    public function __construct($id, $nombre, $correo, $contrasena, $rol, $fecha_registro, $activo)
    {
        $this-> id = $id;
        $this-> nombre = $nombre;
        $this-> correo = $correo;
        $this-> contrasena = $contrasena;
        $this-> rol = $rol;
        $this-> fecha_registro = $fecha_registro;
        $this-> activo = $activo;
    }
    #Getters
    public function obtener_id ()
    {
        return $this-> id;
    }
    public function obtener_nombre()
    {
        return $this->nombre;
    }
    public function obtener_correo()
    {
        return $this->correo;
    }
    public function obtener_contrasena()
    {
        return $this->contrasena;
    }
    public function obtener_rol()
    {
        return $this->rol;
    }
    public function obtener_fecha_registro(){
        return $this->fecha_registro;
    }
    public function obtener_estado()
    {
        return $this->activo;
    }
    #Setters
    public function cambiar_nombre($nombre)
    {
        $this-> nombre = $nombre;
    }
    public function cambiar_correo($correo)
    {
        $this->correo = $correo;
    }
    public function cambiar_contrasena($contrasena)
    {
        $this->contrasena = $contrasena;
    }
    public function cambiar_rol($rol)
    {
        $this->rol = $rol;
    }
}