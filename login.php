<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($userId, $dbUsername, $dbPassword);
    $stmt->fetch();

    if (password_verify($password, $dbPassword)) {
        if ($dbUsername === 'yzissite_admin') {
            $_SESSION['admin_loggedin'] = true;
            header("Location: admin-panel.php");
            exit(); // Admin giriş yaptığında işlemi sonlandır
        } else {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $dbUsername;
            header("Location: dashboard.php");
            exit(); // Diğer kullanıcılar için işlemi sonlandır
        }
    } else {
        $error_message = "Kullanıcı adı veya şifre hatalı.";
    }
    $stmt->close();
}

// Eğer oturum açık ve yzissite_admin giriş yapmışsa admin-panel.php'yi aç
if (isset($_SESSION['admin_loggedin']) && $_SESSION['admin_loggedin'] === true) {
    header("Location: admin-panel.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap</title>
    <style>
    body {
            background-color: #d4ea6b;
            color: black;
            font-family: Arial, sans-serif;
         
        }
        .top-bar {
    background-color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 40px;
    
}

   .top-bar {
    background-color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 40px;
    
}

.top-bar {
  background: linear-gradient(to left, #87CEEB, #000080); /* Sağdan sola skyblue ve lacivert gradyan */
  display: flex;
  justify-content: center;
  align-items: center;
  height: 40px;
  position: relative;
}

.top-bar a {
  color: white; /* Yazı rengi beyaz */
  text-decoration: none;
  margin: 0 15px;
  position: relative;
  transition: all 0.3s ease;
  font-weight: bold; /* Kalın yazılar */
  font-family: Arial, sans-serif; /* Yazı tipi */
}

.top-bar a:hover {
  text-shadow: 0 0 10px rgba(255, 255, 255, 0.8); /* Yazı parlama efekti */
}
        .form-container {
              background-color: #b3cac7;
        
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: flex-start;
    padding: 20px;}
}
        .form-container h2 {
            color: black;
            margin-bottom: 20px;
        }
        .form-container label {
            display: block;
            margin-bottom: 10px;
            color: black;
        }
        .form-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: white;
            color: black;
        }
        .form-container button {
            background-color: #2a6099;
            color: black;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }
        .form-container button:hover {
            background-color: red;
        }
        .error-box {
            background-color: #ff9999;
            color: red;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }
         .header {
            background-color: #2a6099;
            color: white;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
      <div class="top-bar">
                               <a href="index.php">EV</a>

        <a href="ekdefi.php">EK/MATIC-TOKEN</a>
                <a href="login.php">EK-CÜZDAN</a>

        <a href="ürünlerimiz.php">ÜRÜNLERİMİZ</a>
        <a href="dbilgi.php">DETAYLI BİLGİ </a>
        <a href="ekip.php">EKİP</a>
        <a href="yorumlar.php">YORUMLAR</a>
        <a href="yardim.php">YARDIM</a>
  <a href="iletişim.php">İLETİŞİM</a>

        
           <a href="uyeol.php" class="btn">ÜYE OL </a>
            <a href="login.php" class="btn">GİRİŞ YAP</a>
            
                        </div>
                        
    <div class="header">
<h1>Giriş Yap</h1>        <p>Sıkça sorulan sorular ve yardım bilgileri</p>
    </div>
                     
    <div class="form-container">
        <form action="" method="POST">
            <label for="username">Kullanıcı Adı:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Şifre:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Giriş Yap</button>
            <a href="password_reset.php" class="btn">Şifremi Unuttum</a>
        </form>
        <?php
        if(isset($error_message)) {
            echo '<div class="error-box">' . $error_message . '</div>';
        }
        ?>
    </div>                        <p>&copy; Enflasyonkoin 2023 - Tüm hakları saklıdır</p>

</body>
</html>
