

<!DOCTYPE html>
<html>
<head>
    <title>İletişim Formu</title>
    <style>
        body {
            background-image: url('ekwalp.png');
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .top-bar {
            background-color: blue;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 40px;
        }

        .top-bar a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            position: relative;
            transition: all 0.3s ease;
            font-weight: bold;
            font-family: Arial, sans-serif;
        }

        .top-bar a:hover {
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
        }

        .container {
            width: 50%;
            margin: auto;
            padding: 20px;
        }

        .contact-form {
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 5px;
            text-align: center; /* Formun ortalanması için eklenen stil */
        }

        .contact-form label,
        .contact-form input,
        .contact-form textarea {
            display: block;
            margin-bottom: 10px;
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .contact-form textarea {
            height: 150px;
        }

        .contact-form button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        .contact-info {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="top-bar">
        <a href="index.php">EV</a>
        <a href="ekdefi.php">EK/MATIC-TOKEN</a>
        <a href="login.php">EK-CÜZDAN</a>
        <a href="ürünlerimiz.php">ÜRÜNLERİMİZ</a>
        <a href="dbilgi.php">DETAYLI BİLGİ</a>
        <a href="ekip.php">EKİP</a>
        <a href="yorumlar.php">YORUMLAR</a>
        <a href="yardim.php">YARDIM</a>
        <a href="iletişim.php">İLETİŞİM</a>
        <a href="uyeol.php" class="btn">ÜYE OL</a>
        <a href="login.php" class="btn">GİRİŞ YAP</a>
    </div>

   <div class="container">
        <div class="contact-form">
            <h2>İletişim Bilgileri</h2>
            <p>E-posta: info@enflasyonkoin.com</p>
            <p>E-posta: enflasyonkoin@gmail.com</p>
        </div>



    </div>

    <p style="text-align: center;">&copy; Enflasyonkoin 2023 - Tüm hakları saklıdır</p>
</body>
</html>
