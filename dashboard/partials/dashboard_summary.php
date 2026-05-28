<?php
if (!isset($_SESSION['id_user'])) {
    header("Location: ../../auth/login.php");
    exit;
}
$id_user = $_SESSION['id_user'];
//total terbesar
$query_total = mysqli_query($conn,"SELECT COUNT(id_transaksi) as total FROM transaksi WHERE id_user = '$id_user'");
$total_baris = mysqli_fetch_assoc($query_total);
$total_transaction = $total_baris['total'];

//kategori pengeluaran terbesar
$query_expenseTerbanyak = mysqli_query($conn,   "SELECT kategori FROM transaksi 
                                                WHERE id_user = '$id_user' AND jenis_transaksi = 'expense' 
                                                GROUP BY kategori 
                                                ORDER BY SUM(nominal) DESC LIMIT 1");
$expenseTerbanyak = "-";
if (mysqli_num_rows($query_expenseTerbanyak) > 0) {
    $expenseTerbanyak = ucfirst(mysqli_fetch_assoc($query_expenseTerbanyak)['kategori']);
}

//jumlah pengeluaran terbesar
$query_pengeluaranTerbesar = mysqli_query($conn, "SELECT MAX(nominal) as terbesar FROM transaksi WHERE 
                                                    id_user = '$id_user' AND jenis_transaksi = 'expense'");
$total_barisPengeluaran = mysqli_fetch_assoc($query_pengeluaranTerbesar);
$pengeluaran_terbesar = $total_barisPengeluaran['terbesar'] != null ? $total_barisPengeluaran['terbesar'] : 0;                                                    

// income terakhir
$query_incomeTerakhir = mysqli_query($conn, "SELECT nominal FROM transaksi 
                                            WHERE id_user = '$id_user' AND jenis_transaksi = 'income' 
                                            ORDER BY tanggal DESC, id_transaksi DESC LIMIT 1");
$income_terakhir = 0;
if (mysqli_num_rows($query_incomeTerakhir) > 0) {
    $income_terakhir = mysqli_fetch_assoc($query_incomeTerakhir)['nominal'];
}                                            
?>
<div class="dashboard-box summary-box">

    <h2>Financial Summary</h2>

    <div class="summary-list">

        <div class="summary-item">

            <span>Total Transactions</span>

            <strong><?= $total_transaction; ?></strong>

        </div>

        <div class="summary-item">

            <span>Most Expense</span>

            <strong><?= $expenseTerbanyak; ?></strong>

        </div>

        <div class="summary-item">

            <span>Biggest Spending</span>

            <strong>Rp <?= number_format($pengeluaran_terbesar, 0, ',', '.' ); ?></strong>

        </div>

        <div class="summary-item">

            <span>Latest Income</span>

            <strong>Rp <?= number_format($income_terakhir, 0, ',', '.'); ?></strong>

        </div>

    </div>

</div>