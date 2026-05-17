<?php
session_start();

// Jika user belum memicu session lewat login.php, tendang balik ke form login
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Artha</title>

    <link rel="stylesheet" href="../assets/css/dashboard.css">
</head>
<body>

<div class="dashboard-layout">

    <!-- SIDEBAR -->
    <?php include "partials/sidebar.php"; ?>

    <!-- MAIN CONTENT -->
    <main class="main-content">

        
        <?php include "partials/navbar.php"; ?>

        <!-- CONTENT -->
        <section class="dashboard-content">

            <div class="welcome-box">
                <h1>Financial Dashboard</h1>
                <p>
                    Monitor your transactions, income, expenses,
                    and financial insights in one place.
                </p>
            </div>

        </section>

    </main>

</div>
   
    <script src="../assets/js/sidebar.js"></script>
    <script src="../assets/js/navbar.js"></script>
</body>
</html>
