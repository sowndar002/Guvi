<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

$conn = mysqli_connect('localhost', 'root', '', 'registration user');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $DOB = mysqli_real_escape_string($conn, $_POST['dob']);
    $phone_No = mysqli_real_escape_string($conn, $_POST['phone_No']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);

    
    $sql = "INSERT INTO user (`First Name`, `Last Name`, `Email`, `DOB`, `Phone_No`, `Password`, `Confirm Password`, `Gender`)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    
    mysqli_stmt_bind_param($stmt, "ssssssss", $firstName, $lastName, $email, $DOB, $phone_No, $password, $cpassword, $gender);

    
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo json_encode(array("status" => 'success', "message" => 'Successfully registered'));
    } else {
        echo json_encode(array("status" => 'error', "message" => 'Error registering user: ' . mysqli_error($conn)));
    }

    mysqli_stmt_close($stmt);
} else {
    echo json_encode(array("status" => 'error', "message" => 'Invalid request method'));
}

mysqli_close($conn);
?>
