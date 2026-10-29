<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbName = "contacts";

$conn = new mysqli($host, $user, $pass ,$dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    $stmt = $conn->prepare("INSERT INTO my_contact (name, email, contact) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $phone);

    if ($stmt->execute()) {
        echo "Thank you, " . htmlspecialchars($name) . "! Your form was saved to the database.";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>
