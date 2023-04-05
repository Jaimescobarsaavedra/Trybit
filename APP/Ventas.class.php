<?php

class Ventas{

    private $id_venta, $NIT, $id_producto, $cantidad, $fecha, $total, $modo_pago, $estatus, $num_pago;

    public function __construct($id_venta, $NIT, $id_producto, $cantidad, $fecha, $total, $modo_pago, $estatus, $num_pago)
    {
        $this->id_venta = $id_venta;
        $this->NIT = $NIT;
        $this->id_producto = $id_producto;
        $this->cantidad = $cantidad;
        $this->fecha = $fecha;
        $this->total = $total;
        $this->modo_pago = $modo_pago;
        $this->estatus = $estatus;
        $this->num_pago = $num_pago;
    }
    public function getIdVenta()
    {
        return $this->id_venta;
    }
    public function getNIT()
    {
        return $this->NIT;
    }
    public function getIdProducto()
    {
        return $this->id_producto;
    }
    public function getCantidad()
    {
        return $this->cantidad;
    }
    public function getFecha()
    {
        return $this->fecha;
    }
    public function getTotal()
    {
        return $this->total;
    }
    public function getModoPago()
    {
        return $this->modo_pago;
    }
    public function getEstatus()
    {
        return $this->estatus;
    }
    public function getNumPago()
    {
        return $this->num_pago;
    }

    public function setCantidad($cantidad): void
    {
        $this->cantidad = $cantidad;
    }
    public function setTotal($total): void
    {
        $this->total = $total;
    }
    public function setModoPago($modo_pago): void
    {
        $this->modo_pago = $modo_pago;
    }
    public function setEstatus($estatus): void
    {
        $this->estatus = $estatus;
    }



}

?>