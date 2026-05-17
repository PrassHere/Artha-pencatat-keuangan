<div class="navbar">

    <!-- SEARCH -->
    <div class="search-box">
        <input type="text" placeholder="Search anything...">
    </div>

    <!-- NOTIFIKASI & PROFIL -->
    <div class="navbar-right">

        <!-- Tombol Notifikasi -->
        <button class="notif-btn">
            <span class="notif-count">3</span>
            🔔
        </button>

        <!-- Komponen Profil  -->
        <div class="profile" id="profileTrigger" style="cursor: pointer;">
            
            <div class="profile-img">A</div>

            <div class="profile-info">
                <h4>User ▾</h4>
            </div>

            <!-- Jendela Dropdown -->
            <div class="profile-dropdown" id="profileDropdown">
                <div class="dropdown-header">
                    <h4>User Aktif</h4>
                    <p>user@artha.com</p>
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
