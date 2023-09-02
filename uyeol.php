<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Üye Ol</title>
    <style>
        body {
            background-color: #d4ea6b;
            color: black;
            font-family: Arial;
          
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
    
        .form-container h2 {
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
            background-color: #ff0000;
        }
        .error-box {
            background-color: white;
            color: red;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }
        .btn {            background-color: #889f9c;

    padding: 10px 20px;
    color: black;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s, color 0.3s;
}
 .header {
            background-color: #2a6099;
            color: white;
            padding: 20px;
            text-align: center;
        }
.btn:hover {
    background-color: red;
}


/* Özel checkbox stilini tanımla */
.form-label .checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 5px;
    width: 5px;
    background-color: #fff;
    border: 2px solid #2a6099;
    border-radius: 5px;
}

/* Checkbox işaretlendiğinde */
.form-label input[type="checkbox"]:checked ~ .checkmark:after {
    content: "\2713"; /* Onay işareti */
    display: block;
    position: absolute;
    top: 2px;
    left: 7px;
    font-size: 20px;
    color: #2a6099;
}

/* Checkbox'a tıklama durumunda */
.form-label input[type="checkbox"]:checked ~ .checkmark {
    background-color: #fff;
    border: 2px solid #2a6099;
}

/* Label üzerine tıklama durumunda */
.form-label:hover input[type="checkbox"] ~ .checkmark {
    background-color: #f2f2f2;
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

        
           <a href="uyeol.php" class="btn1">ÜYE OL </a>
            <a href="login.php" class="btn1">GİRİŞ YAP</a>
            
                        </div>
                                            
    <div class="header">
<h1>Üye Ol</h1>       
    </div>
<div class="form-container">

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Form verilerini al
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm-password'];

        // Veritabanına bağlanma işlemi
        $servername = "localhost:3306"; // Veritabanı sunucusu
        $dbUsername = "yzissite_admin"; // Veritabanı kullanıcı adı
        $dbPassword = "PAeWwC{ztpDt"; // Veritabanı şifre
        $dbName = "yzissite_enflasyonkoin"; // Veritabanı adı

        $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die("Veritabanı bağlantı hatası: " . $conn->connect_error);
        }

        // Şifreleri kontrol et
        if ($password != $confirmPassword) {
            echo "Şifreler eşleşmiyor.";
        } else {
            // Kullanıcının varlığını kontrol et
            $checkQuery = "SELECT * FROM users WHERE username='$username' OR email='$email'";
            $result = $conn->query($checkQuery);

            if ($result->num_rows > 0) {
                echo "Bu kullanıcı adı veya e-posta zaten kullanılıyor.";
            } else {
                // Şifreleri hash olarak sakla
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Veritabanına kayıt ekleme
                $insertQuery = "INSERT INTO users (username, email, password) 
                                VALUES ('$username', '$email', '$hashedPassword')";

                if ($conn->query($insertQuery) === TRUE) {
                    echo "Üyelik başarıyla oluşturuldu.";
                } else {
                    echo "Hata: " . $conn->error;
                }
            }
        }

        $conn->close(); // Veritabanı bağlantısını kapat
    }
    ?>    

<form action="uyeol.php" method="POST">
    <label for="username" class="form-label">Kullanıcı Adı:</label>
    <input type="text" id="username" name="username" class="form-input" required>
    <label for="email" class="form-label">Email:</label>
    <input type="email" id="email" name="email" class="form-input" required>
    <label for="password" class="form-label">Şifre:</label>
    <input type="password" id="password" name="password" class="form-input" required>
    <label for="confirm-password" class="form-label">Tekrar Şifre:</label>
    <input type="password" id="confirm-password" name="confirm-password" class="form-input" required>
           <a href="uyeliksozl.php"> Üyelik Sözleşmesini Kabul Ediyorum
</a>
        <label for="accept-terms" class="form-label">
    <input type="checkbox" id="accept-terms" required>
</label>

    <button type="submit" id="register-button" class="btn" disabled>Üye Ol</button><a href="login.php" class="btn">Giriş Yap</a>   
</form>
   
    <script>
        const acceptTermsCheckbox = document.getElementById("accept-terms");
        const registerButton = document.getElementById("register-button");
        acceptTermsCheckbox.addEventListener("change", function() {
            if (acceptTermsCheckbox.checked) {
                registerButton.removeAttribute("disabled");
            } else {
                registerButton.setAttribute("disabled", "true");
            }
        });
    </script>
    
</div>
                        <p>&copy; Enflasyonkoin 2023 - Tüm hakları saklıdır</p>

</body>
</html>

