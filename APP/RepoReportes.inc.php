<?php

include_once 'APP/Gastos.class.php';

class RepoReportes{

    public static function reporte_ventas_hoy($conexion, $NIT){
        $Ventas_hoy = 0;
        if (isset($conexion)){
            try {
                $sql = "SELECT SUM(total) FROM trybit.ventas WHERE fecha = CURDATE() GROUP BY NIT = :NIT";

                $sentencia = $conexion->prepare($sql);
                $sentencia -> bindParam(':NIT', $NIT, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();

                if (!empty($resultado)) {
                    $Ventas_hoy = $resultado[0];
                }
            }catch (PDOException $ex){
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $Ventas_hoy;
    }
    public static function reporte_ventas_mes($conexion, $NIT){
        $Ventas_mes = 0;
        if (isset($conexion)){
            try {
                $sql = "SELECT SUM(total) FROM trybit.ventas WHERE MONTH(fecha) = MONTH(CURDATE()) GROUP BY NIT = :NIT";

                $sentencia = $conexion->prepare($sql);
                $sentencia -> bindParam(':NIT', $NIT, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();

                if (!empty($resultado)) {
                    $Ventas_mes = $resultado[0];
                }
            }catch (PDOException $ex){
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $Ventas_mes;
    }
    public static function reporte_ventas_ano($conexion, $NIT){
        $Ventas_ano = 0;
        if (isset($conexion)){
            try {
                $sql = "SELECT SUM(total) FROM trybit.ventas WHERE YEAR(fecha) = YEAR(CURDATE()) GROUP BY NIT = :NIT";

                $sentencia = $conexion->prepare($sql);
                $sentencia -> bindParam(':NIT', $NIT, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();

                if (!empty($resultado)) {
                    $Ventas_ano = $resultado[0];
                }
            }catch (PDOException $ex){
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $Ventas_ano;
    }
    public static function reporte_gastos_hoy($conexion, $NIT){
        $Gastos_hoy = 0;
        if (isset($conexion)){
            try {
                $sql = "SELECT SUM(valor) FROM trybit.gastos WHERE fecha_gasto = CURDATE() GROUP BY NIT = :NIT";

                $sentencia = $conexion->prepare($sql);
                $sentencia -> bindParam(':NIT', $NIT, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();

                if (!empty($resultado)) {
                    $Gastos_hoy = $resultado[0];
                }
            }catch (PDOException $ex){
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $Gastos_hoy;
    }
    public static function reporte_gastos_mes($conexion, $NIT){
        $Gastos_mes = 0;
        if (isset($conexion)){
            try {
                $sql = "SELECT SUM(valor) FROM trybit.gastos WHERE MONTH(fecha_gasto) = MONTH(CURDATE()) GROUP BY NIT = :NIT";

                $sentencia = $conexion->prepare($sql);
                $sentencia -> bindParam(':NIT', $NIT, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();

                if (!empty($resultado)) {
                    $Gastos_mes = $resultado[0];
                }
            }catch (PDOException $ex){
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $Gastos_mes;
    }
    public static function reporte_gastos_ano($conexion, $NIT){
        $Gastos_ano = 0;
        if (isset($conexion)){
            try {
                $sql = "SELECT SUM(valor) FROM trybit.gastos WHERE YEAR(fecha_gasto) = YEAR(CURDATE()) GROUP BY NIT = :NIT";

                $sentencia = $conexion->prepare($sql);
                $sentencia -> bindParam(':NIT', $NIT, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();

                if (!empty($resultado)) {
                    $Gastos_ano = $resultado[0];
                }
            }catch (PDOException $ex){
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $Gastos_ano;
    }
    public static function reporte_ganancias_hoy($conexion, $NIT){
        $Ganancias_hoy = 0;
        if (isset($conexion)){
            try {
                $sql = "SELECT SUM(ingresos) - SUM(egresos) FROM trybit.contabilidad WHERE fecha = CURDATE() GROUP BY NIT = :NIT";

                $sentencia = $conexion->prepare($sql);
                $sentencia -> bindParam(':NIT', $NIT, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();

                if (!empty($resultado)) {
                    $Ganancias_hoy = $resultado[0];
                }
            }catch (PDOException $ex){
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $Ganancias_hoy;
    }
    public static function reporte_ganancias_mes($conexion, $NIT){
        $Ganancias_mes = 0;
        if (isset($conexion)){
            try {
                $sql = "SELECT SUM(ingresos) - SUM(egresos) FROM trybit.contabilidad WHERE MONTH(fecha) = MONTH(CURDATE()) GROUP BY NIT = :NIT";

                $sentencia = $conexion->prepare($sql);
                $sentencia -> bindParam(':NIT', $NIT, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();

                if (!empty($resultado)) {
                    $Ganancias_mes = $resultado[0];
                }
            }catch (PDOException $ex){
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $Ganancias_mes;
    }
    public static function reporte_ganancias_ano($conexion, $NIT){
        $Ganancias_ano = 0;
        if (isset($conexion)){
            try {
                $sql = "SELECT SUM(ingresos) - SUM(egresos) FROM trybit.contabilidad WHERE YEAR(fecha) = YEAR(CURDATE()) GROUP BY NIT = :NIT";

                $sentencia = $conexion->prepare($sql);
                $sentencia -> bindParam(':NIT', $NIT, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();

                if (!empty($resultado)) {
                    $Ganancias_ano = $resultado[0];
                }
            }catch (PDOException $ex){
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $Ganancias_ano;
    }
    public static function reporte_categoria_gastos_hoy($conexion, $NIT){
        $Grafica_ano = array();
        if (isset($conexion)){
            try {
                $sql = "SELECT DISTINCT categoria FROM trybit.gastos WHERE fecha_gasto = CURDATE() AND NIT = :NIT ORDER BY categoria ASC";

                $sentencia = $conexion->prepare($sql);
                $sentencia -> bindParam(':NIT', $NIT, PDO::PARAM_STR);
                $sentencia -> execute();

                while($row = $sentencia->fetch(PDO::FETCH_ASSOC)){
                    $Grafica_ano[] = $row;
                }
            }catch (PDOException $ex){
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $Grafica_ano;
    }
    public static function reporte_categoria_gastos_mes($conexion, $NIT){
        $Grafica_ano = array();
        if (isset($conexion)){
            try {
                $sql = "SELECT DISTINCT categoria, COUNT(*) as num_gastos FROM trybit.gastos WHERE MONTH(fecha_gasto) = MONTH(CURDATE()) AND NIT = :NIT GROUP BY categoria";

                $sentencia = $conexion->prepare($sql);
                $sentencia -> bindParam(':NIT', $NIT, PDO::PARAM_STR);
                $sentencia -> execute();

                while($row = $sentencia->fetch(PDO::FETCH_ASSOC)){
                    $Grafica_ano[] = $row;
                }
            }catch (PDOException $ex){
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $Grafica_ano;
    }
    public static function reporte_categoria_gastos_ano($conexion, $NIT){
        $Grafica_ano = array();
        if (isset($conexion)){
            try {
                $sql = "SELECT DISTINCT categoria, COUNT(*) as num_gastos FROM trybit.gastos WHERE YEAR(fecha_gasto) = YEAR(CURDATE()) AND NIT = :NIT GROUP BY categoria";

                $sentencia = $conexion->prepare($sql);
                $sentencia -> bindParam(':NIT', $NIT, PDO::PARAM_STR);
                $sentencia -> execute();

                while($row = $sentencia->fetch(PDO::FETCH_ASSOC)){
                    $Grafica_ano[] = $row;
                }
            }catch (PDOException $ex){
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $Grafica_ano;
    }
    public static function reporte_cantidad_ventas_producto_ano($conexion, $NIT){
        $Grafica_ano = array();
        if (isset($conexion)){
            try {
                $sql = "SELECT p.nombre, sum(c.cantidad) as cant_producto FROM trybit.ventas c JOIN trybit.productos p ON c.id_producto = p.id_producto WHERE YEAR(c.fecha) = YEAR(CURDATE()) AND c.NIT = :NIT GROUP BY p.id_producto";

                $sentencia = $conexion->prepare($sql);
                $sentencia -> bindParam(':NIT', $NIT, PDO::PARAM_STR);
                $sentencia -> execute();

                while($row = $sentencia->fetch(PDO::FETCH_ASSOC)){
                    $Grafica_ano[] = $row;
                }
            }catch (PDOException $ex){
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $Grafica_ano;
    }

    public static function reporte_cantidad_compras_producto_ano($conexion, $NIT){
        $Grafica_ano = array();
        if (isset($conexion)){
            try {
                $sql = "SELECT p.nombre, sum(c.cantidad) as cant_producto FROM trybit.compras c JOIN trybit.productos p ON c.id_producto = p.id_producto WHERE YEAR(c.fecha_compra) = YEAR(CURDATE()) AND c.NIT = :NIT GROUP BY p.id_producto";

                $sentencia = $conexion->prepare($sql);
                $sentencia -> bindParam(':NIT', $NIT, PDO::PARAM_STR);
                $sentencia -> execute();

                while($row = $sentencia->fetch(PDO::FETCH_ASSOC)){
                    $Grafica_ano[] = $row;
                }
            }catch (PDOException $ex){
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $Grafica_ano;
    }
}