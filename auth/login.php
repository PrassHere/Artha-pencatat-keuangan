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

            $_SESSION['success'] = 'Login berhasil!';

            header("Location: ../dashboard/index.php");
            exit;
        
        } else {
            $_SESSION['error'] = 'Email atau password salah!';
            header("Location: login.php");
            exit;
        }
    } else {
        $_SESSION['error'] = 'Email atau password tidak boleh kosong!';
        header("Location: login.php");
        exit;
    }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Artha</title>

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
            <a href="login.php" class="active">
                <i class="fas fa-sign-in-alt"></i> Log In
            </a>
            <a href="register.php">
                <i class="fas fa-user-plus"></i> Sign Up
            </a>
        </div>

        <h2>Welcome Back</h2>
        <p>Login to continue managing your finance</p>

        <form action="" method="POST">

            <div class="input-group">
                <label><i class="fas fa-envelope" style="margin-right: 6px; color: var(--gold);"></i>Email</label>
                <input type="email" name="email" placeholder="your@email.com" required>
            </div>

            <div class="input-group">
                <label><i class="fas fa-lock" style="margin-right: 6px; color: var(--gold);"></i>Password</label>
                <input type="password" name="password" placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn-auth" name="login">
                <i class="fas fa-sign-in-alt"></i> Login
            </button>

        </form>

    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if(isset($_SESSION['error'])) : ?>

<script>
Swal.fire({
    toast: true,
    position: 'top-end',
    icon: 'error',
    title: '<?= $_SESSION['error']; ?>',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true
});
</script>

<?php unset($_SESSION['error']); ?>
<?php endif; ?>

</body>
</html>