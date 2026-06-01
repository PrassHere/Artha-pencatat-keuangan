<?php
session_start();
require '../functions.php';
// Jika user belum memicu session lewat login.php, tendang balik ke form login
if (!isset($_SESSION['id_user'])) {
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

            <?php include "partials/dashboard_cards.php"; ?>

            <div class="dashboard-grid">

                <?php include "partials/dashboard_recent.php"; ?>

                <?php include "partials/dashboard_summary.php"; ?>

            </div>

        </section>

    </main>

</div>


<?php include"partials/modal_tambah.php"; ?>

<script src="../assets/js/modal.js"></script>
<script src="../assets/js/sidebar.js"></script>
<script src="../assets/js/navbar.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if(isset($_SESSION['success'])) : ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil',
    text: '<?= $_SESSION['success']; ?>',
    confirmButtonColor: '#d4af37'
});
</script>
<?php unset($_SESSION['success']); ?>
<?php endif; ?>


<?php if(isset($_SESSION['error'])) : ?>
<script>
Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: '<?= $_SESSION['error']; ?>',
    confirmButtonColor: '#d4af37'
});
</script>
<?php unset($_SESSION['error']); ?>
<?php endif; ?>


</body>
</html>
