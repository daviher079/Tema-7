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

                    if($bien)
                    {

                       $datosr=json_encode($bien);
                       $this->sendRespuesta(
                           $datosr,
                           array(
                            "Content-Type: application/json",
                            "HTTP/1.1 200 Todo correcto"
                            )
                       );

                    }else
                    {
                        $this->sendRespuesta(

                            json_encode(array("error" => "No se han mandado todos los parámetros")),
                            array(
                                "Content-Type: application/json",
                                "HTTP/1.1 400 Error en el formato de la petición"
                                )
                        );
                    }
                }
                break;


            case 'PUT':

                if(!isset($uri[2]))
                {

                    $this->sendRespuesta(

                        json_encode(array("error" => "No se han mandado todos los parámetros")),
                        array(
                            "Content-Type: application/json",
                            "HTTP/1.1 400 Error en el formato de la petición"
                            )
                    );

                }else
                {

                    $put= file_get_contents("php://input");
                    $array = json_decode($put, true);

                    if(!isset($array['nombre']) || !isset($array['perfil']) || !isset($array['pass']))
                    {
                        $this->sendRespuesta(

                            json_encode(array("error" => "No se han introducido todos los parametros por put")),
                            array(
                                "Content-Type: application/json",
                                "HTTP/1.1 400 Error en el formato de la petición"
                                )
                        );
                    }
                    else
                    {
                        $usuario = new Usuario($uri[2], $array['nombre'], $array['pass'], $array['perfil'],);
                        $objeto = UsuarioDAO::update($usuario);
                        
                        if(!$objeto)
                        {
    
                            $this->sendRespuesta(

                                json_encode(array("error" => "No se han mandado todos los parámetros")),
                                array(
                                    "Content-Type: application/json",
                                    "HTTP/1.1 400 Error en el formato de la petición"
                                    )
                            );
                           
    
                        }else
                        {

                            $datosr=json_encode($objeto);
                            $this->sendRespuesta(
                               $datosr,
                               array(
                                "Content-Type: application/json",
                                "HTTP/1.1 200 Todo correcto"
                                )
                            );
                            
                        }
                    }
                }

                break;

            case 'DELETE':

                break;
        }
    }

}

?>