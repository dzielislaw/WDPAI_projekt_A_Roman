<html lang="pl-PL">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Aplikacja wypożyczalni sprzętu budowlanego i ogrodowego">
        <meta name="keywords" content="narzędzia, wypożyczalnia, sprzęt, sprzętapka">
        <meta name="author" content="Ja">
        <link rel="icon" type="image/x-icon" href="public/img/favicon.ico">
        <title>Sprzęt-apka</title>
        <link rel="stylesheet" href = "public/css/register.css" type="text/css">

    </head>
    <body>
        <div id="container_pc">
            <div id="banner">
                <h1>Sprzęt-apka</h1>
            </div>
            <div id="logo">
                <img src="public/img/logo.png" alt="Logo">
            </div>
            <div id = "main_content">
                <form action="register" method="POST">
                    <input type="text" class="userInput" name="name" id="name" placeholder="imię">
                    <input type="text" class="userInput" name="surname" id="surname" placeholder="nazwisko">
                    <input type="text" class="userInput" name="pesel" id="pesel" placeholder="pesel">
                    <input type="text" class="userInput" name="email" id="email" placeholder="email">
                    <input type="password" class="userInput" name="password" id="password" placeholder="hasło">
                    <label>
                        <input type="checkbox" id="agreementCheckbox" name="agreementCheckbox" value="Akceptuję postanowienia regulaminu" required>
                        Akceptuję postanowienia regulaminu
                    </label>
                    <input class="userInput" id="registerButton" type="submit" value="Załóż konto">
                </form>
            </div>
            <div id="footer">
                <p>Contact details admin@sampleRentCompany.test.local &copy 2023</p>
            </div>
        </div>
        <div id="container_smartphone">
            <div id="banner">
                <h1>Sprzęt-apka</h1>
            </div>
            <div id="logo">
                <img src="public/img/logo.png" alt="Logo">
            </div>
            <div id = "main_content">
                <form action="register" method="POST">
                    <input type="text" class="userInput" name="name" id="name" placeholder="imię">
                    <input type="text" class="userInput" name="surname" id="surname" placeholder="nazwisko">
                    <input type="text" class="userInput" name="pesel" id="pesel" placeholder="pesel">
                    <input type="text" class="userInput" name="email" id="email" placeholder="email">
                    <input type="password" class="userInput" name="password" id="password" placeholder="hasło">
                    <label>
                        <input type="checkbox" id="agreementCheckbox" name="agreementCheckbox" value="Akceptuję postanowienia regulaminu" required>
                        Akceptuję postanowienia regulaminu
                    </label>
                    <input class="userInput" id="registerButton" type="submit" value="Załóż konto">
                </form>
            </div>
            <div id="footer">
                <p>Contact details admin@sampleRentCompany.test.local &copy 2023</p>
            </div>
        </div>
    </body>
</html>