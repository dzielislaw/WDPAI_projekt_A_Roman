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

</head>
<body>
<?php
if(!isset($_SESSION['auth']) || !$_SESSION['auth']){
    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: {$url}/logout");
}
require_once __DIR__.'/../../src/Repository/EquipmentRepository.php';
$eq = new EquipmentRepository();
$equipment = $eq->getEquipment(1);
echo $equipment->getName()."\r\n";
foreach ($equipment->getCategory() as $category){
    echo $category.' ';
}
?>
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
        <div id = "searchBar">
            <div id = "searchImg">
                <img src="public/img/magnyfing_glass.png">
            </div>
            <div id="searchOpt">
                <form id="search" method="POST" enctype="multipart/form-data" action="">
                    <input type="text" name="name" placeholder="Nazwa" required>
                    <input type="number" step = 0.01 name="price" placeholder=0.00 required>
                    <label> Kategoria
                        <select>
                            <?php
                            require_once __DIR__.'/../../Database.php';
                            $database = new Database();
                            $stmt = $database->connect()->prepare('
                            SELECT nazwa FROM kategorie ORDER BY nazwa;
                            ');
                            $stmt->execute();
                            $result = $stmt->fetchAll(PDO::FETCH_NUM);
                            foreach ($result as $row) {
                                echo '<option>' . $row[0] . '</option>';
                            }
                            ?>
                        </select>
                        <input type="file">
                    </label>
                    <input type="submit" value = "Dodaj">
                </form>
            </div>
        </div>
    </div>
    <div id="footer">
        <p>Contact details admin@sampleRentCompany.test.local &copy 2023</p>
    </div>
</div>
</body>
</html>
