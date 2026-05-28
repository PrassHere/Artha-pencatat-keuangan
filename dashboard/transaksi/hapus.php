<?php
session_start();
require '../../functions.php';
if( !isset($_SESSION["id_user"])) {
    header("Location: ../../auth/login.php");
    exit;
}
$id_transaksi = $_GET['id'];

if( hapus($id_transaksi) > 0) {
     echo "
    <script>
    alert('data berhasil dihapus');
    document.location.href = 'index.php';
    </script>        
    ";
} else {
    echo "
        <script>
        alert('data gagal dihapus');
        document.location.href = 'index.php';
        </script>        
        ";
}
?>