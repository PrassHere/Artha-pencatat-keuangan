<?php
session_start();

if(isset($_SESSION['user'])){
    header("Location: ../dashboard/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Artha</title>

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
            <a href="login.php">Log In</a>
            <a href="register.php" class="active">Sign Up</a>
        </div>

        <h2>Create Account</h2>
        <p>Start your financial journey with Artha</p>

        <form action="process_register.php" method="POST">

            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit" class="btn-auth">
                Register
            </button>

        </form>

    </div>

</div>

</body>
</html>