<?php

    function validarDesplegable()
    {
        $bandera=true;
        if(isset($_REQUEST['enviado']))
        {
            if(($_REQUEST['ciudades']=='303118'|| $_REQUEST['ciudades']=='307142' ||
                $_REQUEST['ciudades']=='307143'|| $_REQUEST['ciudades']=='303119' ||
                $_REQUEST['ciudades']=='307144'|| $_REQUEST['ciudades']=='303120' ||
                $_REQUEST['ciudades']=='303117'|| $_REQUEST['ciudades']=='307145' ||
                $_REQUEST['ciudades']=='303121'
            ) && isset($_REQUEST['enviado']))
            {

                $bandera =true;
                
            }else
            {
                $bandera=false;
            }
        } else{
            $bandera= false;
        }
        return $bandera;
    }

function comprobarSelect()
{
    
    if(!empty($_REQUEST['ciudades']) && isset($_REQUEST['enviado']) && $_REQUEST['ciudades']=='no'){
        
        echo "Debe haber un campo ciclo";
    }           
}

function recordarSelect($var)
{
    if(isset($_REQUEST['enviado']) && !empty($_REQUEST['ciudades']) && $_REQUEST['ciudades']==$var)
    {
        echo "selected";
    }    
}

?>