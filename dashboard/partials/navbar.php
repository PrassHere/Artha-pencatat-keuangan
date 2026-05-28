<?php 
if (!isset($_SESSION['id_user'])) {
    header("Location: ../../auth/login.php");
    exit;
}

$username = $_SESSION['username'];
$result = mysqli_query($conn, "SELECT email FROM user WHERE username = '$username'");
$ambil_email = mysqli_fetch_assoc($result);
$email = $ambil_email['email']
?>

<div class="navbar">

    <!-- SEARCH -->
    <div class="search-box">
        <?php 
        $search_action = (strpos($_SERVER['SCRIPT_NAME'], '/transaksi/') !== false) ? 'index.php' : 'transaksi/index.php';
        ?>
        <form action="<?= $search_action; ?>" method="get" style="display: flex; width: 100%; margin: 0;">
            <input 
                type="text" 
                name="keyword" 
                placeholder="Search anything..."
                value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>"
                autocomplete="off"                
            >
            <button type="submit" style="display: none;">Cari</button>
        </form>
    </div>

    <!-- NOTIFIKASI & PROFIL -->
    <div class="navbar-right">

        <!-- Komponen Profil  -->
        <div class="profile" id="profileTrigger" style="cursor: pointer;">
            
            <div class="profile-img">
                 <?= strtoupper(substr($username, 0, 1)); ?>
            </div>

            <div class="profile-info">
                <h4><?= htmlspecialchars($username); ?> ▾</h4>
            </div>

            <!-- Jendela Dropdown -->
            <div class="profile-dropdown" id="profileDropdown">
                <div class="dropdown-header">
                    <h4><?= htmlspecialchars($username); ?> Aktif</h4>
                    <p><?= htmlspecialchars($email); ?></p>
                </div>
                <hr>
                <div class="dropdown-body">
                    <a href="#" class="dropdown-item">Settings</a>
                    <a href="<?php echo (strpos($_SERVER['SCRIPT_NAME'], '/transaksi/') !== false) ? '../../auth/logout.php' : '../auth/logout.php'; ?>" class="dropdown-item logout-btn">Logout</a>
                </div>
            </div>

        </div> 

    </div> 

</div> 
