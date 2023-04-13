<?php
include_once 'APP/Gastos.class.php';

class RepoGastos{
    public static function insertar_gasto($conexion, $gasto){
        $gasto_insertado = false;

        if (isset($conexion)){
            try {
                $sql = "INSERT INTO trybit.gastos(id_gasto, NIT, fecha_gasto, concepto, valor, categoria)
                VALUES (:id_gasto, :NIT, :fecha_gasto, :concepto, :valor, :categoria)";

                $sentencia = $conexion-> prepare($sql);

                $id_gasto_temp = $gasto -> getIdGasto();
                $NIT_temp = $gasto -> getNIT();
                $fecha_gasto_temp = $gasto -> getFechaGastos();
                $concepto_temp = $gasto -> getConcepto();
                $valor_temp = $gasto -> getValor();
                $categoria_temp = $gasto -> getCategoria();

                $sentencia -> bindParam(':id_gasto', $id_gasto_temp, PDO::PARAM_STR);
                $sentencia -> bindparam(':NIT', $NIT_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':fecha_gasto', $fecha_gasto_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':concepto', $concepto_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':valor', $valor_temp, PDO::PARAM_INT);
                $sentencia -> bindParam(':categoria', $categoria_temp, PDO::PARAM_STR);

                $gasto_insertado = $sentencia -> execute();

            } catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
            }
        }
        return $gasto_insertado;
    }
}