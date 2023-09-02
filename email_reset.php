
<?php
require 'db_connection.php'; // Veritabanı bağlantısı için gerekli olan dosya

if (isset($_POST['send-reset'])) {
    $email = $_POST['email'];
    
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            $resetLink = "http://enflasyonkoin.com/reset-password.php?email=" . urlencode($email);
            $emailSubject = "Şifre Sıfırlama Talebi";
            $emailMessage = "Şifrenizi sıfırlamak için aşağıdaki bağlantıya tıklayın:\n\n" . $resetLink;
            $headers = "From: info@enflasyonkoin.com\r\n"; // Gönderen e-posta adresi
            
            if (mail($email, $emailSubject, $emailMessage, $headers)) {
                echo "Sıfırlama bağlantısı e-posta adresinize gönderildi.";
            } else {
                echo "E-posta gönderme işlemi başarısız oldu.";
            }
        } else {
            echo "Bu e-posta adresi ile kayıtlı bir kullanıcı bulunamadı.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
 
     <style>
        body {
            background-color: black;
            color: white;
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-box {
            background-color: #333;
            border-radius: 10px;
            padding: 20px;
            max-width: 400px;
            width: 100%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }
        .form-box h2 {
            margin-top: 0;
        }
        .form-input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: none;
            border-radius: 5px;
        }
        .form-button {
            background-color: #0099cc;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }
        .form-button:hover {
            background-color: #0077b3;
        }
 
 
 
 
    </style>
    <title>Email Sıfırlama Formu</title>
</head>
<body>
    <div class="form-container">
        <div class="form-box">
            <h2>Email Sıfırlama Formu</h2>
            <form action="" method="POST">
                <input type="email" class="form-input" name="email" placeholder="E-posta Adresi" required>
                <button type="submit" class="form-button" name="send-reset">Sıfırlama Linki Gönder</button>
            </form>
        </div>
    </div>
</body>
</html>
