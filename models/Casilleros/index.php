<?php

    require_once "Casilleros.php";

    switch($_SERVER['REQUEST_METHOD']) {
        case 'GET':

                if(isset($_GET['casi_id'])) {
                    echo json_encode(Casilleros::obtenerDatosEspec($_GET['casi_id']));
                } else {
                    echo json_encode(Casilleros::obtenerDatos());
                }   //Fin condicional

            break;

        case 'POST':

                $datos = json_decode(file_get_contents('php://input'));

                if($datos != NULL) {
                    if(Casilleros::insertarDatos($datos->casi_id, $datos->casi_nombre, $datos->casi_direccion, $datos->casi_telefono, $datos->casi_estado, $datos->ubicaciones_ubi_id, $datos->casi_ult_modifi, $datos->casi_feca_registro)){
                        http_response_code(200);
                    } else {
                        http_response_code(400);
                    }   //Fin condicional
                } else {
                    http_response_code(405);
                }   //Fin condicional validación NULL

            break;
    }

?>