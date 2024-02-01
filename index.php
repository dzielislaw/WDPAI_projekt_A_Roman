<?php
session_start();
    require 'Routing.php';

    $path = trim($_SERVER['REQUEST_URI'], '/');
    $path = parse_url($path, PHP_URL_PATH);

    Routing::get('dashboard', 'DefaultController');

    Routing::get('index', 'DefaultController');
    Routing::post('login', 'SecurityController');

    Routing::get('logout', 'SecurityController');
    Routing::get('info', 'DefaultController');

    Routing::get('register', 'DefaultController');
    Routing::post('register', 'SecurityController');

    Routing::get('addEquipment', 'DefaultController');
    Routing::post('addEquipment', 'SecurityController');

    Routing::get('error404', 'DefaultController');

    Routing::get('equipments', 'DefaultController');
    Routing::post('rent', 'RentController');

    Routing::get('checkOut', 'DefaultController');
    Routing::post('checkOut', 'CheckOutApiController');

    Routing::get('checkIn', 'DefaultController');
    Routing::post('checkIn', 'CheckInApiController');

    Routing::run($path);
?>
<!--<!DOCTYPE html>-->
