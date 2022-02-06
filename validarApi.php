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
    
    if(!empty($_REQUEST['ciclo']) && isset($_REQUEST['enviado']) && $_REQUEST['ciclo']=='no'){
        
        label("Debe haber un campo ciclo");
    }           
}

function recordarSelect($var)
{
    if(isset($_REQUEST['enviado']) && !empty($_REQUEST['ciclo']) && $_REQUEST['ciclo']==$var)
    {
        echo "selected";
    }    
}

?>