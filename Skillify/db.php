<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; // default XAMPP username
$password = "";     // default XAMPP password
$dbname = "db";     // the name of the database you created

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user input from the signup form
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Hash the password for security (you should use a more secure method in production)
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert user data into the database
$sql = "INSERT INTO user (name, email, password)
VALUES ('$name', '$email', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    // Redirect to home.html after successful signup
    header("Location: home.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
