<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "config.php";

if (isset($_POST['register'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $confirm  = $_POST['confirm_password'];

    // Cek password sama
    if ($password !== $confirm) {
        header("Location: index.php?error=Password tidak sama");
        exit;
    }

    // Cek username / email sudah ada
    $cek = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' OR email='$email'");
    if (mysqli_num_rows($cek) > 0) {
        header("Location: index.php?error=Username atau Email sudah digunakan");
        exit;
    }

    // Hash password
    $hash = password_hash($password, PASSWORD_DEFAULT);

    // Insert data
    $query = "INSERT INTO users (username, email, password, role)
              VALUES ('$username', '$email', '$hash', 'user')";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php?success=Registrasi berhasil, silakan login");
        exit;
    } else {
        echo "Error SQL: " . mysqli_error($conn); // debug
    }

} else {
    header("Location: index.php");
    exit;
}
?>
