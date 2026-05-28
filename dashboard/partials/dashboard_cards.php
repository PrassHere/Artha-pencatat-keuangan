<?php

if (!isset($_SESSION['id_user'])) {
    header("Location: ../../auth/login.php");
    exit;
}
$id_user = $_SESSION['id_user'];
// menghitung income
$query_income = mysqli_query($conn, "SELECT SUM(nominal) AS total_income FROM transaksi WHERE id_user = '$id_user' AND jenis_transaksi = 'income'");
$data_income = mysqli_fetch_assoc($query_income);
$total_income = $data_income['total_income'] ?? 0; // Jika kosong/null, jadikan 0

// menghitung expense
$query_expense = mysqli_query($conn, "SELECT SUM(nominal) AS total_expense FROM transaksi WHERE id_user = '$id_user' AND jenis_transaksi = 'expense'");
$data_expense = mysqli_fetch_assoc($query_expense);
$total_expense = $data_expense['total_expense'] ?? 0; 

//Hitung Saldo Utama (Balance)
$total_balance = $total_income - $total_expense;

// ==========================================
// 4. MENGHITUNG SALDO BULAN LALU (Untuk Persentase)
// ==========================================
// Ambil Income s/d akhir bulan lalu (tanggal < tanggal 1 bulan ini)
$q_in_last = mysqli_query($conn, "SELECT SUM(nominal) AS total FROM transaksi WHERE id_user = '$id_user' AND jenis_transaksi = 'income' AND tanggal < DATE_FORMAT(CURDATE(), '%Y-%m-01')");
$in_last = mysqli_fetch_assoc($q_in_last)['total'] ?? 0;

// Ambil Expense s/d akhir bulan lalu
$q_out_last = mysqli_query($conn, "SELECT SUM(nominal) AS total FROM transaksi WHERE id_user = '$id_user' AND jenis_transaksi = 'expense' AND tanggal < DATE_FORMAT(CURDATE(), '%Y-%m-01')");
$out_last = mysqli_fetch_assoc($q_out_last)['total'] ?? 0;

$balance_last_month = $in_last - $out_last;

// Rumus Persentase Pertumbuhan
$percentage = 0;
if ($balance_last_month > 0) {
    $percentage = (($total_balance - $balance_last_month) / $balance_last_month) * 100;
} elseif ($balance_last_month <= 0 && $total_balance > 0) {
    // Jika bulan lalu kosong, tapi bulan ini ada uang masuk, anggap naik 100%
    $percentage = 100; 
}
// Bulatkan ke 1 angka di belakang koma
$percentage_rounded = round($percentage, 1);
?>
<div class="stats-grid">

    <div class="stats-card">

        <span>Total Balance</span>
        <!-- number_format(angka, jumlah desimal, 'pemisah desimal', 'pemisah ribuan') -->
        <h1>Rp <?= number_format($total_balance, 0, ',', '.'); ?></h1>

        <?php if ($percentage_rounded > 0): ?>
            <p class="positive">+<?= $percentage_rounded; ?>% from last month</p>
        
        <?php elseif ($percentage_rounded < 0): ?>
            <p class="negative" style="color: #c00000;"><?= $percentage_rounded; ?>% from last month</p>
        
        <?php else: ?>
            <p style="color: #888; font-weight: bold; margin-top: 5px; font-size: 0.9em;">0% from last month</p>
        <?php endif; ?>
    </div>

    <div class="stats-card income-card">

        <div class="card-icon income-icon">
            ↗
        </div>

        <span>Total Income</span>

        <h2>Rp <?= number_format($total_income, 0, ',', '.'); ?></h2>

    </div>

    <div class="stats-card expense-card">

        <div class="card-icon expense-icon">
            ↘
        </div>
        
        <span>Total Expense</span>

        <h2>Rp <?= number_format($total_expense, 0, ',', '.'); ?></h2>

    </div>

</div>