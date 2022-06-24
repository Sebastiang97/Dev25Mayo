<?php
    if( strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
        $method = '';
        require('conexion.php');
        $method =  "es post";
        $json = file_get_contents('php://input');
        $datos = new stdClass();
        $datos->data[] = json_decode($json, true);
        $datos->method = $method;
    
        foreach( $datos->data as $key => $value ){
            $sql = "INSERT INTO telefonico VALUES ('$value', '$N2','$N3', '$N4', '$N5')";

            if ($conn->query($sql) === TRUE) {
                echo "agregadas exitosamente";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        echo json_encode($datos);
    }
?>