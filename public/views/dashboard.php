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
                    <form id="search" method="GET" action="equipments">
                        <label>
                            <select name="toolSelect" id="toolSelect" required>
                                <?php
                                require_once __DIR__.'/../../src/Repository/CategoriesRepository.php';
                                $repo = new CategoriesRepository();
                                $categories = $repo->getCategories();
                                foreach ($categories as $category){
                                    echo '<option value="'.$category->getId().'">'.$category->getName().'</option>';
                                }
                                ?>
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