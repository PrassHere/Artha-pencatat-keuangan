<?php
session_start();
require '../../functions.php';

if (!isset($_SESSION['id_user'])) {
    header("Location: ../../auth/login.php");
    exit;
}
$id_user = $_SESSION['id_user'];
$query_transaksi = mysqli_query($conn, "SELECT * FROM transaksi WHERE id_user = '$id_user' ORDER BY tanggal DESC");
$jumlah_data = mysqli_num_rows($query_transaksi);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions - Artha</title>

    <link rel="stylesheet" href="../../assets/css/dashboard.css">
    <link rel="stylesheet" href="../../assets/css/transaksi.css">
</head>
<body>

<div class="dashboard-layout">

    <?php include "../partials/sidebar.php"; ?>

    <main class="main-content">

        <?php include "../partials/navbar.php"; ?>

        <section class="transaction-page">

            <div class="page-header">

                <div>
                    <h1>Activity Ledger</h1>
                    <p>
                        Keep track of your academic and personal expenses
                    </p>
                </div>

            </div>


            <!-- Periksa jika ada data transaksi -->
            <!-- Sekalian di periksa ya mas ilham, kira kira ini guna apa engga -->
            <!-- ini cuman biar kkeliatan ada isinya aja -->
            <!-- nanti kalo data nya kosongan bisa jadi ide tampilan defaultnya -->
            <?php include  "partials/transaksi_filters.php"; ?>

            <?php
                $hasData = ($jumlah_data > 0);

                if($hasData){
                    include  "partials/transaksi_table.php";
                }else{
                    include  "partials/transaksi_empty.php";
                }
            ?>

        </section>

    </main>

<?php include "../partials/modal_tambah.php"; ?>

</div>
<script src="../../assets/js/modal.js"></script>
<script src="../../assets/js/sidebar.js"></script>
<script src="../../assets/js/navbar.js"></script>
</body>
</html>