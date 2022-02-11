<?php



class UsuarioDAO implements DAO
{

    public static function findAll()
    {
        $sql = "select codUsuario, nombre, Perfil from usuario;";
        $consulta =ConexionBD::ejecutaConsulta($sql, []);
        $registros = $consulta->fetchAll(PDO::FETCH_ASSOC);
        
        
        return $registros;

    }

    public static function validaUser($user, $pass)
    {
        $sql = "select * from usuario where codUsuario = ? and password = ?";
        $consulta =ConexionBD::ejecutaConsulta($sql, [$user, $pass]);
        $usuario =null;
        
        while($row = $consulta->fetchObject())
        {
            $usuario = new Usuario($row->codUsuario,
                $row->nombre, $row->password, $row->Perfil);
                

        }
        return $usuario;
    }

    //Busca por clave primaria
    public static function buscaById($id)
    {
        $sql = "select codUsuario, nombre, Perfil from usuario where codUsuario = ?;";
        $consulta =ConexionBD::ejecutaConsulta($sql, [$id]);
        $row = $consulta->fetchObject();
       
        return $row;
    }

    //modifica o actualiza
    public static function update($objeto)
    {
        $sql = "update usuario set nombre =?,password=?,Perfil=? where codigoUsuario=?";

        $consulta = ConexionBD::ejecutaConsulta($sql, [$objeto->nombre, hash("sha256",$objeto->password), $objeto->perfil, $objeto->codUsuario]);

        if($consulta->rowCount()==1)
        {
            return UsuarioDAO::buscaById($objeto->codUsuario);
        }else
        {
            return null;
        }
    }
    
    //crea o inserta 
    public static function save($objeto)
    {

        $sql = "insert into usuario values (?,?,?,0,null,?)";

        $consulta = ConexionBD::ejecutaConsulta($sql, [$objeto->codUsuario,hash("sha256",$objeto->password),$objeto->nombre,$objeto->perfil]);

        // Recojo el ultimo insert de la BBDD (para saber el ultimo id y añadir el siguiente) (opcional)

        if(!$consulta)
        {
            return null;
        }

        //Si $consulta->rowCount()==1
        return UsuarioDAO::buscaById($objeto->codUsuario);
    }

    //borrar
    public static function delete($objeto)
    {
        echo "delete ";
    }
        

    public static function muestra()
    {
        echo "Ejemplo de la interfaz otraInterfaz";
    }


}

?>