<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include "config.php"; // pastikan path benar

if (!isset($_POST['login'])) {
    header("Location: index.php");
    exit;
}

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if ($username === '' || $password === '') {
    echo "Isi username dan password.";
    exit;
}

// Prepared statement untuk keamanan
$stmt = $conn->prepare("SELECT id, username, password, role FROM users WHERE username = ? OR email = ? LIMIT 1");
$stmt->bind_param("ss", $username, $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows === 1) {
    $user = $result->fetch_assoc();

    $stored = $user['password'];

    // Jika stored password adalah hash bcrypt -> pakai password_verify
    if (password_verify($password, $stored) || $password === $stored) {
        // login sukses
        $_SESSION['user'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // redirect sesuai role
        switch ($user['role']) {
            case 'admin':
                header("Location: admin/admin.html");
                break;
            case 'super_admin':
                header("Location: super_admin/super_admin.html");
                break;
            case 'user':
            default:
                header("Location: input.php"); // user diarahkan ke input.php
                break;
        }
        exit;
    }

    echo "Password salah.";
    exit;

} else {
    echo "User tidak ditemukan.";
    exit;
}
?>
