<?php

class Contactos{

    private $id_contacto, $NIT, $nombre, $telefono;

    public function __construct($id_contacto, $NIT, $nombre, $telefono)
    {
        $this->id_contacto = $id_contacto;
        $this->NIT = $NIT;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
    }

    public function getIdContacto()
    {
        return $this->id_contacto;
    }
    public function getNIT()
    {
        return $this->NIT;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }
    public function setTelefono($telefono): void
    {
        $this->telefono = $telefono;
    }



}