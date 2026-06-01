<?php
session_start();
require '../../functions.php';

if (!isset($_SESSION['id_user'])) {
    header("Location: ../../auth/login.php");
    exit;
}

$id_transaksi = $_GET['id'];

if (hapus($id_transaksi) > 0) {

    $_SESSION['success'] = "Transaction deleted successfully!";

} else {

    $_SESSION['error'] = "Failed to delete transaction!";

}

header("Location: index.php");
exit;