<?php

class cUsuarios extends BaseControlador
{
    public function general()
    {
        $uri = $this->getUri();
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':

                if(isset($uri[2])&& !isset($uri[3]))
                    echo $uri[2];
                elseif (!isset($uri[2])) {
                    $datos = UsuarioDAO::findAll();
                    print_r($datos);
                }
                else
                {
                    //header mal
                }    
                $datos = json_encode($datos);
                $this->sendRespuesta($datos,array("Content-Type: application/json","HTTP/1.1 200 OK"));
                break;

            case 'POST':

                break;


            case 'PUT':

                break;

            case 'DELETE':

                break;
        }
    }

}

?>