<?php
require "./config/config.php";
//ver que contiene y que está pidiendo

    if(substr($_SERVER['PATH_INFO'], 0, 9) === "/usuarios")
    {
        $usuarios = new cUsuarios();
        $usuarios->general();
    }else
    {
        header("HTTP/1.1 400 Error en el formato de la petición");
        exit();
    }


?>