<?php

$servername = "localhost";
$username = "root";
$password = "your_password";
$dbname = "your_database";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare statement
$stmt = mysqli_prepare($conn, "INSERT INTO users (username, firstname, lastname, password, birthdate, email) VALUES (?, ?, ?, ?, ?, ?)");

// Bind parameters
mysqli_stmt_bind_param($stmt, "ssssss", $username, $firstname, $lastname, $password, $birthdate, $email);

// Set parameters
$username = $_POST['username'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$birthdate = $_POST['birthdate'];
$email = $_POST['email'];

// Execute statement
mysqli_stmt_execute($stmt);

echo "Registration successful.";

mysqli_close($conn);
?>
