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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'], $_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmtEmail = $conn->prepare("SELECT email FROM uporabnik WHERE email = ?");
    $stmtEmail->bind_param("s", $email);
    $stmtEmail->execute();
    $stmtEmail->store_result();

    $result = $stmtEmail->num_rows;
    if ($result > 0) {
        echo 'Email ni več na voljo. Prosim izberite drugačen email.';
    } else {
        $stmt2 = $conn->prepare("INSERT INTO uporabnik (email, password) VALUES (?, ?)");

        // $options = [
        //     'cost' => 12
        // ];

        // $hashed_pwd = password_hash($password, PASSWORD_BCRYPT, $options);

        $stmt2->bind_param("ss", $email, $password);
        $stmt2->execute();
    }
}
?>
