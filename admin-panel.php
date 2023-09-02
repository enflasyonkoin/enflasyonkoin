<?php
session_start();
include 'db_connection.php';

// Eğer oturum açık değilse veya yzissite_admin giriş yapmamışsa, giriş sayfasına yönlendir
if (!isset($_SESSION['admin_loggedin']) || $_SESSION['admin_loggedin'] !== true) {
    header("Location: index.php");
    exit();
}

// Toplam Kullanıcı Bakiyesi
$totalBalanceQuery = "SELECT SUM(balance) AS total FROM users";
$totalBalanceResult = $conn->query($totalBalanceQuery);
$totalBalanceRow = $totalBalanceResult->fetch_assoc();
$totalBalance = $totalBalanceRow['total'];

// Para ekleme işlemi
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['amount']) && isset($_POST['deposit'])) {
    $username = $_POST['username'];
    $amount = $_POST['amount'];

    // Kullanıcının mevcut bakiyesini sorgula
    $balanceQuery = "SELECT balance FROM users WHERE username = '$username'";
    $balanceResult = $conn->query($balanceQuery);

    if ($balanceResult->num_rows > 0) {
        $row = $balanceResult->fetch_assoc();
        $currentBalance = $row['balance'];

        // Kullanıcının bakiyesini güncelle
        $newBalance = $currentBalance + $amount;
        $updateQuery = "UPDATE users SET balance = $newBalance WHERE username = '$username'";
        if ($conn->query($updateQuery) === TRUE) {
            // Countdown değerini güncelle
            $updateCountdownQuery = "UPDATE users SET countdown = 30 WHERE username = '$username'";
            if ($conn->query($updateCountdownQuery) === TRUE) {
                // Para eklendiğinde admin paneline yönlendir
                header("Location: admin-panel.php");
                exit();
            } else {
                echo "Hata: " . $conn->error;
            }
        } else {
            echo "Hata: " . $conn->error;
        }
    } else {
        echo "Kullanıcı bulunamadı.";
    }
}

// Para çekme işlemi
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['amount']) && isset($_POST['withdraw'])) {
    $username = $_POST['username'];
    $amount = $_POST['amount'];

    // Kullanıcının mevcut bakiyesini sorgula
    $balanceQuery = "SELECT balance FROM users WHERE username = '$username'";
    $balanceResult = $conn->query($balanceQuery);

    if ($balanceResult->num_rows > 0) {
        $row = $balanceResult->fetch_assoc();
        $currentBalance = $row['balance'];

        // Kullanıcının bakiyesini güncelle
        $newBalance = $currentBalance - $amount;
        if ($newBalance >= 0) {
            $updateQuery = "UPDATE users SET balance = $newBalance WHERE username = '$username'";
            if ($conn->query($updateQuery) === TRUE) {
                // Countdown değerini güncelle
                $updateCountdownQuery = "UPDATE users SET countdown = 30 WHERE username = '$username'";
                if ($conn->query($updateCountdownQuery) === TRUE) {
                    // Para çekildiğinde admin paneline yönlendir
                    header("Location: admin-panel.php");
                    exit();
                } else {
                    echo "Hata: " . $conn->error;
                }
            } else {
                echo "Hata: " . $conn->error;
            }
        } else {
            echo "Yetersiz bakiye.";
        }
    } else {
        echo "Kullanıcı bulunamadı.";
    }
}

// Transfer isteklerini sorgula ve listele
$transferQuery = "SELECT * FROM transfer_requests";
$transferResult = $conn->query($transferQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            flex-direction: row;
        }
        .form-container {
            flex: 1;
            padding: 20px;
            background-color: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            margin: 20px;
        }
        .history-container {
            flex: 1;
            padding: 20px;
            background-color: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .transfer-row:hover {
            background-color: #f2f2f2;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Admin Panel</h1>
    <div class="container">
        <div class="form-container">
            <h2>Para Yönetimi</h2>
            <form action="" method="post">
                <input type="text" name="username" placeholder="Kullanıcı Adı">
                <input type="number" name="amount" placeholder="Tutar" required>
                <button type="submit" name="deposit">Para Ekle</button>
            </form>
            
            <form action="" method="post">
                <input type="text" name="username" placeholder="Kullanıcı Adı">
                <input type="number" name="amount" placeholder="Tutar" required>
                <button type="submit" name="withdraw">Para Çıkar</button>
            </form>
            
            <h2>Toplam Kullanıcı Bakiyesi</h2>
                <form>
                    <label for="totalBalance">Kullanıcıların Toplam Bakiye:</label>
                    <input type="text" id="totalBalance" name="totalBalance" value="<?php echo $totalBalance; ?>" readonly>
                </form>
                <a href="logout.php" class="logout-button">Oturumu Kapat</a>
        </div>
        
        <div class="history-container">
            <h2>Transfer İstekleri</h2>
            <div style="overflow-x: auto;">
                <table>
                    <tr>
                        <th>Kullanıcı Adı</th>
                        <th>Ad Soyad</th>
                        <th>Yatır</th>
                        <th>Çek</th>
                        <th>IBAN</th>
                    </tr>
                    <?php
                    $transferQuery = "SELECT * FROM transfer";
                    $transferResult = $conn->query($transferQuery);

                    if ($transferResult->num_rows > 0) {
                        while ($row = $transferResult->fetch_assoc()) {
                            echo "<tr class='transfer-row' data-id='{$row['id']}'>";
                            echo "<td>{$row['username']}</td>";
                            echo "<td>{$row['ad_soyad']}</td>";
                            echo "<td>{$row['depositamount']}</td>";
                            echo "<td>{$row['withdrawamount']}</td>";
                            echo "<td>{$row['IBAN']}</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Transfer isteği bulunmuyor.</td></tr>";
                    }
                    ?>
                </table>
                
                <h2>Transfer Geçmişi</h2>
                <form id="transferHistoryForm">
                    <table id="transferHistoryTable">
                        <tr>
                            <th>Kullanıcı Adı</th>
                            <th>İşlem</th>
                            <th>Tutar</th>
                        </tr>
                        <!-- Transfer geçmişi verileri burada dinamik olarak gelecek -->
                    </table>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
