<?php
session_start();

include('login.php');

$conn = connect();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'], $_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $response = ['status' => 'error', 'message' => 'Potrebno je vpisati email in geslo'];
    } else {
        $stmt = $conn->prepare("SELECT * FROM uporabnik WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();

        if (!$result) {
            $response = ['status' => 'error', 'message' => 'Email ni pravi'];
        } else {
            if ($password === $result['password']) {
                $_SESSION['user_id'] = $result['id'];
                $_SESSION['user_email'] = $result['email'];
                $response = ['status' => 'success', 'message' => 'Vse je okej'];
            } else {
                $response = ['status' => 'error', 'message' => 'Nepravilno geslo'];
            }
        }
    }

    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    echo "Potrebno je vpisati email in geslo";
}
?>
