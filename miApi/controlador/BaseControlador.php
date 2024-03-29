<?php

class BaseControlador
{
    //vemos el path
    public function getUri()
    {
        $uri = $_SERVER['PATH_INFO'];
        return explode("/",$uri);
    }

    public function getParametros()
    {
        parse_str($_SERVER['QUERY_STRING'], $array);
        return $array;
    }

    public function sendRespuesta($datos,$cabecera = array())
    {
        //Cabecera envio json /si ha sido satisfactorio o no

        if(is_array(($cabecera)) && count($cabecera))
        {
            foreach ($cabecera as  $value) {
                header($value);
            }
            echo $datos;
            exit;
        }
    }


}

?>