<?php

class cUsuarios extends BaseControlador
{
    public function general()
    {
        $uri = $this->getUri();
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':

                if(isset($uri[2])&& !isset($uri[3]))
                {
                    $datos =UsuarioDAO::buscaById($uri[2]);
                }
                elseif (!isset($uri[2])) {
                    $datos = UsuarioDAO::findAll();
                    
                }
                else
                {
                    $this->sendRespuesta(
                        json_encode(array('error'=>"Comprueba la URI")),
                        array("Content-Type: application/json","HTTP/1.1 400 Error en el formato de la petición")
                    );
                }    
                $datos = json_encode($datos);
                $this->sendRespuesta($datos,array("Content-Type: application/json","HTTP/1.1 200 OK"));
                break;
                //http://10.1.160.104/Tema7/miapi/miapi.php/usuarios/admin/ass
            case 'POST':
                //Lo primero que tenga los parametros necesarios
                if(!isset($_POST['codUsuario']) ||
                    !isset($_POST['nombre']) ||
                    !isset($_POST['pass']) ||
                    !isset($_POST['perfil']) 
                )
                {
                    $this->sendRespuesta(

                        json_encode(array("error" => "No se han mandado todos los parámetros")),
                        array(
                            "Content-Type: application/json",
                            "HTTP/1.1 400 Error en el formato de la petición"
                            )
                    );
                }
                else
                {
                    $usuario = new Usuario($_POST['codUsuario'], $_POST['nombre'], $_POST['pass'], $_POST['perfil']);
                    $bien = UsuarioDAO::save($usuario);
                }
                break;


            case 'PUT':

                break;

            case 'DELETE':

                break;
        }
    }

}

?>