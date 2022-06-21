<?php
    $method = '';

    if( strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
        $method =  "es post";
    }

    $json = file_get_contents('php://input');
    $datos = new stdClass();
    $datos->data[] = json_decode($json, true);
    $datos->method = $method;
    echo json_encode($datos)
?>

