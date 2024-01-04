<?php

use Models\User;

require_once 'AppController.php';
require_once __DIR__ .'/../models/User.php';
require_once __DIR__.'/../Repository/UserRepository.php';
class SecurityController extends AppController
{
    public function login(): void
    {
        $sampleUser = new User('Jan', 'Kiemlicz', 'jan@kiemlicz.com', password_hash('Kmicic123', PASSWORD_DEFAULT));

        if(!isset($_POST['email']) || !isset($_POST['password'])){
            $this->render('login', ['messages' => ['Please provide both email and passwordHash to log in']]);
            return;
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $userRepository = new UserRepository();
        $user=$userRepository->getUser($email);


        if(!$user || $user->getEmail() !== $email || !password_verify($password, $user->gethash())){
            $this->render('login', ['messages' => ['User with this email not exist or passwordHash is incorrect!']]);
            return;
        }
        // check passwd
        $_SESSION['auth'] = true;
        $url = "https://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/dashboard");
    }

    public function logout(){
       // session_destroy();
        unset($_SESSION['auth']);
        unset($_POST['email']);
        unset($_POST['password']);
       //var_dump($_SESSION['auth'] );
        $url = "https://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/index");
    }

    public function check(){
        if(!isset($_SESSION['auth']) || !$_SESSION['auth']){
            $url = "https://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        }
    }

    public function register(){
        if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['pesel']) && isset($_POST['email'])
            && $_POST['password'] && isset($_POST['agreementCheckbox']) && $_POST['agreementCheckbox']){
            $database = new Database();
            $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt = $database->connect()->prepare('
INSERT INTO public.klienci (email, imie, nazwisko, pesel, hash) VALUES (:email, :name, :surname, :pesel, :hash)'
            );
            $stmt->bindParam(':email', $_POST['email']);
            $stmt->bindParam(':name', $_POST['name']);
            $stmt->bindParam(':surname', $_POST['surname']);
            $stmt->bindParam(':pesel', $_POST['pesel']);
            $stmt->bindParam(':hash', $hash);
            $stmt->execute();
            unset($_POST['email']);
            unset($_POST['password']);
            unset($_POST['agreementCheckbox']);
            $url = "https://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/index");
        }
        else{
            unset($_POST['email']);
            unset($_POST['password']);
            unset($_POST['agreementCheckbox']);
            $url = "https://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/register");
        }
    }
}