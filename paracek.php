
<?php
session_start();

// Oturum kontrolü
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
} 
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['ad_soyad']) && isset($_POST['withdraw']) && isset($_POST['IBAN'])) {
    $username = $_POST['username'];
    $adSoyad = $_POST['ad_soyad'];
    $withdrawAmount = $_POST['withdraw'];
    $iban = $_POST['IBAN'];

    // Kullanıcının mevcut bakiyesini sorgula
    $balanceQuery = "SELECT balance FROM users WHERE username = '$username'";
    $balanceResult = $conn->query($balanceQuery);

    if ($balanceResult->num_rows > 0) {
        $row = $balanceResult->fetch_assoc();
        $currentBalance = $row['balance'];

        // Çekilecek tutar kullanıcının bakiyesinden büyük değilse işlemi yap
        if ($withdrawAmount <= $currentBalance) {
            // Transfer tablosuna ekle
            $insertQuery = "INSERT INTO transfer (username, ad_soyad, depositamount, withdrawamount, IBAN) VALUES ('$username', '$adSoyad', 0, '$withdrawAmount', '$iban')";
            if ($conn->query($insertQuery) === TRUE) {
                // Kullanıcının bakiyesini güncelle
                $newBalance = $currentBalance - $withdrawAmount;
                $updateQuery = "UPDATE users SET balance = $newBalance WHERE username = '$username'";
                if ($conn->query($updateQuery) === TRUE) {
                    // İşlem başarılıysa kullanıcıyı dashboard.php sayfasına yönlendir
                    header("Location: dashboard.php");
                    exit();
                } else {
                    echo "Hata: " . $conn->error;
                }
            } else {
                echo "Hata: " . $conn->error;
            }
        } else {
            echo "Yetersiz bakiye.";
        }
    } else {
        echo "Kullanıcı bulunamadı.";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Para Çekme İsteği</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .form-container {
            width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            display: flex;
            flex-direction: column;
            margin-top: 20px;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            margin-bottom: 10px;
        }
        button:hover {
            background-color: #ff0000;
        }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Para Çekme İsteği</h2>
        <form action="" method="post">
            <label for="username">Kullanıcı Adı:</label>
            <input type="text" id="username" name="username" required>
            <label for="ad_soyad">Ad Soyad:</label>
            <input type="text" id="ad_soyad" name="ad_soyad" required>
            <label for="withdraw">Çekilecek Tutar:</label>
            <input type="number" id="withdraw" name="withdraw" required>
            <label for="IBAN">IBAN:</label>
            <input type="text" id="IBAN" name="IBAN" required>
            <button type="submit" class="button" style="text-decoration: none; color: white;">Çek</button>
        </form>
                    <button class="button"><a href="dashboard.php" style="text-decoration: none; color: white;">Hesabım</a></button>


    </div>
   
</body>
</html>
