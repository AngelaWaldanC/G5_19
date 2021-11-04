<?php 
    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/Socios.php");
    $socios = new Socios();

    $body = json_decode(file_get_contents("php://input"),true);

    switch($_GET["op"]){

        case "GetSocios":
            $datos=$socios->get_socios();
            echo json_encode($datos);
        break;

        case "GetUno":
            $datos=$socios->get_socio($body["ID"]);
            echo json_encode($datos);
        break;

        case "InsertSocios":
            $datos=$socios->insert_socios($body["ID"],$body["NOMBRE"],$body["RAZONSOCIAL"],$body["DIRECCION"],$body["TIPOSOCIO"],$body["CONTACTO"],$body["EMAIL"],$body["FECHACREADO"],$body["ESTADO"],$body["TELEFONO"]);
            echo json_encode("Socio Agregado");
        break;
        
        case "DeleteSocios":
            $datos=$socios->delete_socios($body["ID"]);
            echo json_encode("Socio eliminado");
        break;

        case "UpdateSocios":
            $datos=$socios->update_socios($body["ID"],$body["NOMBRE"],$body["RAZONSOCIAL"],$body["DIRECCION"],$body["TIPOSOCIO"],$body["CONTACTO"],$body["EMAIL"],$body["FECHACREADO"],$body["ESTADO"],$body["TELEFONO"]);
            echo json_encode("Socio actualizado");
        break;
        
        

    }



?>