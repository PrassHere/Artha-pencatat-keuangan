<?php
session_start();

require '../functions.php';

if(isset($_SESSION['id_user'])){
    header("Location: ../dashboard/index.php");
    exit;
}

if(isset($_POST['register'])){

    if(registrasi($_POST) > 0) {
        $email_pendaftar = mysqli_real_escape_string($conn, trim($_POST['email']));
        $result = mysqli_query($conn, "SELECT id, username FROM user WHERE email = '$email_pendaftar'");
        $user_baru = mysqli_fetch_assoc($result);

        $_SESSION['id_user'] = $user_baru['id'];
        $_SESSION['username'] = $user_baru['username'];

        $_SESSION['success'] = 'Registrasi berhasil! Selamat datang.';

        header("Location: ../dashboard/index.php");
        exit;
       
    } else {
        echo mysqli_error( $conn );
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Artha</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/auth.css">
</head>
<body>

<div class="auth-container">

    <div class="logo">
        <h1><i class="fas fa-piggy-bank"></i> Artha</h1>
    </div>

    <div class="auth-card">

        <a href="../index.php" class="back-link">
            <i class="fas fa-times"></i>
        </a>

        <div class="switch-auth">
            <a href="login.php">
                <i class="fas fa-sign-in-alt"></i> Log In
            </a>
            <a href="register.php" class="active">
                <i class="fas fa-user-plus"></i> Sign Up
            </a>
        </div>

        <h2>Create Account</h2>
        <p>Start your financial journey with Artha</p>

        <form action="" method="POST">

            <div class="input-group">
                <label><i class="fas fa-user" style="margin-right: 6px; color: var(--gold);"></i>Username</label>
                <input type="text" name="username" placeholder="Enter your username" required>
            </div>

            <div class="input-group">
                <label><i class="fas fa-envelope" style="margin-right: 6px; color: var(--gold);"></i>Email</label>
                <input type="email" name="email" placeholder="your@email.com" required>
            </div>

            <div class="input-group">
                <label><i class="fas fa-lock" style="margin-right: 6px; color: var(--gold);"></i>Password</label>
                <input type="password" name="password" placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn-auth" name="register">
                <i class="fas fa-user-plus"></i> Create Account
            </button>

        </form>

    </div>

</div>

</body>
</html>