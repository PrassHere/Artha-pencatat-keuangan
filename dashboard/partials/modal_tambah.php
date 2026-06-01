<div class="modal-overlay" id="transactionModal">

    <div class="modal-box">

        <!-- HEADER -->
        <div class="modal-header">

            <h2>Add Transaction</h2>

            <button data-close-modal class="close-btn">
                ✕
            </button>

        </div>

        <!-- FORM -->
        <form class="transaction-form" method="post" action="/coding%20php/Artha/dashboard/transaksi/tambah.php">

        <!-- untuk input jenis -->
            <input type="hidden" name="jenis" id="input_jenis" value="expense">

            <input
                type="hidden"
                name="redirect"
                value="<?= $_SERVER['REQUEST_URI']; ?>"
            >
            <!-- TYPE -->
            <div class="form-group">

                <label>Transaction Type</label>

                <div class="type-selector">

                    <button 
                        type="button"
                        class="type-btn expense active"
                        onclick="setJenis('expense', this)"
                    >
                        ↗ Expense
                    </button>

                    <button 
                        type="button"
                        class="type-btn income"
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
                        required
                    >

                </div>

            </div>

            <!-- CATEGORY + DATE -->
            <div class="form-row">

                <div class="form-group">

                    <label>Category</label>

                    <select name="kategori">

                        <option value="food">Food</option>
                        <option value="transport">Transport</option>
                        <option value="shopping">Shopping</option>
                        <option value="salary">Salary</option>
                        <option value="etc">etc</option>

                    </select>

                </div>

                <div class="form-group">

                    <label>Date</label>

                    <input type="date" name="tanggal" required>

                </div>

            </div>

            <!-- DESCRIPTION -->
            <div class="form-group">

                <label>Description</label>

                <textarea 
                    placeholder="What was this transaction for?" name="catatan"
                ></textarea>

            </div>

            <!-- FOOTER -->
            <div class="modal-footer">

                <button 
                    type="button"
                    class="cancel-btn"
                    data-close-modal
                >
                    Cancel
                </button>

                <button 
                    type="submit"
                    class="submit-btn"
                    name="tambah_transaksi"
                >
                    Save Transaction
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