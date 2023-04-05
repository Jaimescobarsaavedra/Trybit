<?php

class Gastos
{
    private $id_gasto, $NIT, $fecha_gastos, $concepto, $valor, $categoria;

    public function __construct($id_gasto, $NIT, $fecha_gastos, $concepto, $valor, $categoria)
    {
        $this->id_gasto = $id_gasto;
        $this->NIT = $NIT;
        $this->fecha_gastos = $fecha_gastos;
        $this->concepto = $concepto;
        $this->valor = $valor;
        $this->categoria = $categoria;
    }

    public function getIdGasto()
    {
        return $this->id_gasto;
    }
    public function getNIT()
    {
        return $this->NIT;
    }
    public function getFechaGastos()
    {
        return $this->fecha_gastos;
    }
    public function getConcepto()
    {
        return $this->concepto;
    }
    public function getValor()
    {
        return $this->valor;
    }
    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setFechaGastos($fecha_gastos): void
    {
        $this->fecha_gastos = $fecha_gastos;
    }
    public function setConcepto($concepto): void
    {
        $this->concepto = $concepto;
    }
    public function setValor($valor): void
    {
        $this->valor = $valor;
    }
    public function setCategoria($categoria): void
    {
        $this->categoria = $categoria;
    }


}