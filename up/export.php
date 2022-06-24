<?php 
    
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename= Eventos.xls");
    
    require('conexion.php');

    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $dbname = "test";
    $tabla = '';
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $verificar ="SELECT * FROM testconectados";

    $tabla .= "<table style='width:100%;border: 1px solid black; border-collapse: collapse;'>
    <tr>
        <th style='border: 1px solid black; border-collapse: collapse;'>Tipo de Identificación</th>
        <th style='border: 1px solid black; border-collapse: collapse;'># Identificación(Sin 0 a la izquierda)</th>
        <th style='border: 1px solid black; border-collapse: collapse;'>Nombres Completos</th>
        <th style='border: 1px solid black; border-collapse: collapse;'>Apellidos Completos</th>
        <th style='border: 1px solid black; border-collapse: collapse;'>Fecha de Nacimiento(tomada de la CC)</th>
        <th style='border: 1px solid black; border-collapse: collapse;'>Email</th>
        <th style='border: 1px solid black; border-collapse: collapse;'># Celular</th>
        <th style='border: 1px solid black; border-collapse: collapse;'>Cargo</th>
        <th style='border: 1px solid black; border-collapse: collapse;'>Género</th>
        <th style='border: 1px solid black; border-collapse: collapse;'>Canal</th>
        <th style='border: 1px solid black; border-collapse: collapse;'>Sub Canal</th>
        <th style='border: 1px solid black; border-collapse: collapse;'>Regional</th>
        <th style='border: 1px solid black; border-collapse: collapse;'>Ciudad</th>
        <th style='border: 1px solid black; border-collapse: collapse;'>Departamento</th>
        <th style='border: 1px solid black; border-collapse: collapse;'>Empresa(si es directo colocar Comcel S.A.)</th>
        <th style='border: 1px solid black; border-collapse: collapse;'>Tipo de contrato(Directos o Aliados)</th>
    </tr>
    ";
    
    $result=mysqli_query($conn,$verificar);
    while ($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        $tipoSolicitud = $row['tipoSolicitud'];
        $TipoIdentificacion = $row['TipoIdentificacion'];
        $numeroIdentificacion = $row['numeroIdentificacion'];
        $apellidosCompletos = $row['apellidosCompletos'];
        $fechaNacimiento = $row['fechaNacimiento'];
        $email = $row['email'];
        $celular = $row['celular'];
        $cargo = $row['cargo'];
        $genero = $row['genero'];
        $subCanal = $row['subCanal'];
        $regional = $row['regional'];
        $ciudad = $row['ciudad'];
        $departamento = $row['departamento'];
        $empresa = $row['empresa'];
        $tipoContrato = $row['tipoContrato'];

        $tabla .= "<tr'>
            <td style='border: 1px solid black;border-collapse: collapse;'>$id</td>
            <td style='border: 1px solid black;border-collapse: collapse;'>$tipoSolicitud</td>
            <td style='border: 1px solid black;border-collapse: collapse;'>$TipoIdentificacion</td>
            <td style='border: 1px solid black;border-collapse: collapse;'>$numeroIdentificacion</td>
            <td style='border: 1px solid black;border-collapse: collapse;'>$apellidosCompletos</td>
            <td style='border: 1px solid black;border-collapse: collapse;'>$fechaNacimiento</td>
            <td style='border: 1px solid black;border-collapse: collapse;'>$email</td>
            <td style='border: 1px solid black;border-collapse: collapse;'>$celular</td>
            <td style='border: 1px solid black;border-collapse: collapse;'>$cargo</td>
            <td style='border: 1px solid black;border-collapse: collapse;'>$genero</td>
            <td style='border: 1px solid black;border-collapse: collapse;'>$subCanal</td>
            <td style='border: 1px solid black;border-collapse: collapse;'>$regional</td>
            <td style='border: 1px solid black;border-collapse: collapse;'>$ciudad</td>
            <td style='border: 1px solid black;border-collapse: collapse;'>$departamento</td>
            <td style='border: 1px solid black;border-collapse: collapse;'>$empresa</td>
            <td style='border: 1px solid black;border-collapse: collapse;'>$tipoContrato</td>
        </tr>";
    }      
    $tabla .= "</table>";

    echo $tabla;

    //CREATE TABLE `test`.`testconectados` ( `id` INT(100) NOT NULL AUTO_INCREMENT , `tipoSolicitud` VARCHAR(50) NOT NULL , `TipoIdentificacion` VARCHAR(50) NOT NULL , `numeroIdentificacion` VARCHAR(50) NOT NULL , `nombresCompletos` VARCHAR(50) NOT NULL , `apellidosCompletos` VARCHAR(50) NOT NULL , `fechaNacimiento` VARCHAR(50) NOT NULL , `email` VARCHAR(50) NOT NULL , `celular` VARCHAR(50) NOT NULL , `cargo` VARCHAR(50) NOT NULL , `genero` VARCHAR(50) NOT NULL , `canal` VARCHAR(50) NOT NULL , `subCanal` VARCHAR(50) NOT NULL , `regional` VARCHAR(50) NOT NULL , `ciudad` VARCHAR(50) NOT NULL , `departamento` VARCHAR(50) NOT NULL , `empresa` VARCHAR(50) NOT NULL , `tipoContrato` VARCHAR(50) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
?>
