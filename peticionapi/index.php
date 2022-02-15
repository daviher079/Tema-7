<?php

function get()
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "http://10.1.160.102/Tema-7/miApi/miApi.php/usuarios/maria");

    //ISMAEL
    //curl_setopt($ch, CURLOPT_URL, "http://10.1.160.104/Tema7/miapi/miapi.php/usuarios");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $res = curl_exec($ch);

    print_r($res);
    curl_close($ch);
}

function post()
{
    $ch=curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://10.1.160.102/Tema-7/miApi/miApi.php/usuarios");
    $datosU = array('codUsuario'=>'curl', 'nombre'=>'curl', 'perfil'=>'user', 'pass'=>'curl');
    $datoshttp = http_build_query($datosU);

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datoshttp);

    $res=curl_exec($ch);
    print_r($res);
    curl_close($ch);



}

function put()
{
    // Objeto de tipo curl para hacer la peticion a la PR18
    $ch = curl_init();

    // Array que contiene los parámetros que le paso por post
    $datosU = array('codUsuario'=>'curl','nombre'=>'curlput','perfil'=>'user','pass'=>'1234');

    // url
    curl_setopt($ch, CURLOPT_URL, "http://10.1.160.102/Tema-7/miApi/miApi.php/usuarios/" . $datosU["codUsuario"]);

    // Se formatea el array a formato json
    $datosjson = json_encode($datosU);

    // Se le indica que lo queremos hacer por put, indicandole como va a ir la cabecera
    curl_setopt($ch,CURLOPT_HTTPHEADER,
        array("Content-Type: application/json",
                "Content.length: " . strlen($datosjson)));

    // Se le pasan los parámetros a la cabecera del post
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'PUT');

    // Parametros
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datosjson);

    // Quiero respuesta
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

    // Ejecuto la conexion
    $res = curl_exec($ch);

    echo "<pre>";
        print_r($res);
    echo "</pre>";

    // Cierre de la conexión
    curl_close($ch);
}

//post();
put();


?>