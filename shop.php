<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alışveriş Sayfası</title>
    <style>
        body {
            background-color: green;
            color: black;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: white;
            padding: 20px;
            text-align: center;
        }
        nav {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
        }
        nav ul li {
            display: inline-block;
            margin-right: 20px;
            cursor: pointer;
        }
        .category-list {
            display: none;
            margin-top: 10px;
        }
        .category-list ul {
            list-style-type: none;
            padding: 0;
        }
        .category-list ul li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Alışveriş Sayfası</h1>
    </header>
    <nav>
        <ul>
            <li class="category" onclick="toggleCategoryList('electronics')">Elektronik</li>
            <li class="category" onclick="toggleCategoryList('clothing')">Giyim</li>
            <li class="category" onclick="toggleCategoryList('books')">Kitaplar</li>
        </ul>
    </nav>
    <div class="category-list" id="electronics">
        <h2>Elektronik Ürünleri</h2>
        <ul>
            <li><a href="product.php">Ürün 1</a></li>
            <li><a href="product.php">Ürün 2</a></li>
            <li><a href="product.php">Ürün 3</a></li>
        </ul>
    </div>
    <div class="category-list" id="clothing">
        <h2>Giyim Ürünleri</h2>
        <ul>
            <li><a href="product.php">Ürün 4</a></li>
            <li><a href="product.php">Ürün 5</a></li>
            <li><a href="product.php">Ürün 6</a></li>
        </ul>
    </div>
    <div class="category-list" id="books">
        <h2>Kitaplar</h2>
        <ul>
            <li><a href="product.php">Ürün 7</a></li>
            <li><a href="product.php">Ürün 8</a></li>
            <li><a href="product.php">Ürün 9</a></li>
        </ul>
    </div>
    <script>
        function toggleCategoryList(category) {
            var categoryList = document.getElementById(category);
            if (categoryList.style.display === "none") {
                categoryList.style.display = "block";
            } else {
                categoryList.style.display = "none";
            }
        }
    </script>
</body>
</html>
