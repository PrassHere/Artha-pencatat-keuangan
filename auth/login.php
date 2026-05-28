<?php
session_start();
require '../functions.php';

// Jika user ternyata sudah login, langsung alihkan ke dashboard agar tidak masuk ke halaman login lagi
if (isset($_SESSION['id_user'])) {
    header("Location: ../dashboard/index.php");
    exit;
}

if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (!empty($email) && !empty($password)){
        $email_aman = mysqli_real_escape_string($conn,$email);
        $password_aman = mysqli_real_escape_string($conn,$password);
        $result = mysqli_query($conn,"SELECT * FROM user WHERE email = '$email_aman' AND password = '$password_aman'");
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

            $_SESSION['id_user'] = $row['id'];
            $_SESSION['username'] = $row['username'];

            echo "
                <script> 
                alert('Login Berhasil!');
                document.location.href = '../dashboard/index.php';
                </script>
            ";
            exit;
        
        } else {
            echo "<script>alert('Email atau password salah!');</script>";
        }
    } else {
    echo "<script>alert('Email atau password tidak boleh kosong!');</script>";
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
                <label>Email</label>
                <input type="email" name="email" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit" class="btn-auth" name="login">
                Login
            </button>

        </form>

    </div>

</div>

</body>
</html>