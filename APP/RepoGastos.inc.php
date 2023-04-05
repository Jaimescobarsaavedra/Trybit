<?php
include_once 'APP/Gastos.class.php';

class RepoGastos{
    public static function insertar_gasto($conexion, $NIT, $gasto, $id){
        $gasto_insertado = false;

        if (isset($conexion)){
            try {
                $sql = "INSERT INTO trybit.gastos(id_gasto, NIT, fecha_gasto, concepto, valor, categoria)
                VALUES (:id_gasto, :NIT, :fecha_gasto, :concepto, :valor, :categoria)";

                $sentencia = $conexion-> prepare($sql);

                $sentencia = bindParam(':id_gasto', $id, PDO::PARAM_STR);
                $sentencia = bindparam(':NIT', $NIT, PDO::PARAM_STR);
                $sentencia -> bindParam(':fecha_gasto', $gasto-> getFechaGasto(), PDO::PARAM_STR);
                $sentencia -> bindParam(':concepto', $gasto-> getConcepto(), PDO::PARAM_INT);
                $sentencia -> bindParam(':valor', $gasto-> getValor(), PDO::PARAM_INT);
                $sentencia -> bindParam(':categoria', $gasto-> getCategoria(), PDO::PARAM_STR);

                $gasto_insertado = $sentencia -> execute();

            } catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
            }
        }
        return $gasto_insertado;
    }
}