<?php 
// koneksi database
$conn = mysqli_connect("localhost","root","","db_artha");

function registrasi ($data) {
    global $conn;

    $email = trim($data['email']);
    $password = trim($data['password']);

    if(empty($data['username'])) {
        echo "
        <script>alert('username masih kosong!');</script>
        ";
        return false;
    }else {
        $username = trim($data['username']);
    }
    if(empty($email)) {
        echo "
        <script>alert('email masih kosong!');</script>
        ";
        return false;
    } else {
        $email_aman = mysqli_real_escape_string($conn,$email);
    }
    $result = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email_aman'");
    if (mysqli_fetch_assoc($result)) {
        echo "
        <script>alert('email sudah terdaftar!');</script>
        ";
        return false;
    }
    if(empty($password)) {
        echo "
        <script>alert('password masih kosong!');</script>
        ";
        return false;
    } else {
        $password_aman = mysqli_real_escape_string($conn,$password);
    }

    mysqli_query($conn, "INSERT INTO user VALUES('','$username','$email_aman','$password_aman')");

    return mysqli_affected_rows($conn);
    
}
function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function tambah ($data){
    global $conn;

    $id_user = $_SESSION['id_user'];
    $jenis    = trim($data['jenis']);
    $kategori = trim($data['kategori']);
    $tanggal  = trim($data['tanggal']);
    $nominal  = trim($data['nominal']);
    $catatan  = trim($data['catatan']);

    if (empty($jenis) || empty($kategori) || empty($tanggal) || empty($nominal)) {
        echo "
        <script>alert('Semua data wajib diisi (kecuali catatan)!');</script>
        ";
        return false; 
    }

    
    $jenis_aman    = mysqli_real_escape_string($conn, htmlspecialchars($jenis));
    $kategori_aman = mysqli_real_escape_string($conn, htmlspecialchars($kategori));
    $tanggal_aman  = mysqli_real_escape_string($conn, htmlspecialchars($tanggal));
    $catatan_aman  = mysqli_real_escape_string($conn, htmlspecialchars($catatan));    
    $nominal_aman  = (float)$nominal; 

    $query = "INSERT INTO transaksi VALUES (
        '', 
        '$id_user', 
        '$jenis_aman', 
        '$kategori_aman', 
        '$tanggal_aman', 
        '$nominal_aman', 
        '$catatan_aman'
    )";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function ubah ($data){
    global $conn;

    $id_transaksi = $data['id_transaksi'];
    $jenis    = trim($data['jenis_transaksi']);
    $kategori = trim($data['kategori']);
    $tanggal  = trim($data['tanggal']);
    $nominal  = trim($data['nominal']);
    $catatan  = trim($data['catatan']);

    if (empty($jenis) || empty($kategori) || empty($tanggal) || empty($nominal)) {
        echo "
        <script>alert('Semua data wajib diisi (kecuali catatan)!');</script>
        ";
        return false; 
    }

    
    $jenis_aman    = mysqli_real_escape_string($conn, htmlspecialchars($jenis));
    $kategori_aman = mysqli_real_escape_string($conn, htmlspecialchars($kategori));
    $tanggal_aman  = mysqli_real_escape_string($conn, htmlspecialchars($tanggal));
    $catatan_aman  = mysqli_real_escape_string($conn, htmlspecialchars($catatan));    
    $nominal_aman  = (float)$nominal; 

    $query = "UPDATE transaksi SET 
                jenis_transaksi = '$jenis_aman', 
                kategori = '$kategori_aman', 
                tanggal = '$tanggal_aman', 
                nominal = '$nominal_aman', 
                catatan = '$catatan_aman'
              WHERE id_transaksi = '$id_transaksi'
    ";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus($id_transaksi) {
    global $conn;
    mysqli_query( $conn,"DELETE FROM transaksi WHERE id_transaksi = '$id_transaksi'");
    return mysqli_affected_rows($conn);
}
function cari($keyword, $id_user, $awalData, $jumlahDataPerHalaman) {
    global $conn;
    
    $keyword = mysqli_real_escape_string($conn, $keyword);
        
    $query = "SELECT * FROM transaksi WHERE 
                id_user = '$id_user' AND (
                jenis_transaksi LIKE '%$keyword%' OR
                kategori LIKE '%$keyword%' OR
                tanggal LIKE '%$keyword%' OR
                nominal LIKE '%$keyword%' OR
                catatan LIKE '%$keyword%'
                )
              ORDER BY tanggal DESC 
              LIMIT $awalData, $jumlahDataPerHalaman";
              
    return query($query);
}

// Fungsi  untuk menghitung total baris pencarian 
function hitungCari($keyword, $id_user) {
    global $conn;
    $keyword = mysqli_real_escape_string($conn, $keyword);
    
    $query = "SELECT * FROM transaksi WHERE 
                id_user = '$id_user' AND (
                jenis_transaksi LIKE '%$keyword%' OR
                kategori LIKE '%$keyword%' OR
                tanggal LIKE '%$keyword%' OR
                nominal LIKE '%$keyword%' OR
                catatan LIKE '%$keyword%'
                )";
                
    return count(query($query));
}
?>
