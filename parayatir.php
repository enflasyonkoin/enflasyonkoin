<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Para Yatırma</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
             flex-direction: column; /* Kutuları dikey sıralamak için */
            align-items: center; /* Kutuları yatayda ortala */
        }
        }
        .info-container {
            flex: 1;
            padding: 20px;
            background-color: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
             margin-bottom: 20px
        }
        .crypto-container {
            flex: 1;
            padding: 20px;
            background-color: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            margin-left: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        #cryptoInfo {
            display: none;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="info-container"><h2>IBAN Havale/Eft ile Para Yatır</h2>        <a href="logout.php" class="logout-button">Oturumu Kapat</a>

            <p><span class="bold">Banka:</span> Ziraat Bankası</p>
            <p><span class="bold">Şirket Adı:</span> Enflasyonkoin Teknoloji Şirketi</p>
            <p><span class="bold">İBAN:</span> TR09486274865487</p>
            
        </div>
        <div class="crypto-container">
            
     
            <h2>Kripto ile Para Yatırma</h2>
            <p>Para yatırmadan önce lütfen aşağıdan bir kripto para seçin:</p>
            <select id="cryptoSelect">
                <option value="" selected disabled>Seçiniz</option>
                <option value="btc">Bitcoin (BTC)</option>
                <option value="eth">Ethereum (ETH)</option>
                <!-- Diğer kripto paraları buraya ekleyin -->
            </select>
            <div id="cryptoInfo">
                <p><span class="bold">Güncel Fiyat:</span> <span id="currentPrice"></span></p>
                <p><span class="bold">Cüzdan Adresi:</span> <span id="walletAddress"></span></p>
            </div>
        </div>
                    <button class="action-button"><a href="dashboard.php" style="text-decoration: none; color: white;">Hesabım</a></button>

    </div>
 
    <script>
        const cryptoSelect = document.getElementById('cryptoSelect');
        const cryptoInfo = document.getElementById('cryptoInfo');
        const currentPrice = document.getElementById('currentPrice');
        const walletAddress = document.getElementById('walletAddress');

        cryptoSelect.addEventListener('change', async function() {
            const selectedCrypto = this.value;

            if (selectedCrypto) {
                try {
                    const response = await fetch(`https://pro-api.coinmarketcap.com/v1/cryptocurrency/quotes/latest?symbol=${selectedCrypto.toUpperCase()}`, {
                        method: 'GET',
                        headers: {
                            'X-CMC_PRO_API_KEY': '3a410f17-197b-4ab0-b7f0-dd40f417c979', // Buraya kendi API anahtarınızı ekleyin
                        },
                    });

                    const data = await response.json();

                    const price = data.data[selectedCrypto].quote.USD.price;
                    currentPrice.innerText = `${price} USD`; // Güncel fiyatı göster

                    // Sahte bir cüzdan adresi örneği
                    const fakeWalletAddress = '1A1zP1eP5QGefi2DMPTfTL5SLmv7DivfNa';
                    walletAddress.innerText = fakeWalletAddress;

                    // Kripto seçimi sonucunda fiyat bilgisini ve cüzdan adresini göster
                    cryptoInfo.style.display = 'block';
                } catch (error) {
                    console.error('Hata:', error);
                }
            } else {
                currentPrice.innerText = '';
                walletAddress.innerText = '';

                // Kripto seçimi olmadığında bilgileri gizle
                cryptoInfo.style.display = 'none';
            }
        });
    </script>
</body>
</html>

  
            
           


