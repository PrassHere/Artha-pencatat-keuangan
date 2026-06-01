<?php
if (!isset($_SESSION['id_user'])) {
    header("Location: ../../../auth/login.php");
    exit;
}

$id_user = $_SESSION['id_user'];
$jumlahDataPerHalaman = 5;

// ==========================================
// 1. LOGIKA PINTAR: GABUNGKAN FILTER & SEARCH
// ==========================================
$sql_filter = "";

// A. Tangkap Filter Tanggal
if (isset($_GET['filter_date'])) {
    if ($_GET['filter_date'] == 'today') {
        // CURDATE() adalah rumus SQL untuk mendapatkan tanggal hari ini
        $sql_filter .= " AND DATE(tanggal) = CURDATE() ";
    } elseif ($_GET['filter_date'] == 'month') {
        $sql_filter .= " AND MONTH(tanggal) = MONTH(CURDATE()) AND YEAR(tanggal) = YEAR(CURDATE()) ";
    } elseif ($_GET['filter_date'] == 'year') {
        $sql_filter .= " AND YEAR(tanggal) = YEAR(CURDATE()) ";
    }
} elseif (isset($_GET['custom_date']) && $_GET['custom_date'] != "") {
    $custom_date = mysqli_real_escape_string($conn, $_GET['custom_date']);
    $sql_filter .= " AND DATE(tanggal) = '$custom_date' ";
}

// B. Tangkap Pencarian Teks
if (isset($_GET['keyword']) && $_GET['keyword'] != "") {
    $keyword = mysqli_real_escape_string($conn, $_GET['keyword']);
    $sql_filter .= " AND (jenis_transaksi LIKE '%$keyword%' OR kategori LIKE '%$keyword%' OR catatan LIKE '%$keyword%') ";
}

// ==========================================
// 2. RUMUS HALAMAN (PAGINATION)
// ==========================================
// Gabungkan "WHERE" dengan filter yang sudah dibuat di atas
$kondisi_sql = "WHERE id_user = '$id_user' " . $sql_filter;

$jumlahdata = count(query("SELECT id_transaksi FROM transaksi $kondisi_sql"));
$jumlahHalaman = ceil($jumlahdata / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET['halaman'])) ? (int)$_GET['halaman'] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;




// ==========================================
// 3. EKSEKUSI PENARIKAN DATA
// ==========================================
$transaksi = query("SELECT * FROM transaksi $kondisi_sql ORDER BY tanggal DESC,id_transaksi DESC LIMIT $awalData, $jumlahDataPerHalaman");

// ==========================================
// 4. AMANKAN LINK (Bawa filter saat pindah halaman)
// ==========================================
$url_params = "";
if (isset($_GET['keyword'])) $url_params .= "&keyword=" . urlencode($_GET['keyword']);
if (isset($_GET['filter_date'])) $url_params .= "&filter_date=" . urlencode($_GET['filter_date']);
if (isset($_GET['custom_date'])) $url_params .= "&custom_date=" . urlencode($_GET['custom_date']);

?>
<div class="transaction-table-container">
    
    <table class="transaction-table">
        
        <thead>
            
            <tr>                
                <th>Date</th>
                <th>Description</th>
                <th>Category</th>
                <th>Type</th>
                <th>Amount</th>  
                <th>Actions</th>              
            </tr>
            
        </thead>
        
        <tbody>        
            <?php foreach($transaksi as $row): ?>
                <tr>                        
                    <td><?= $row["tanggal"];?></td>
                    <td><?= $row["catatan"]; ?></td>
                    <td><?= $row["kategori"]; ?></td>
                    <td><?= $row["jenis_transaksi"]; ?></td>
                    <td><?= $row["nominal"]; ?></td>
                    <td>
                        <a href="ubah.php?id=<?= $row['id_transaksi']; ?>"
                            class="edit-btn open-edit-confirm">
                                Ubah
                        </a>
                        |
                        <a href="hapus.php?id=<?= $row['id_transaksi']; ?>"
                            class="delete-btn open-delete-confirm">
                                Hapus
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>

                <?php
                $jumlahBarisKosong = $jumlahDataPerHalaman - count($transaksi);

                    for($i = 0; $i < $jumlahBarisKosong; $i++):
                ?>
                <tr class="empty-row">
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php endfor; ?>
                
            </tr>
            
        </tbody>
        
    </table>
    
    <div class="pagination">

    <?php if($halamanAktif > 1): ?>
        <a class="page-btn"
           href="?halaman=<?= $halamanAktif - 1 ?><?= $url_params ?>">
            &laquo;
        </a>

      <?php else: ?>

        <span class="page-btn disabled">
            &laquo;
        </span>  
    <?php endif; ?>

    <?php
        $start = max(1, $halamanAktif - 2);
        $end = min($jumlahHalaman, $halamanAktif + 2);
    ?>

    <?php if($start > 1): ?>
        <a class="page-btn"
           href="?halaman=1<?= $url_params ?>">
            1
        </a>

        <?php if($start > 2): ?>
            <span class="dots">...</span>
        <?php endif; ?>
    <?php endif; ?>

    <?php for($i = $start; $i <= $end; $i++): ?>

        <a
            href="?halaman=<?= $i ?><?= $url_params ?>"
            class="page-btn <?= ($i == $halamanAktif) ? 'active' : '' ?>">
            <?= $i ?>
        </a>

    <?php endfor; ?>

    <?php if($end < $jumlahHalaman): ?>

        <?php if($end < $jumlahHalaman - 1): ?>
            <span class="dots">...</span>
        <?php endif; ?>

        <a class="page-btn"
           href="?halaman=<?= $jumlahHalaman ?><?= $url_params ?>">
            <?= $jumlahHalaman ?>
        </a>

    <?php endif; ?>

    <?php if($halamanAktif < $jumlahHalaman): ?>
        <a class="page-btn"
           href="?halaman=<?= $halamanAktif + 1 ?><?= $url_params ?>">
            &raquo;
        </a>

      <?php else: ?>

        <span class="page-btn disabled">
        &raquo;
        </span>
    <?php endif; ?>

    </div>
</div>