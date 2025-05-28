<?php
echo "<link rel='stylesheet' href='auth.css'>";
$conn = new mysqli("localhost", "root", "", "rayyandb");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$gender = $_POST['gender'];
$birthdate = $_POST['birthdate'];
$stmt = $conn->prepare("INSERT INTO users (fullname, email, password, gender, birthdate) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $fullname, $email, $password, $gender, $birthdate);
if ($stmt->execute()) {
    echo "<div class='success-message'>✅ Registration successful! ✅<br><br><a href='auth.html'>Login here</a></div>";
} else {
    echo "❌ Error: " . $stmt->error;
}
$stmt->close();
$conn->close();
?>