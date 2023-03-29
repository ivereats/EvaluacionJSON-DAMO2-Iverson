<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myuca";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Conexion fallada: " . mysqli_connect_error());
}

function mostrar($coordinador) {
    global $conn;
    $sql = "select * from coordinador where DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), fechaNac)), '%Y')+0 >= 60";
    $result = mysqli_query($conn, $sql);
    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }
    return json_encode($rows);
}
echo mostrar('coordinador');

?>