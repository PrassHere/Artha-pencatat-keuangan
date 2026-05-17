document.addEventListener("DOMContentLoaded", function () {
    // 1. Ambil path URL saat ini 
    const currentUrl = window.location.pathname;

    // 2. Ambil elemen komponen dari HTML
    const menuDashboard = document.getElementById('menu-dashboard');
    const menuTransaksi = document.getElementById('menu-transaksi');

    // 3. Logika pengecekan halaman
    if (currentUrl.includes('/transaksi/')) {
        // Jika sedang di halaman transaksi:
        menuTransaksi.classList.add('active');
        
        // Sesuaikan link href agar tidak masuk berulang-ulang
        menuDashboard.setAttribute('href', '../index.php');
        menuTransaksi.setAttribute('href', 'index.php');
    } else {
        // Jika sedang di halaman utama dashboard:
        menuDashboard.classList.add('active');
        
        menuDashboard.setAttribute('href', 'index.php');
        menuTransaksi.setAttribute('href', 'transaksi/index.php');
    }
});
