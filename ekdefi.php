<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EK</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2a6099;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
        }

      
        .header {
            background-color: #2a6099;
            color: white;
            padding: 20px;
            text-align: center;
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

        .container {  background-color: #0f2338;
            display: flex;
            flex-grow: 1;
        }

        .left-column { background-color: #0f2338;
            flex: 6;
            display: flex;
            flex-wrap: wrap;
            padding: 20px;
            box-sizing: border-box;
        }

        .right-column { background-color: #0f2338;
            flex: 4;
            padding: 20px;
            box-sizing: border-box;
        }

        .box {  background-color: #141d27;
            flex: 1;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            text-align: center;
            margin: 10px;
        }

        h2 {
            color: white;
            font-size: 24px;
        }

        p {
            color: white;
            font-size: 16px;
        }

        /* Piyasa Özeti Widget'i için özel stil */
        .market-overview {
            width: 300PX;
            height: 400px;
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
   <div class="container">
            <div class="box">
                <h2>Grafik</h2>
<iframe id="dextools-widget"
    title="DEXTools Trading Chart"
    width="800" height="600"
    src="https://www.dextools.io/widget-chart/en/polygon/pe-light/0x691122eb45bd448f3313d88862eefe884b41e5e6?theme=dark&chartType=1&chartResolution=1d&drawingToolbars=false"></iframe>                        <iframe src="https://www.dextools.io/widget-aggregator/en/swap/polygon/0x922664b671f493cecb645ac3595cdf0d762da118" width="400" height="630" frameborder="0"></iframe>
 </div>

            
        </div>

        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div>
  
<div class="container">
        <div class="box">
            <h2>EK/MATIC-TOKEN Bilgileri</h2>
            <iframe id="dextswap-aggregator-widget"
                title="DEXTswap Aggregator"
                width="100%" height="1900"
                src="https://info.uniswap.org/#/polygon/tokens/0x922664b671F493cECB645ac3595CDf0d762dA118"></iframe>
        </div>
    </div>
  
</body>

</html>
