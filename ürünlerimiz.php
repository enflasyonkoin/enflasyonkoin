<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ürünlerimiz</title>
<style>
body {
            background-image: url('ekwalp.png');

    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f2f2f2;
}
 .header {
            background-color: #2a6099;
            color: white;
            padding: 20px;
            text-align: center;
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
.project-cards {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    padding: 40px;
}

.project-card {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    margin: 15px;
    padding: 20px;
    text-align: center;
    width: 300px;
}

.project-card img {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
}

.project-card h3 {
    margin-top: 15px;
    font-size: 18px;
}

.project-card p {
    margin-top: 10px;
    font-size: 14px;
    color: #777;
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
<h1>Ürünlerimiz</h1>       
    </div>


    <div class="project-cards">
          <div class="project-card">
            <img src="ekcz.png" alt="Proje 1">
            <h3>EK-Cüzdan</h3>
            <p>Otomatik İşlem Alogoritmasını bünyesinde barındıran EK-Cüzdan ile IBAN Havale/EFT ile hızlıca EK al Cüzdanında biriktir AY sonu %8,5 gelir kazan ister birikimini devam ettir istersen 7/24 yatır/çek yap</p>
        </div>
        
         <div class="project-card">
            <img src="em.png" alt="Proje 6">
            <h3> EK/MATIC TOKEN  </h3>
            <p>Otomatik İşlem Alogoritmasını bünyesinde barındıran EK/MATIC TOKEN size sabit fiyat garantisi verir.Birikimlerinizi sadece geliştirir.Diğer kripto varlıklardaki yüksek oynaklık gözlenmez.Sınırlı sayıdaki EK/MATIC TOKEN aylık %8,5 değerlenir.Sizi kayıplardan korur.Dünyadaki bütün etkenlere karşı bünyesindeki teknolojiler sayesinde birikimleriniz değer kaybetmez. Birikimleriniz Aylık %8,5 değerlendirir ve sizi enflasyondan korur.</p>
        </div>
        <div class="project-card">
            <img src="gbcly.jpg" alt="Proje 6">
            <h3> EK-STABİLCOİN </h3>
            <p>Birikimlerinizi TL yerine EK olarak tutun aylık %8,5 değerlenmeye devam etsin.Enflasyonu hayatınızdan çıkarabilirsiniz. EK-pay ile  anlaşmalı yerlerde ödeme yapın yakında..</p>
        </div>
       
    </div>
</body>
</html>
