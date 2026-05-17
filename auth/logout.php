<?php

//mas ilham tolong nanti jelaskan ini ya

session_start();

// 1. Kosongkan semua data session
$_SESSION = array();

// 2. Hancurkan session di server
session_destroy();

// 3. Bersihkan cookie session di browser pengguna
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 4. Dialihkan keluar dari folder dashboard menuju folder auth/login.php
header("Location: ../auth/login.php"); 
exit;
?>

