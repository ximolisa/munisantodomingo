<?php
$serverName = "EACUNAp\\SQLEXPRESS";
$connectionOptions = array(
    "Database" => "Munisantodomingo", 
    "Uid" => "sa",             
    "PWD" => "Holaque2"        
);

$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn) {
    echo "Conexión establecida.";
} else {
    echo "No se pudo conectar a la base de datos.";
    die(print_r(sqlsrv_errors(), true));
}
?>
