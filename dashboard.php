<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            background-color: black;
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .dashboard-container {
            width: 500px;
            background-color: white;
            border: 1px solid black;
            text-align: center;
            padding: 20px;
            position: relative;
        }
        .title {
            font-size: 40px;
            margin-bottom: 20px;
            color: black ;
        }
        .balance-container {
                    background-image: url('wlet.jpg');

            width: 300px;
            height: 200px;
            border: 1px solid black;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            background-color: #4CAF50; /* Arka plan rengi */
            border-radius: 10px;
        }
        .balance {
            font-size: 36px;
            color: black;
        }
        .currency {
            font-size: 24px;
            color: black ;
        }
        .action-buttons {
            display: flex;
            flex-direction: column;
            margin-top: 20px;
        }
        .action-button {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            margin-bottom: 10px;
        }
        .action-button:hover {
            background-color: #ff0000;
        }
        .logout-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
        }
        .logout-button:hover {
            background-color: #ff0000;
        }
        .countdown-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .countdown-box {
            background-color: #ffffff;
            border: 2px solid #000000;
            padding: 20px;
            text-align: center;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
        .countdown-text {
            font-size: 24px;
            color: #000000;
        }
        .countdown {
            font-size: 36px;
            color: #000000;
        }
        .image-effect:hover {
            transform: scale(1.1); /* Büyüme efekti */
            transition: transform 0.3s ease-in-out;
        }
        .image-link {
            text-decoration: none;
            color: white;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <a href="logout.php" class="logout-button">Oturumu Kapat</a>
        <h1 class="title">EK-CÜZDAN</h1>
        <div class="balance-container">
            <div class="balance">
                <?php
                    include 'db_connection.php';
                    session_start();
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                        $username = $_SESSION['username'];
                        $balanceQuery = "SELECT balance FROM users WHERE username='$username'";
                        $balanceResult = $conn->query($balanceQuery);
                        if ($balanceResult->num_rows > 0) {
                            $balanceRow = $balanceResult->fetch_assoc();
                            echo $balanceRow['balance'];
                        }
                    }
                ?>
            </div>
            <div class="currency">
                Enflasyonkoin <img src="eklogo.png" alt="Resim 4" width="50" height="50">
            </div>

        </div>
                            <a href="parayatir.php" target="_blank" rel="noopener noreferrer"><img src="send.png" alt="YATIR"></a>
                                                        <a href="paracek.php" target="_blank" rel="noopener noreferrer"><img src="wth.png" alt="ÇEK"></a>


       
            <div class="countdown-box">
                <div class="countdown-text">&#128274; </div>
                <div id="countdown" class="countdown">
                    <?php
                        // Kullanıcının sayaç bilgisini veritabanından çek
                        $countdownQuery = "SELECT countdown FROM users WHERE username='$username'";
                        $countdownResult = $conn->query($countdownQuery);
                        if ($countdownResult->num_rows > 0) {
                            $countdownRow = $countdownResult->fetch_assoc();
                            $countdown = $countdownRow['countdown'];

                            // Sayacı göster
                            echo $countdown . ' gün kaldı';
                        }
                    ?>
                
            </div>
        </div>
    </div>
            
</body>
</html>
