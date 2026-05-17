<?php
session_start();

// Jika user belum login, tendang balik ke form login
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../auth/login.php");
    exit;
}
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

                <button class="export-btn">
                    Export CSV
                </button>

            </div>


            <!-- Periksa jika ada data transaksi -->
            <!-- Sekalian di periksa ya mas ilham, kira kira ini guna apa engga -->
            <!-- ini cuman biar kkeliatan ada isinya aja -->
            <!-- nanti kalo data nya kosongan bisa jadi ide tampilan defaultnya -->
            <?php include  "partials/transaksi_filters.php"; ?>

            <?php
                $hasData = false;

                if($hasData){
                    include  "partials/transaksi_table.php";
                }else{
                    include  "partials/transaksi_empty.php";
                }
            ?>

        </section>

    </main>

</div>
<script src="../../assets/js/sidebar.js"></script>
<script src="../../assets/js/navbar.js"></script>
</body>
</html>