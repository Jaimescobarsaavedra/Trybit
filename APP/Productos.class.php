<?php

class Productos{

    private $id_producto, $NIT, $id_contactos, $nombre, $referencia, $descripcion, $cantidad, $precio, $fecha_entrada, $vencimiento;
    public function __construct($id_producto, $NIT, $id_contactos, $nombre, $referencia, $descripcion, $cantidad, $precio, $fecha_entrada, $vencimiento)
    {
        $this->id_producto = $id_producto;
        $this->NIT = $NIT;
        $this->id_contactos = $id_contactos;
        $this->nombre = $nombre;
        $this->referencia = $referencia;
        $this->descripcion = $descripcion;
        $this->cantidad = $cantidad;
        $this->precio = $precio;
        $this->fecha_entrada = $fecha_entrada;
        $this->vencimiento = $vencimiento;
    }

    public function getIdProducto()
    {
        return $this->id_producto;
    }
    public function getNIT()
    {
        return $this->NIT;
    }
    public function getIdContactos()
    {
        return $this->id_contactos;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getReferencia()
    {
        return $this->referencia;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function getCantidad()
    {
        return $this->cantidad;
    }
    public function getPrecio()
    {
        return $this->precio;
    }
    public function getFechaEntrada()
    {
        return $this->fecha_entrada;
    }
    public function getVencimiento()
    {
        return $this->vencimiento;
    }

    public function setIdContactos($id_contactos): void
    {
        $this->id_contactos = $id_contactos;
    }
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }
    public function setReferencia($referencia): void
    {
        $this->referencia = $referencia;
    }
    public function setDescripcion($descripcion): void
    {
        $this->descripcion = $descripcion;
    }
    public function setCantidad($cantidad): void
    {
        $this->cantidad = $cantidad;
    }
    public function setPrecio($precio): void
    {
        $this->precio = $precio;
    }
    public function setVencimiento($vencimiento): void
    {
        $this->vencimiento = $vencimiento;
    }


}