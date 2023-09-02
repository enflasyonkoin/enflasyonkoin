<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trading Bot</title>
    <style>
        /* Temel CSS stilleri */
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .container {
            display: flex;
            justify-content: space-between;
            padding: 20px;
        }
        .box {
            border: 1px solid #ccc;
            padding: 10px;
            width: 30%;
        }
    </style>
</head>
<body>
    <h1>Trading Bot Kontrol Paneli</h1>
    <div class="container">
        <!-- Sol Yönetim Box -->
        <div class="box">
            <h2>Yönetim</h2>
            <button>Bot Başlat</button>
            <button>Bot Durdur</button>
            <button>Agressif Al</button>
            <button>Agressif Sat</button>
        </div>

        <!-- Orta İşlem Listesi -->
        <div class="box">
            <h2>İşlem Listesi</h2>
            <ul>
                <li>Alım işlemi: BTC/USD - 0.01 BTC</li>
                <li>Satım işlemi: ETH/USD - 0.5 ETH</li>
                <!-- İşlemleri buraya ekleyin -->
            </ul>
        </div>

        <!-- Sağ Kar Bilgileri -->
        <div class="box">
            <h2>Kar Bilgileri</h2>
            <p>Günlük Kar: $100</p>
            <p>Aylık Kar: $2000</p>
            <p>Yıllık Kar: $24000</p>
        </div>
    </div>

    <!-- Alt Kripto Fiyatları ve Twitter Haberleri -->
    <div class="container">
        <!-- Kripto Fiyatları Listesi -->
        <div class="box">
            <h2>Kripto Fiyatları</h2>
            <ul>
                <li>BTC/USD: $40,000</li>
                <li>ETH/USD: $2,500</li>
                <!-- Diğer kripto fiyatlarını buraya ekleyin -->
            </ul>
        </div>

        <!-- Twitter Haberleri -->
        <div class="box">
            <h2>Twitter Haberleri</h2>
            <ul>
                <li><a href="#">Kripto piyasası güncellemesi!</a></li>
                <li><a href="#">BTC fiyatı yükselişte!</a></li>
                <!-- Twitter haberlerini buraya ekleyin -->
            </ul>
        </div>

        <!-- Binance Transfer Butonları -->
        <div class="box">
            <h2>Binance Transfer</h2>
            <button>Gönder</button>
            <button>Çek</button>
        </div>
    </div>
</body>
</html>
