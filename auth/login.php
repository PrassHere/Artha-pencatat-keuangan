<?php
session_start();

// Jika user ternyata sudah login, langsung alihkan ke dashboard agar tidak masuk ke halaman login lagi
if (isset($_SESSION['user_id'])) {
    header("Location: ../dashboard/index.php");
    exit;
}

$error_message = "";

//hanya untuk frontend demo, hardcoded validasi username dan password
//mas ilham silahkan perbaiki sendiri ya untuk logika loginnya, ini cuma buat demo aja biar bisa masuk ke dashboard
// Cek apakah tombol login sudah diklik
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validasi Hardcoded: Username = 1, Password = 1
    if ($username === '1' && $password === '1') {
        // Buat session sukses login untuk mengelabui sistem proteksi halaman
        $_SESSION['user_id'] = '1';
        $_SESSION['user_name'] = 'User Aktif';
        $_SESSION['user_email'] = 'user@artha.com';

        // Alihkan ke halaman dashboard utama
        header("Location: ../dashboard/index.php");
        exit;
    } else {
        $error_message = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Artha</title>

    <link rel="stylesheet" href="../assets/css/auth.css">
</head>
<body>

<div class="auth-container">

    <div class="logo">
        <h1>Artha</h1>
    </div>

    <div class="auth-card">


        <a href="../index.php" class="back-link">
            X
        </a>

        <div class="switch-auth">
            <a href="login.php" class="active">Log In</a>
            <a href="register.php">Sign Up</a>
        </div>

        <h2>Welcome Back</h2>
        <p>Login to continue managing your finance</p>

        <form action="" method="POST">

            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit" class="btn-auth">
                Login
            </button>

        </form>

    </div>

</div>

</body>
</html>