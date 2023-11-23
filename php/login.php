<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

$conn = mysqli_connect('localhost', 'root', '', 'registration user');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['login'])) {
    $Email = mysqli_real_escape_string($conn, $_POST['email']);
    $Password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM user WHERE Email = '$Email' AND Password = '$Password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        echo json_encode(array("status" => 'success', "message" => 'Successfully logged in'));
    } else {
        echo json_encode(array("status" => 'error', "message" => 'Invalid Username or Password'));
    }
} else {
    echo json_encode(array("status" => 'error', "message" => 'Invalid request'));
}

mysqli_close($conn);
?>
