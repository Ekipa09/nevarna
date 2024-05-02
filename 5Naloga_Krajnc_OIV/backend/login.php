<?php
$db_hostname = 'localhost';
$db_username = 'oiv_5naloga';
$db_password = 'geslo';
$db_database = '5naloga_oiv';
$db_port = '4306'; 

function connect()
{
    global $db_hostname, $db_username, $db_password, $db_database, $db_port;

    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database, $db_port);

    if ($conn->connect_error) {
        die("Database connection problem: " . $conn->connect_error);
    }

    return $conn;
}

$conn = connect();
?>



