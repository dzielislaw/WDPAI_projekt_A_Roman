<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Aplikacja wypożyczalni sprzętu budowlanego i ogrodowego">
    <meta name="keywords" content="narzędzia, wypożyczalnia, sprzęt, sprzętapka">
    <meta name="author" content="Ja">
    <link rel="icon" type="image/x-icon" href="public/img/favicon.ico">
    <title>Sprzęt-apka</title>
    <link rel="stylesheet" href = "public/css/main.css" type="text/css">
    <link rel="stylesheet" href = "public/css/dashboard.css" type="text/css">
    <link rel="stylesheet" href = "public/css/addEquipment.css" type="text/css">

</head>
<body>
<div id="container">
    <div id="banner">
        <div id="header">
            <h1>Sprzęt-apka</h1>
        </div>
        <div id="buttonArea">
            <form class="banner_form">
                <button class="userButton">Moje konto</button>
            </form>
            <form class = "banner_form" action="logout" method="GET">
                <button class="userButton">Wyloguj</button>
            </form>
        </div>
    </div>
    <div id="left">
        <h1>Sprzęt-apka</h1>
        <img src="public/img/logo.png" alt="logo">
    </div>
    <div id="right">
        <form id="search" method="POST" enctype="multipart/form-data" action="">
            <input type="text" name="name" class="userInput" placeholder="Nazwa" required>
            <input type="number" class="userInput" step = 0.01 name="price" placeholder=0.00 required>
            <label> Kategoria
                <select name="category" required>
                    <?php
                    require_once __DIR__.'/../../Database.php';
                    $database = new Database();
                    $stmt = $database->connect()->prepare('
                        SELECT kategoria_id, nazwa FROM kategorie ORDER BY nazwa;
                        ');
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($result as $row) {
                        echo '<option value="'.$row['kategoria_id'].'">'.$row['nazwa'].'</option>';
                    }
                    ?>
                </select>
            </label>
            <br>
            <label>Producent
                <select name="producer" required>
                    <?php
                    require_once __DIR__.'/../../Database.php';
                    $database = new Database();
                    $stmt = $database->connect()->prepare('
                        SELECT producent_id, nazwa FROM producenci ORDER BY nazwa;
                        ');
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($result as $row) {
                        echo '<option value="'.$row['producent_id'].'">'.$row['nazwa'].'</option>';
                    }
                    ?>
                </select>
            </label>
            <br>
            <input type="file" name="photo" class="" required>
            <br>
            <input type="checkbox" name="shouldAddExemplary" checked> Dodaj egzemplarz
            <br>
            <input type="submit" class="userButton" id="submitButton" value="Dodaj">
        </form>
    </div>
    <div id="footer">
        <p>Contact details admin@sampleRentCompany.test.local &copy 2023</p>
    </div>
</div>
</body>
</html>
