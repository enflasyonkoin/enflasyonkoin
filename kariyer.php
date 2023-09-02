<!DOCTYPE html>
<html>
<head>
    <title>Kariyer Fırsatları - Şirket Adı</title>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    color: #333;
}

header {
    background-color: #222;
    color: #fff;
    padding: 10px;
    text-align: center;
}

nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav a {
    color: #fff;
    text-decoration: none;
}

.content {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
}

.button {
    padding: 10px 20px;
    background-color: #222;
    color: #fff;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    cursor: pointer;
}

.job-list {
    display: flex;
    gap: 20px;
}

.job {
    flex: 1;
    padding: 20px;
    background-color: #f4f4f4;
    border-radius: 5px;
}
    </style>
</head>





<body>
    <header>
        <h1>Enflasyonkoin Teknoloji Kariyer</h1>
        <nav>
            <ul>
                <li><a href="index.php">Ana Sayfa</a></li>
                <li><a href="kariyer.php">Kariyer</a></li>
            </ul>
        </nav>
    </header>
    <section class="content">
        <h2>Kariyer Fırsatları</h2>
        <div class="job-list">
            <div class="job">
                <h3>Yazılım Geliştirici</h3>
                <p>Yazılım projelerimizde yer alacak, tecrübeli yazılım geliştiriciler arıyoruz.</p>
            </div>
            <div class="job">
                <h3>Pazarlama Uzmanı</h3>
                <p>Ürünlerimizin tanıtımını yapacak, pazarlama uzmanları aranıyor.www.twitter.com/enflasyonkoin</p>
            </div>
        </div>
    </section>
<section class="content">
        <h2>Başvuru Formu</h2>
        <form action="basvuru-kayit.php" method="POST">
            <label for="adsoyad">Ad Soyad:</label>
            <input type="text" id="adsoyad" name="adsoyad" required>
            <label for="email">E-posta:</label>
            <input type="email" id="email" name="email" required>
            <label for="cv">CV (PDF formatında):</label>
            <input type="file" id="cv" name="cv" accept=".pdf" required>
            <label for="mesaj">Ek Mesaj:</label>
            <textarea id="mesaj" name="mesaj" rows="4"></textarea>
            <button type="submit" class="button">Başvur</button>
        </form>
    </section>
    <footer>
        <p>&copy; 2023 Şirket Adı. Tüm hakları saklıdır.</p>
    </footer>
</body>
</html>
