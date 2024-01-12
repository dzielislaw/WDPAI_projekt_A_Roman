<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Aplikacja wypożyczalni sprzętu budowlanego i ogrodowego">
    <meta name="keywords" content="narzędzia, wypożyczalnia, sprzęt, sprzętapka">
    <meta name="author" content="Ja">
    <link rel="icon" type="image/x-icon" href="public/img/favicon.ico">
    <title>Sprzęt-apka</title>
    <link rel="stylesheet" href = "public/css/error404.css" type="text/css">
    <link rel="stylesheet" href = "public/css/equipments.css" type="text/css">

</head>
<body>
<div id="banner">
</div>
<div id="main_content">
    <?php
    require_once __DIR__.'/../../src/Repository/EquipmentRepository.php';

    $eq = new EquipmentRepository();
    $equipmentsRepo = $eq->getEquipmentsByCategoryID($_GET['toolSelect']);

    foreach ($equipmentsRepo as $equipment){
        echo '<div class="equipment">';
        echo $equipment->getName();
        echo '<br>';
        foreach ($equipment->getCategory() as $category){
            echo '#'.$category.' ';
        }
        echo '<br>';
        echo 'Marka: '.$equipment->getProducerName().'<br>';
        echo $equipment->getPrice();
        echo 'Zamów';
        echo "</div>\r\n";
    }
    ?>
</div>
<div id="footer">
    <p>Contact details admin@sampleRentCompany.test.local &copy 2023</p>
</div>
</body>
</html>