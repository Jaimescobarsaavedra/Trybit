<?php

class Compras{

    private $id_compra, $NIT, $id_contacto, $id_producto, $valor, $cantidad, $fecha_compra;

    public function __construct($id_compra, $NIT, $id_contacto, $id_producto, $valor, $cantidad, $fecha_compra)
    {
        $this->id_compra = $id_compra;
        $this->NIT = $NIT;
        $this->id_contacto = $id_contacto;
        $this->id_producto = $id_producto;
        $this->valor = $valor;
        $this->cantidad = $cantidad;
        $this->fecha_compra = $fecha_compra;
    }
    public function getIdCompra()
    {
        return $this->id_compra;
    }
    public function getNIT()
    {
        return $this->NIT;
    }
    public function getIdContacto()
    {
        return $this->id_contacto;
    }
    public function getIdProducto()
    {
        return $this->id_producto;
    }
    public function getValor()
    {
        return $this->valor;
    }
    public function getCantidad()
    {
        return $this->cantidad;
    }
    public function getFechaCompra()
    {
        return $this->fecha_compra;
    }

    public function setIdContacto($id_contacto): void
    {
        $this->id_contacto = $id_contacto;
    }
    public function setIdProducto($id_producto): void
    {
        $this->id_producto = $id_producto;
    }
    public function setValor($valor): void
    {
        $this->valor = $valor;
    }
    public function setCantidad($cantidad): void
    {
        $this->cantidad = $cantidad;
    }


}