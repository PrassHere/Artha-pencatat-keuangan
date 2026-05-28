<?php
if (!isset($_SESSION['id_user'])) {
    header("Location: ../../../auth/login.php");
    exit;
}
?>
<div class="empty-state">

    <div class="empty-icon">
        📭
    </div>

    <h2>No Transactions Yet</h2>

    <p>
        Start tracking your income and expenses
        by adding your first transaction.
    </p>

    <button class="openModal empty-btn">
        + Add Transaction
    </button>

</div>

