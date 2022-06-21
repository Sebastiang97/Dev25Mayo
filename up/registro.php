<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "matrizmantenimiento";
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    echo "Hola";



    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql ="SELECT * FROM matriz";
    $result=mysqli_query($conn,$sql);
    if (mysqli_num_rows($result)>0) {
        while ($row = $result->fetch_array()) {
            
            echo "Ciudad:". $row['Ciudad'];
            echo "Nodos:". $row['Nodos'];
            echo "Distrito:". $row['Distrito'];
            echo "SDS:". $row['SDS'];
            echo "SDS:". $row['SDS'];
        }
    }



?>
