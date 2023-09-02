<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ekip Sayfası</title>
    <style>
        body {
            background-image: url('ekwalp.png');
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #2a6099;
            color: white;
            text-align: center;
            padding: 10px;
        }

        .top-bar {
            background: linear-gradient(to left, #87CEEB, #000080);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 40px;
            position: relative;
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

        .team-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: flex-start;
            padding: 20px;
        }

        .team-member {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 20px;
            padding: 20px;
            text-align: center;
        }

        .team-member img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .team-member h2 {
            margin: 10px 0;
        }

        .team-member p {
            color: #666;
        }

        .team-member a {
            color: #007bff;
            text-decoration: none;
        }

        .team-member a:hover {
            text-decoration: underline;
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
<header>
    <h1>Ekip Üyeleri</h1>
</header>
<div class="team-container">
    <?php
    $teamMembers = [
        [
            'name' => 'Yusuf  İşler',
            'position' => 'CEO',
            'image' => '.png',
            'bio' => 'Blockchain Uzmanı, Yazılım Mimarı, SPK 3 Düzey Sermaye Piyasaları Uzmanı'
        ],
        [
            'name' => 'Mehmet Kaya',
            'position' => 'CTO',
            'image' => 'mehmet.jpg',
            'bio' => 'Javascript, Python, Solidity Yazılım Dilleri Uzmanı'
        ],
        [
            'name' => 'Cenk Günay',
            'position' => 'CTO',
            'image' => 'cenk.jpg',
            'bio' => 'Solidity, Javascript, Yazılım Dilleri Uzmanı, Blokchain Mimarı'
        ],
        [
            'name' => 'Atinc Kılıçarslan',
            'position' => 'CTO',
            'image' => 'atinc.jpg',
            'bio' => 'Ağ Güvenliği Uzmanı,Yazılım Dilleri Uzmanı'
        ],
        [
            'name' => 'Sevil Özalp',
            'position' => 'CFO',
            'image' => 'zeynep.jpg',
            'bio' => 'Finans Uzmanı, Blockchain Analisti'
        ],
        [
            'name' => 'İdris Yıldırım',
            'position' => 'CMO',
            'image' => 'burak.jpg',
            'bio' => 'Pazarlama Stratejisti, Sosyal Medya Uzmanı'
        ],
        [
            'name' => 'Yasmin Gülenay
',
            'position' => 'Lead Developer',
            'image' => 'elif.jpg',
            'bio' => 'Full Stack Geliştirici, Smart Contract Uzmanı'
        ],
        [
            'name' => 'Melis Aydoğan',
            'position' => 'Lead Designer',
            'image' => 'melis.jpg',
            'bio' => 'Grafik Tasarımcı, UI/UX Uzmanı'
        ],
        [
            'name' => 'Serkan Celil',
            'position' => 'Security Specialist',
            'image' => 'serkan.jpg',
            'bio' => 'Blokchain Güvenliği Uzmanı, Sistem Analisti'
        ],
        [
            'name' => 'Nilüfer Kaan',
            'position' => 'Marketing Manager',
            'image' => 'nazli.jpg',
            'bio' => 'Pazarlama Yöneticisi, Sosyal Medya Stratejisti'
        ],
        [
            'name' => 'Onur Yılmaz',
            'position' => 'Blockchain Developer',
            'image' => 'eren.jpg',
            'bio' => 'Solidity Geliştirici, Akıllı Sözleşme Uzmanı'
        ],
        [
            'name' => 'Gizem Güler',
            'position' => 'HR Manager',
            'image' => 'gizem.jpg',
            'bio' => 'İnsan Kaynakları Yöneticisi, İşe Alım Uzmanı'
        ],
        [
            'name' => 'Burcu Ertürk',
            'position' => 'Customer Support',
            'image' => 'burcu.jpg',
            'bio' => 'Müşteri Desteği Temsilcisi, Sorun Giderme Uzmanı'
        ],
        [
            'name' => 'Barış Tekiner',
            'position' => 'Legal Advisor',
            'image' => 'mustafa.jpg',
            'bio' => 'Hukuk Danışmanı, Regülasyon Uzmanı'
        ],
        [
            'name' => 'D.Nihan Dalman',
            'position' => 'Financial Analyst',
            'image' => 'nihan.jpg',
            'bio' => 'Finans Analisti, Risk Değerlendirme Uzmanı'
        ],
        [
            'name' => 'Mete Yılmazsoy',
            'position' => 'PR Specialist',
            'image' => 'deniz.jpg',
            'bio' => 'Halkla İlişkiler Uzmanı, Medya İletişimi'
        ],
        [
            'name' => 'Ege Yıldız',
            'position' => 'Content Writer',
            'image' => 'ege.jpg',
            'bio' => 'İçerik Yazarı, Blog Yazarı'
        ],
        [
            'name' => 'Oktay Mehmet Taşkın',
            'position' => 'Community Manager',
            'image' => 'mert.jpg',
            'bio' => 'Topluluk Yöneticisi, İletişim Uzmanı'
        ],
        [
            'name' => 'Gülşah Kaya',
            'position' => 'Product Manager',
            'image' => 'gulsah.jpg',
            'bio' => 'Ürün Yöneticisi, Stratejik Planlama'
        ],
    ];

    foreach ($teamMembers as $member) :
        ?>
        <div class="team-member">
            <img src="/<?php echo $member['image']; ?>" alt="<?php echo $member['name']; ?>">
            <h2><?php echo $member['name']; ?></h2>
            <p><?php echo $member['position']; ?></p>
            <p><?php echo $member['bio']; ?></p>
            <a href="#">LinkedIn Profili</a>
        </div>
    <?php endforeach; ?>
</div>
<p>&copy; Enflasyonkoin 2023 - Tüm hakları saklıdır</p>
</body>
</html>
