<?php

    class Conexion extends mysqli {
        function __construct() {
            parent::__construct('localhost', 'root', '', 'duoenvios');
            $this->set_charset('utf8');
            $this->connect_error == NULL ? 'Conexión exitosa a la base de datos!' : die('Error al conectar a la base de datos!');            
        }   //Fin del constructor
    }   //Fin de la clase Conexión

?>