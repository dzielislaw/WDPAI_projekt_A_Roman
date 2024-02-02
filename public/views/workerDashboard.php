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
    <link rel="stylesheet" href = "public/css/workerDashboard.css" type="text/css">

</head>
<body>
<?php

$workerId = $_SESSION['user_id'];
$workerRepository = new \Repository\WorkerRepository();
$worker = $workerRepository->getById($workerId);
?>
<div id="banner">
    <div id="header">
        <h1>Dzień dobry <?php echo $worker->getName() ?>!</h1>
    </div>
    <div id="buttonArea">
        <form class="banner_form" action="/dashboard">
            <button class="userButton">Moje konto</button>
        </form>
        <form class = "banner_form" action="/logout" method="GET">
            <button class="userButton">Wyloguj</button>
        </form>
    </div>
</div>
<div id="middle">
    <form class="workerForm" action="/checkIn">
        <input type = "submit" value="Zwrót sprzętu">
    </form>
    <form class="workerForm" action="/checkOut">
        <input type = "submit" value="Wydawanie sprzętu">
    </form>
    <form class="workerForm" action="/addEquipment">
        <input type="submit" value="Dodawanie sprzętu">
    </form>
</div>
<div id="footer">
    <p>Contact details admin@sampleRentCompany.test.local &copy 2023</p>
</div>
</body>
</html>
