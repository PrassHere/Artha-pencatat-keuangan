```php
<?php
session_start();
require '../../functions.php';

if (!isset($_SESSION['id_user'])) {

    header("Location: ../../auth/login.php");
    exit;
}

$id_transaksi = $_GET['id'];

$data = query(
    "SELECT * FROM transaksi 
     WHERE id_transaksi = '$id_transaksi'"
)[0];

if(isset($_POST['ubah_transaksi'])){

    if(ubah($_POST) > 0){

        $_SESSION['success'] =
        "Transaction updated successfully!";

        header("Location: index.php");
        exit;

    }else{

        $_SESSION['error'] = "Failed to update transaction!";

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Transaction</title>

    <link rel="stylesheet" href="../../assets/css/edit-transaksi.css">

</head>
<body>

<div class="edit-overlay">

    <div class="edit-box">

        <!-- HEADER -->
        <div class="edit-header">

            <div>
                <h1>Edit Transaction</h1>
                <p>Update your financial activity</p>
            </div>

            <a href="index.php" class="close-btn">
                ✕
            </a>

        </div>

        <!-- FORM -->
        <form method="post" class="edit-form">

            <input 
                type="hidden" 
                name="id_transaksi"
                value="<?= $data['id_transaksi']; ?>"
            >

            <input 
                type="hidden" 
                name="jenis_transaksi"
                id="input_jenis"
                value="<?= $data['jenis_transaksi']; ?>"
            >

            <!-- TYPE -->
            <div class="form-group">

                <label>Transaction Type</label>

                <div class="type-selector">

                    <button
                        type="button"
                        class="type-btn expense <?= ($data['jenis_transaksi'] == 'expense') ? 'active' : ''; ?>"
                        onclick="setJenis('expense', this)"
                    >
                        ↘ Expense
                    </button>

                    <button
                        type="button"
                        class="type-btn income <?= ($data['jenis_transaksi'] == 'income') ? 'active' : ''; ?>"
                        onclick="setJenis('income', this)"
                    >
                        ↗ Income
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
                        name="nominal"
                        required
                        value="<?= $data['nominal']; ?>"
                    >

                </div>

            </div>

            <!-- ROW -->
            <div class="form-row">

                <div class="form-group">

                    <label>Category</label>

                    <select name="kategori">

                        <option value="food"
                        <?= ($data['kategori'] == 'food') ? 'selected' : ''; ?>>
                            Food
                        </option>

                        <option value="transport"
                        <?= ($data['kategori'] == 'transport') ? 'selected' : ''; ?>>
                            Transport
                        </option>

                        <option value="shopping"
                        <?= ($data['kategori'] == 'shopping') ? 'selected' : ''; ?>>
                            Shopping
                        </option>

                        <option value="salary"
                        <?= ($data['kategori'] == 'salary') ? 'selected' : ''; ?>>
                            Salary
                        </option>

                        <option value="etc"
                        <?= ($data['kategori'] == 'etc') ? 'selected' : ''; ?>>
                            Etc
                        </option>

                    </select>

                </div>

                <div class="form-group">

                    <label>Date</label>

                    <input
                        type="date"
                        name="tanggal"
                        required
                        value="<?= $data['tanggal']; ?>"
                    >

                </div>

            </div>

            <!-- DESCRIPTION -->
            <div class="form-group">

                <label>Description</label>

                <textarea
                    name="catatan"
                    placeholder="Transaction note..."
                ><?= $data['catatan']; ?></textarea>

            </div>

            <!-- FOOTER -->
            <div class="form-footer">

                <a href="index.php" class="cancel-btn">
                    Cancel
                </a>

                <button
                    type="submit"
                    name="ubah_transaksi"
                    class="submit-btn"
                >
                    Save Changes
                </button>

            </div>

        </form>

    </div>

</div>

<script>

function setJenis(jenis, btn){

    document.getElementById("input_jenis").value = jenis;

    const buttons = document.querySelectorAll(".type-btn");

    buttons.forEach(button => {
        button.classList.remove("active");
    });

    btn.classList.add("active");
}

</script>

<script>
const alertBox = document.querySelector('.alert');

if(alertBox){
    setTimeout(() => {
        alertBox.style.opacity = "0";
        alertBox.style.transform = "translateY(-10px)";

        setTimeout(() => {
            alertBox.remove();
        },300);
    },3000);
}
</script>

</body>
</html>
```
