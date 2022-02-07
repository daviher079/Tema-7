<?php
    interface DAO
    {
        //busca todos
        public static function findAll();

        //Busca por clave primaria
        public static function buscaById($id);

        //modifica o actualiza
        public static function update($objeto);
        
        //crea o inserta 
        public static function save($objeto);

        //borrar
        public static function delete($objeto);
        
        /*
        //borrar por id
        public function deleteById($id);
        */

    }
?>