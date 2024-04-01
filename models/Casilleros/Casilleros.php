<?php

    require_once "../../conexion/Conexion.php";
    date_default_timezone_set('America/Bogota');

    class Casilleros {

        public static function obtenerDatos(){
            $db =  new Conexion();
            $query = "SELECT * FROM casilleros
            ORDER BY 1 ASC";
            $resultado = $db->query($query);

            $datos = [];
            if($resultado->num_rows) {
                while($row = $resultado->fetch_assoc()) {
                    $datos[] = [
                        'casi_id' => $row['casi_id'],
                        'casi_nombre' => $row['casi_nombre'],
                        'casi_direccion' => $row['casi_direccion'],
                        'casi_telefono' => $row['casi_telefono'],
                        'casi_estado' => $row['casi_estado'],
                        'ubicaciones_ubi_id' => $row['ubicaciones_ubi_id'],
                        'casi_ult_modifi' => $row['casi_ult_modifi'],
                        'casi_feca_registro' => $row['casi_feca_registro']
                    ];
                }   //Fin while
            }   //Fin condicional
            return $datos;

        }   //Fin método obtenerDatos

        public static function obtenerDatosEspec($casi_id){
            $db =  new Conexion();
            $query = "SELECT * FROM casilleros 
                        WHERE casi_id = $casi_id";
            $resultado = $db->query($query);

            $datos = [];
            if($resultado->num_rows) {
                while($row = $resultado->fetch_assoc()) {
                    $datos[] = [
                        'casi_id' => $row['casi_id'],
                        'casi_nombre' => $row['casi_nombre'],
                        'casi_direccion' => $row['casi_direccion'],
                        'casi_telefono' => $row['casi_telefono'],
                        'casi_estado' => $row['casi_estado'],
                        'ubicaciones_ubi_id' => $row['ubicaciones_ubi_id'],
                        'casi_ult_modifi' => $row['casi_ult_modifi'],
                        'casi_feca_registro' => $row['casi_feca_registro']
                    ];
                }   //Fin while
            }   //Fin condicional
            return $datos;

        }   //Fin método obtenerDatosEspec

        public static function insertarDatos($casi_id, $casi_nombre, $casi_direccion, $casi_telefono, $casi_estado, $ubicaciones_ubi_id, $casi_ult_modifi, $casi_feca_registro){
            $db =  new Conexion();
            $query = "INSERT INTO casilleros (casi_id, casi_nombre, casi_direccion, casi_telefono, casi_estado, ubicaciones_ubi_id, casi_ult_modifi, casi_feca_registro) 
                        VALUES('".$casi_id."', '".$casi_nombre."', '".$casi_direccion."', '".$casi_telefono."', '".$casi_estado."', '".$ubicaciones_ubi_id."', '".$casi_ult_modifi."', '".$casi_feca_registro."')";
            $db->query($query);

            if($db->affected_rows) {
                return TRUE;
            } else {
                return FALSE;
            }  //Fin condicional

        }   //Fin método insertarDatos

        public static function actualizarDatos($casi_id, $casi_nombre, $casi_direccion, $casi_telefono, $casi_estado, $ubicaciones_ubi_id, $casi_ult_modifi, $casi_feca_registro){
            $db =  new Conexion();
            $fecha = date("Y-m-d");
            $query = "UPDATE riesgos SET casi_nombre = $casi_nombre, casi_direccion = $casi_direccion, casi_estado = $casi_estado, riesgo_fecha_registro = $fecha,
                        casi_telefono = $casi_telefono, casi_estado = $casi_estado, ubicaciones_ubi_id = $ubicaciones_ubi_id, casi_ult_modifi = $casi_ult_modifi, casi_feca_registro = $casi_feca_registro
                        WHERE casi_id = $casi_id";
            $db->query($query);

            if($db->affected_rows) {
                return TRUE;
            } else {
                return FALSE;
            }  //Fin condicional

        }   //Fin método actualizarDatos

        public static function eliminarDatos($casi_id){
            $db =  new Conexion();
            $fecha = date("Y-m-d");
            $query = "DELETE FROM riesgos 
                        WHERE casi_id = $casi_id";
            $db->query($query);

            if($db->affected_rows) {
                return TRUE;
            } else {
                return FALSE;
            }  //Fin condicional

        }   //Fin método eliminarDatos


    }   //Fin de la clase Cliente

?>