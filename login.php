<?php
session_start();
$conn = new mysqli("localhost", "root", "", "rayyandb");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$identifier = $_POST['identifier'];
$password = $_POST['password'];

// Query by either fullname or email
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ? OR fullname = ?");
$stmt->bind_param("ss", $identifier, $identifier);
$stmt->execute();
$result = $stmt->get_result();

echo "<link rel='stylesheet' href='auth.css'>";

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['fullname'];
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<div class='error-message'>❌ Incorrect password. ❌<br><br><a href='auth.html'>Try again</a></div>";
    }
} else {
    echo "<div class='error-message'>
        ⚠️ User not found. ⚠️<br><br><a href='auth.html#signup' onclick=\"localStorage.setItem('showSignup', 'true')\">Sign up here</a>
        </div>";

}

$stmt->close();
$conn->close();
?>
