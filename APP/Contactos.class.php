<?php

class Contactos{

    private $id_contacto, $NIT, $id_productos, $nombre, $telefono, $proveedor;

    public function __construct($id_contacto, $NIT, $id_productos, $nombre, $telefono, $proveedor)
    {
        $this->id_contacto = $id_contacto;
        $this->NIT = $NIT;
        $this->id_productos = $id_productos;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->proveedor = $proveedor;
    }

    public function getIdContacto()
    {
        return $this->id_contacto;
    }
    public function getNIT()
    {
        return $this->NIT;
    }
    public function getIdProductos()
    {
        return $this->id_productos;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getTelefono()
    {
        return $this->telefono;
    }
    public function getProveedor()
    {
        return $this->proveedor;
    }

    public function setIdProductos($id_productos): void
    {
        $this->id_productos = $id_productos;
    }
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }
    public function setTelefono($telefono): void
    {
        $this->telefono = $telefono;
    }
    public function setProveedor($proveedor): void
    {
        $this->proveedor = $proveedor;
    }


}