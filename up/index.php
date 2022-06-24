<?php
    $method = '';

    // $d = array( 

    if( strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
        $method =  "POST";
    }
    require('conexion.php');
    $conn = new mysqli($servername, $username, $password, $dbname);
    

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    $res = new stdClass();
    $res->method = $method;
    $res->errors = [];
    $res->msg = [];
    for ($i=0; $i < count($data); $i++) {
        $sql = "INSERT INTO testconectados VALUES('','{$data[$i]['Tipo de Solicitud']}','{$data[$i]['Tipo de Identificación']}','{$data[$i]['# Identificación(Sin 0 a la izquierda)']}','{$data[$i]['Nombres Completos']}','{$data[$i]['Apellidos Completos']}','{$data[$i]['Fecha de Nacimiento(tomada de la CC)']}','{$data[$i]['Email']}','{$data[$i]['# Celular']}','{$data[$i]['Cargo']}','{$data[$i]['Género']}','{$data[$i]['Canal']}','{$data[$i]['Sub Canal']}','{$data[$i]['Regional']}','{$data[$i]['Ciudad']}','{$data[$i]['Departamento']}','{$data[$i]['Empresa(si es directo colocar Comcel S.A.)']}','{$data[$i]['Tipo de contrato(Directos o Aliados)']}')";

        if ($conn->query($sql) === TRUE) {
            array_push($res->msg,"agregada exitosamente ".$i+1);
        } else {
            array_push($res->errors," Error: $sql coneccion error: {$conn->error}".$i+1);
        }
    }   
    
    echo json_encode($res)

    //CREATE TABLE `test`.`testconectados` ( `id` INT(100) NOT NULL AUTO_INCREMENT , `tipoSolicitud` VARCHAR(50) NOT NULL , `TipoIdentificacion` VARCHAR(50) NOT NULL , `numeroIdentificacion` VARCHAR(50) NOT NULL , `nombresCompletos` VARCHAR(50) NOT NULL , `apellidosCompletos` VARCHAR(50) NOT NULL , `fechaNacimiento` VARCHAR(50) NOT NULL , `email` VARCHAR(50) NOT NULL , `celular` VARCHAR(50) NOT NULL , `cargo` VARCHAR(50) NOT NULL , `genero` VARCHAR(50) NOT NULL , `canal` VARCHAR(50) NOT NULL , `subCanal` VARCHAR(50) NOT NULL , `regional` VARCHAR(50) NOT NULL , `ciudad` VARCHAR(50) NOT NULL , `departamento` VARCHAR(50) NOT NULL , `empresa` VARCHAR(50) NOT NULL , `tipoContrato` VARCHAR(50) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

?>

