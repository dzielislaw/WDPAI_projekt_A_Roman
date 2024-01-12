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
<!--                    <div class = "logoElement" style="width: 60.9%; height: 35.3%; left: 7.27%; top: 0; background: #EAEC8A; border-radius: 1px; position: inherit;"></div>-->
<!--                    <div class = "logoElement" style="width: 10.9%; height: 66.7%; left: 7.27%; top: 33.3%; background: #EAEC8A; border-radius: 1px; position: absolute;"></div>-->
<!--                    <div class = "logoElement" style="width: 9.1%; height: 66.7%; left: 55.5%; top: 33.3%; background: #EAEC8A; border-radius: 1px; position: absolute;"></div>-->
<!--                    <div class = "logoElement" style="width: 7.3%; height: 27.5%; left: 69%; top: 4.6%; background: #EAEC8A; border-top-left-radius: 1px; border-top-right-radius: 25px; border-bottom-right-radius: 25px; border-bottom-left-radius: 1px; position: absolute;"></div>-->
<!--                    <div class = "logoElement" style="width: 24.5%; height: 7.8%; left: 76.2%; top: 13.6%; position: absolute; background: #DEE084; border-radius: 1px"></div>-->
<!--                    <div class = "logoElement" style="width: 4.5%; height: 5.9%; left: 17.3%; top: 43.1%; position: absolute; background: #EAEC8A; border-radius: 1px"></div>-->
<!--                    <div class = "logoElement" style="width: 16.4%; height: 35.3%; left: 0; top: 0; position: absolute; background: #EAEC8A; border-radius: 100%"></div>-->
<!--                    <div class = "logoElement" style="width: 4.5%; height: 7.8%; left: 68.2%; top: 13.7%; position: absolute; background: #EAEC8A"></div>-->
<!--                    <div class = "logoElement" style="width: 16.36%; height: 3.92%; left: 51.82%; top: 45.18%; position: absolute; background: #EAEC8A; border-radius: 1px"></div>-->
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