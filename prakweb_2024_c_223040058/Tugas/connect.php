<?php
$host = 'localhost'; 
$user = 'root'; 
$password = ''; 
$dbname = 'prakweb_2024_c_223040058';

// Membuat koneksi
$conn = new mysqli($host, $user, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
