<?php

class ControlSesion 
{
    public static function Iniciar_sesion($NIT, $nombre_usuario)
    {
        if (session_id()== '') {
            session_start();
        } else {
            # code...
        }
        $_SESSION['NIT']= $NIT;
        $_SESSION['nombre_usuario']= $nombre_usuario;
    }

    public static function Cerrar_sesion()
    {
        if (session_id() == '') {
            session_start();
        }
        if (isset($_SESSION['NIT'])) {
            unset($_SESSION['NIT']);
        }
        if (isset($_SESSION['nombre_usuario'])) {
            unset($_SESSION['nombre_usuario']);
        }
        session_destroy();
    }

    public static function Sesion_iniciada()
    {
        if (session_id() == '') {
            session_start();
        }
        if (isset($_SESSION['nombre_usuario']) && isset($_SESSION['NIT'])) {
            return true;
        }else {
            return false;
        }
    }
}
?>