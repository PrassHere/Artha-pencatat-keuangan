<?php
session_start();
require '../../functions.php';
if (!isset($_SESSION['id_user'])) {
    header("Location: ../auth/login.php");
    exit;
}
$id_transaksi = $_GET['id'];
$isi = query("SELECT * FROM transaksi WHERE id_transaksi = '$id_transaksi'")[0];
if (isset($_POST['ubah_transaksi'])) {
    
    if (ubah($_POST) > 0) {
        echo "
        <script>
            alert('Transaksi berhasil diubah!');
            document.location.href = 'index.php'; 
        </script>
        ";
    } else {
        echo "<script>alert('Gagal mengubah transaksi!');</script>";
    }
}

?>
<div class="modal-overlay" id="transactionModal">

    <div class="modal-box">

        <!-- HEADER -->
        <div class="modal-header">

            <h2>Edit Transaction</h2>

            <button id="closeModal" class="close-btn">
                ✕
            </button>

        </div>

        <!-- FORM -->
        <form class="transaction-form" method="post" action="">

        <!-- untuk input jenis dan id -->        
        <input type="hidden" name="id_transaksi" value="<?= $isi['id_transaksi'];?>">
        <input type="hidden" name="jenis_transaksi" id="input_jenis" value="<?= $isi['jenis_transaksi']; ?>">
            <!-- TYPE -->
            <div class="form-group">

                <label>Transaction Type</label>

                <div class="type-selector">

                    <button 
                        type="button"
                        class="type-btn expense <?= ($isi['jenis_transaksi'] == 'expense') ? 'active' : ''; ?>"
                        onclick="setJenis('expense', this)"
                    >
                        ↗ Expense
                    </button>

                    <button 
                        type="button"
                        class="type-btn income <?= ($isi['jenis_transaksi'] == 'income') ? 'active' : ''; ?>"
                        onclick="setJenis('income', this)"
                    >
                        ↙ Income
                    </button>

                </div>

            </div>

            <!-- AMOUNT -->
            <div class="form-group">

                <label>Amount</label>

                <div class="input-icon">

                    <span>Rp</span>

                    <input 
                        type="number"
                        placeholder="0"
                        name="nominal"
                        value="<?= $isi['nominal']; ?>"
                        required
                    >

                </div>

            </div>

            <!-- CATEGORY + DATE -->
            <div class="form-row">

                <div class="form-group">

                    <label>Category</label>

                    <select name="kategori">

                        <option value="food" <?= ($isi['kategori'] == 'food') ? 'selected' : ''; ?>>Food</option>
                        <option value="transport" <?= ($isi['kategori'] == 'transport') ? 'selected' : ''; ?>>Transport</option>
                        <option value="shopping" <?= ($isi['kategori'] == 'shopping') ? 'selected' : ''; ?>>Shopping</option>
                        <option value="salary" <?= ($isi['kategori'] == 'salary') ? 'selected' : ''; ?>>Salary</option>
                        <option value="etc" <?= ($isi['kategori'] == 'etc') ? 'selected' : ''; ?>>etc</option>

                    </select>

                </div>

                <div class="form-group">

                    <label>Date</label>

                    <input type="date" name="tanggal" required value="<?= $isi['tanggal']; ?>">

                </div>

            </div>

            <!-- DESCRIPTION -->
            <div class="form-group">

                <label>Description</label>

                <textarea 
                    placeholder="What was this transaction for?" name="catatan"
                ><?= $isi['catatan']; ?></textarea>

            </div>

            <!-- FOOTER -->
            <div class="modal-footer">

                <button 
                    type="button"
                    class="cancel-btn"
                    id="cancelModal"
                    onclick="window.location.href='index.php'"
                >
                    Cancel
                </button>

                <button 
                    type="submit"
                    class="submit-btn"
                    name="ubah_transaksi"
                >
                     Save Changes
                </button>

            </div>

        </form>

    </div>

</div>
<script>
    function setJenis(jenis, btn) {
        // 1. Ubah nilai input tersembunyi
        document.getElementById('input_jenis').value = jenis;

        // 2. Hapus class 'active' dari semua tombol
        let buttons = document.querySelectorAll('.type-btn');
        buttons.forEach(b => b.classList.remove('active'));

        // 3. Tambahkan class 'active' ke tombol yang sedang diklik
        btn.classList.add('active');
    }
</script>