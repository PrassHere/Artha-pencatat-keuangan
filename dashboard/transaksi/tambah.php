<?php

session_start();
require '../../functions.php';

if (!isset($_SESSION['id_user'])) {
    header("Location: ../../auth/login.php");
    exit;
}

if (isset($_POST['tambah_transaksi'])) {

    if (tambah($_POST) > 0) {
        $_SESSION['success'] = "Transaction added successfully!";
    } else {
        $_SESSION['error'] = "Failed to add transaction!";
    }

    $redirect = $_POST['redirect'] ?? 'index.php';

    header("Location: " . $redirect);
    exit;
}