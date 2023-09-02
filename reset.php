<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>Yeni Şifre Girişi</title>
</head>
<body>
    <?php
    if (isset($_POST['reset-password'])) {
    $newPassword = $_POST['new-password'];
    $confirmPassword = $_POST['confirm-password'];
    $username = $_POST['username']; // Burada kullanıcının adını aldığınızdan emin olun

    if (!empty($newPassword) && !empty($confirmPassword) && $newPassword === $confirmPassword) {
        // Şifre güncelleme işlemini gerçekleştir
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        $updateQuery = "UPDATE users SET password = :password WHERE username = :username";
        $stmt = $pdo->prepare($updateQuery);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':username', $username);

        if ($stmt->execute()) {
            echo "Şifre başarıyla güncellendi.";
        } else {
            echo "Şifre güncelleme sırasında bir hata oluştu.";
        }
    } else {
        echo "Yeni şifre ve tekrar şifre alanları eşleşmiyor.";
    }
}
?>



    <div class="form-container">
        <div class="form-box">
            <h2>Yeni Şifre Girişi</h2>
            <form action="" method="POST">
                <input type="password" class="form-input" name="new-password" placeholder="Yeni Şifre" required>
                <input type="password" class="form-input" name="confirm-password" placeholder="Yeni Şifre Tekrar" required>
                <button type="submit" class="form-button" name="reset-password">Şifreyi Sıfırla</button>
            </form>
        </div>
    </div>
</body>
</html>
