<?php
if (!isset($_SESSION['id_user'])) {
    header("Location: ../../../auth/login.php");
    exit;
}
?>
<div class="filters-box" >

    <a href="?filter_date=today" class="filter-btn <?= (isset($_GET['filter_date']) && $_GET['filter_date'] == 'today') ? 'active' : ''; ?>">Today</a>
    
    <a href="?filter_date=month" class="filter-btn <?= (isset($_GET['filter_date']) && $_GET['filter_date'] == 'month') ? 'active' : ''; ?>">This Month</a>
    
    <a href="?filter_date=year" class="filter-btn <?= (isset($_GET['filter_date']) && $_GET['filter_date'] == 'year') ? 'active' : ''; ?>">This Year</a>
    
    <a href="index.php" class="filter-btn <?= (!isset($_GET['filter_date']) && !isset($_GET['custom_date'])) ? 'active' : ''; ?>">All Time</a>

    <form action="" method="get" style="display: flex; gap: 5px; margin-left: auto;">
        
        <?php if (isset($_GET['keyword'])): ?>
            <input type="hidden" name="keyword" value="<?= htmlspecialchars($_GET['keyword']); ?>">
        <?php endif; ?>

        <input 
            type="date" 
            name="custom_date" 
            value="<?= isset($_GET['custom_date']) ? $_GET['custom_date'] : ''; ?>" 
            style="padding: 6px; border: 1px solid #ccc; border-radius: 4px; outline: none;"
            required
        >
        <button type="submit" class="filter-btn" style="cursor: pointer;">Go</button>
    </form>

</div>