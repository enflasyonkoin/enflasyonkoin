<?php
$servername = "localhost"; // Veritabanı sunucusu adı (localhost)
$username = "yzissite_admin"; // Kullanıcı adı
$password = "PAeWwC{ztpDt"; // Şifre
$dbname = "yzissite_enflasyonkoin"; // Veritabanı adı

// Veritabanı bağlantısını oluşturun
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantayı kontrol edin
if ($conn->connect_error) {
    die("Veritabanı bağlantı hatası: " . $conn->connect_error);
}
?>
