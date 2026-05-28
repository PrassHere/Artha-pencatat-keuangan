<?php
if (!isset($_SESSION['id_user'])) {
    header("Location: ../../auth/login.php");
    exit;
}
?>
<aside class="sidebar">
    <div class="sidebar-top">
        <div class="logo">
            <h2>Artha</h2>
            <span>Personal Finance Manager</span>
        </div>

        <nav class="menu">
            <a href="#" class="menu-item" id="menu-dashboard">Dashboard</a>
            <a href="#" class="menu-item" id="menu-transaksi">Transactions</a>
        </nav>
    </div>

    <div class="sidebar-bottom">
        <button class="openModal add-btn">
            + Add Transaction
        </button>
    </div>
</aside>
