<html lang="pl-PL">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Aplikacja wypożyczalni sprzętu budowlanego i ogrodowego">
        <meta name="keywords" content="narzędzia, wypożyczalnia, sprzęt, sprzętapka">
        <meta name="author" content="Ja">
        <link rel="icon" type="image/x-icon" href="public/img/favicon.ico">
        <title>Sprzęt-apka</title>
        <link rel="stylesheet" href = "public/css/main.css" type="text/css">

    </head>
    <body>
        <div id="container">
            <div id="banner">
                <h1>Sprzęt-apka</h1>
                <img src="public/img/logo.png" alt="logo">
            </div>
            <div id="left">
                <h1>Sprzęt-apka</h1>
                <div id = "logo">
                    <img src="public/img/logo.png" alt="logo">
                </div>
            </div>
            <div id="right" class="flex-column-center-center">
                <form action="login" method="POST" class="flex-column-center-center">
                    <div id="messages">
                        <?php
                            if(isset($messages)){
                                foreach ($messages as $message){
                                    echo $message;
                                }
                            }
                        ?>
                    </div>
                    <input class="userButton" type="email" name="email" placeholder="email"> <br>
                    <input class="userButton" type="password" name="password" placeholder="hasło"> <br>
                    <div><input type="checkbox" name="isWorker"> Zaloguj na konto pracownicze</div>
                    <input id="loginButton" type="submit" value="Zaloguj">
                </form>
                <a href="./register"><button id="registerButton">Nie masz konta? Zarejestruj się</button></a>
            </div>
            <div id="footer">
                <p>Contact details admin@sampleRentCompany.test.local &copy 2023</p>
            </div>
        </div>
    </body>
</html>