<?php
if (!isset($_SESSION['id_user'])) {
    header("Location: ../../auth/login.php");
    exit;
}
$id_user  = $_SESSION['id_user'];
$query_tampilan = mysqli_query($conn, "SELECT * FROM transaksi WHERE id_user = '$id_user' ORDER BY tanggal DESC LIMIT 5");
?>
<div class="dashboard-box recent-box">

    <div class="section-header">

        <h2>Recent Transactions</h2>

        <a href="../dashboard/transaksi/index.php">
            View All
        </a>

    </div>

    <div class="recent-list">
        <?php if (mysqli_num_rows($query_tampilan) > 0) : ?>

            <?php while ($row = mysqli_fetch_assoc($query_tampilan)) : ?>

        <div class="recent-item">

            <div>

                <h4><?= htmlspecialchars($row['catatan']); ?></h4>

                <span><?= ucfirst($row['kategori']); ?></span>

            </div>
            <?php if ($row['jenis_transaksi'] == 'income') : ?>
                <p class="income-text">
                + Rp <?= number_format($row['nominal'], 0, ',', '.'); ?>
                </p>
            <?php else : ?>
                <p class="expense-text">
                - Rp <?= number_format($row['nominal'], 0, ',', '.'); ?>
                </p>
            <?php endif; ?>
        </div>
            <?php endwhile; ?>

        <?php else : ?>
            
            <p style="text-align: center; color: #888; padding: 20px 0;">Belum ada transaksi.</p>
            
        <?php endif; ?>

    </div>

</div>