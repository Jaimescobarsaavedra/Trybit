<?php

class Contabilidad
{
    private $id_contabilidad, $NIT, $id_gasto, $id_compra, $id_ventas, $ingresos, $egresos;

    public function __construct($id_contabilidad, $NIT, $id_gasto, $id_compra, $id_ventas, $ingresos, $egresos)
    {
        $this->id_contabilidad = $id_contabilidad;
        $this->NIT = $NIT;
        $this->id_gasto = $id_gasto;
        $this->id_compra = $id_compra;
        $this->id_ventas = $id_ventas;
        $this->ingresos = $ingresos;
        $this->egresos = $egresos;
    }

    public function getIdContabilidad()
    {
        return $this->id_contabilidad;
    }
    public function getNIT()
    {
        return $this->NIT;
    }
    public function getIdGasto()
    {
        return $this->id_gasto;
    }
    public function getIdCompra()
    {
        return $this->id_compra;
    }
    public function getIdVentas()
    {
        return $this->id_ventas;
    }
    public function getIngresos()
    {
        return $this->ingresos;
    }
    public function getEgresos()
    {
        return $this->egresos;
    }

    public function setIdGasto($id_gasto): void
    {
        $this->id_gasto = $id_gasto;
    }
    public function setIdCompra($id_compra): void
    {
        $this->id_compra = $id_compra;
    }
    public function setIdVentas($id_ventas): void
    {
        $this->id_ventas = $id_ventas;
    }


}