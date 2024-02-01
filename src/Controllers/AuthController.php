<?php
require_once 'AppController.php';
abstract class AuthController extends AppController{
    public function isClient(): bool
    {
        return (isset($_SESSION['auth_level']) && $_SESSION['auth_level'] == 'client');
    }

    public function isWorker(): bool
    {
        return (isset($_SESSION['auth_level']) && $_SESSION['auth_level'] == 'worker');
    }

    public function getCurrentUserId(){
        if(!isset($_SESSION['user_id'])){
            return null;
        }
        return $_SESSION['user_id'];
    }
}
