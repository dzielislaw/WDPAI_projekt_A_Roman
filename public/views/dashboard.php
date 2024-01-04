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
                    <form id="search" method="get" action="searchTool">
                        <label>
                            <select id="toolSelect" required>
                                <option disabled selected hidden="hidden">Co będzie Ci potrzebne?</option>
                                <optgroup label="elektronarzędzia">
                                    <option>Wiertarki</option>
                                    <option>Szlifierki</option>
                                    <option>Wiertnie</option>
                                    <option>Wkrętarki</option>
                                </optgroup>
                                <optgroup label="ogród">
                                    <option>Myjki ciśnieniowe</option>
                                    <option>Wiertnie</option>
                                    <option>Piły łańcuchowe</option>
                                </optgroup>
                                <optgroup label="sprzęt ciężki">
                                    <option>Betoniarki</option>
                                    <option>Cyrkularki</option>
                                    <option>Agregaty prądotwórcze</option>
                                </optgroup>
                            </select>
                        </label>
                        <input type="submit" value = "Szukaj">
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