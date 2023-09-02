<!DOCTYPE html>
<html>
<head>
    <title>Yorum Sayfası</title>
    <style>
      body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
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

.container {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            margin-top: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
        }

        input[type="submit"] {
            background-color: #2a6099;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        .yorum {
            margin: 10px 0;
            border: 1px solid #ccc;
            padding: 10px;
            background-color: #fff;
        }
         .header {
            background-color: #2a6099;
            color: white;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>  <div class="top-bar">
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
<h1>Yorum Yap</h1>       
    </div>

    <div class="container">
        <h2>Yorum Yap</h2>
        <form action="" method="post">
            <label for="ad">Adınız:</label>
            <input type="text" id="ad" name="ad" required><br>

            <label for="soyad">Soyadınız:</label>
            <input type="text" id="soyad" name="soyad" required><br>

            <label for="yorum">Yorumunuz:</label>
            <textarea id="yorum" name="yorum" rows="4" cols="50" required></textarea><br>

            <input type="submit" name="submit" value="Yorum Ekle">
        </form>
    </div>

    <div class="container">
        <h2>Önceki Yorumlar</h2>
        <?php
            // Veritabanı bağlantısı
            $servername = "localhost:3306";
            $username = "yzissite_admin"; // MySQL kullanıcı adınızı girin
            $password = "PAeWwC{ztpDt"; // MySQL parolanızı girin
            $dbname = "yzissite_enflasyonkoin"; // Kullandığınız veritabanının adını girin

            $conn = mysqli_connect($servername, $username, $password, $dbname);

            // Bağlantıyı kontrol et
            if (!$conn) {
                die("Bağlantı hatası: " . mysqli_connect_error());
            }

            // Yeni yorum eklendiğinde
            if (isset($_POST['submit'])) {
                $ad = $_POST['ad'];
                $soyad = $_POST['soyad'];
                $yorum = $_POST['yorum'];

                $sql = "INSERT INTO yorumlar (ad, soyad, yorum) VALUES ('$ad', '$soyad', '$yorum')";

                if (mysqli_query($conn, $sql)) {
                    echo "Yorumunuz başarıyla eklendi!";
                } else {
                    echo "Hata: " . mysqli_error($conn);
                }
            }

            // Veritabanından önceki yorumları sorgula
            $sql = "SELECT ad, soyad, yorum FROM yorumlar";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='yorum'>";
                    echo "<strong>" . $row['ad'] . " " . $row['soyad'] . ":</strong><br>";
                    echo $row['yorum'];
                    echo "</div>";
                }
            } else {
                echo "Henüz yorum yok.";
            }

            // Bağlantıyı kapat
            mysqli_close($conn);
        ?>
    </div>
</body>
</html>
