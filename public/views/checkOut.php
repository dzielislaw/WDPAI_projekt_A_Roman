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
    <script type="text/javascript" src="./public/js/RentalSystem.js" defer></script>

</head>
<body>
<div id="container">
    <div id="banner">
        <div id="header">
            <h1>Sprzęt-apka</h1>
        </div>
        <div id="buttonArea">
            <form class="banner_form" action="dashboard">
                <button class="userButton">Moje konto</button>
            </form>
            <form class = "banner_form" action="logout" method="GET">
                <button class="userButton">Wyloguj</button>
            </form>
        </div>
    </div>
    <div id="left">
        <?php

        use Repository\CheckOutRepository;

        require_once __DIR__.'/../../src/Repository/CheckOutRepository.php';
        $checkOutRepository = new CheckOutRepository();
        $checkOutList = $checkOutRepository->getAll();
        if (!empty($checkOutList)) {
            echo '<table>
                <tr>
                    <th>Id</th>
                    <th>Klient</th>
                    <th>Sprzęt</th>
                </tr>';
            foreach ($checkOutList as $row) {
                $rentalId = $row['rental_id'];
                echo '<tr>
                    <td>' . $rentalId . '</td>
                    <td>' . $row['client'] . '</td>
                    <td>' . $row['equipment_name'] . '</td>
                    <td> <button onclick="checkOutDialog('. $rentalId . ', \''. $row['client'].'\', \''.$row['equipment_name'].'\')">Wydaj sprzęt</button> </td>' .
                    '</tr>';
            }
            echo '</table>';
        }
        else{
            echo '<h3>Na ten moment żadnych rezerwacji do odbioru</h3>';
        }
        ?>
    </div>
    <div id="footer">
        <p>Contact details admin@sampleRentCompany.test.local &copy 2023</p>
    </div>
</div>
</body>
</html>
