<?php
session_start();
    require 'Routing.php';

    $path = trim($_SERVER['REQUEST_URI'], '/');
    $path = parse_url($path, PHP_URL_PATH);

    Routing::get('index', 'DefaultController');
    Routing::get('dashboard', 'DefaultController');
    Routing::post('login', 'SecurityController');

    Routing::get('logout', 'SecurityController');
    Routing::get('info', 'DefaultController');
    Routing::get('register', 'DefaultController');
    Routing::post('register', 'SecurityController');
    Routing::post('addEquipment', 'EquipmentController');

    Routing::get('error404', 'DefaultController');
    Routing::run($path);
?>
<!--<!DOCTYPE html>-->
