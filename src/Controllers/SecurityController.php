<?php

use Models\Client;

require_once 'AppController.php';
require_once __DIR__ . '/../Models/Client.php';
require_once __DIR__ . '/../Repository/ClientRepository.php';
require_once __DIR__.'/../Repository/WorkerRepository.php';

class SecurityController extends AuthController
{
    public function login(): void
    {
        if (!isset($_POST['email']) || !isset($_POST['password'])) {
            $this->render('login', ['messages' => ['Please provide both email and passwordHash to log in']]);
            return;
        }
        $email = $_POST['email'];
        $password = $_POST['password'];
        if(!isset($_POST['isWorker']) || $_POST['isWorker'] == 0) {

            $userRepository = new ClientRepository();
            $user = $userRepository->getByEmail($email);

            if (!$user || $user->getEmail() !== $email || !password_verify($password, $user->gethash())) {
                $this->render('login', ['messages' => ['Client with this email not exist or passwordHash is incorrect!']]);
                return;
            }
            // check passwd
            $_SESSION['auth_level'] = 'client';
            $_SESSION['user_id'] = $user->getId();
            $url = "https://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/dashboard");
        }
        else{
            // then it is a worker
            $workerRepository = new \Repository\WorkerRepository();
            $worker = $workerRepository->getByEmail($email);
            if (!$worker || $worker->getEmail() !== $email || !password_verify($password, $worker->gethash())) {
                $this->render('login', ['messages' => ['Client with this email not exist or passwordHash is incorrect!']]);
                return;
            }
            // check passwd
            $_SESSION['auth_level'] = 'worker';
            $_SESSION['user_id'] = $worker->getId();
            $url = "https://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/dashboard");
        }
    }

    public function logout(): void
    {
       // session_destroy();
        unset($_SESSION['auth_level']);
        unset($_SESSION['user_email']);
        unset($_POST['email']);
        unset($_POST['password']);
       //var_dump($_SESSION['auth'] );
        $url = "https://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/index");
    }

    public function check(): void
    {
        if(!isset($_SESSION['auth_level']) || !$_SESSION['auth_user']){
            $url = "https://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        }
    }

    public function register(): void
    {
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
    const MAX_FILE_SIZE = 1024*1024; # 1MB
    const SUPPORTED_TYPES = ['image/png', 'image/jpg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';
    private array $messages = [];

    public function addEquipment(): void
    {
        if($this->isWorker() && $this->isPost() && is_uploaded_file($_FILES['photo']['tmp_name']) && $this->validate($_FILES['photo'])){
            move_uploaded_file(
                $_FILES['photo']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['photo']['name']
            );
            $path = '/public/uploads/'.$_FILES['photo']['name'];
            $database = new Database();
            $stmt=$database->connect()->prepare('
                INSERT INTO narzedzia(producent_id, nazwa, cena, sciezka_zdj)
                VALUES(:producer_id, :name, :price, :image_path)
                RETURNING narzedzie_id;
            ');
            $stmt->bindParam(':producer_id', $_POST['producer']);
            $stmt->bindParam(':name', $_POST['name']);
            $stmt->bindParam(':price', $_POST['price']);
            $stmt->bindParam(':image_path', $path);
            $stmt->execute();
            $id = $stmt->fetch(PDO::FETCH_NUM);

            $stmt=$database->connect()->prepare('
                INSERT INTO narzedzia_kategorie (narzedie_id, kategoria_id)
                VALUES (:narzedzie_id, :kategoria_id);
            ');
            $stmt->bindParam(':narzedzie_id', $id[0]);
            $stmt->bindParam(':kategoria_id', $_POST['category']);
            $stmt->execute();

            if(isset($_POST['shouldAddExemplary'])) {
                $stmt = $database->connect()->prepare('
                INSERT INTO egzemplarze(narzedzie_id, stan)
                VALUES (:narzedzie_id, :stan);
                ');
                $stmt->bindParam(':narzedzie_id', $id[0]);
                $state = 'sprawny';
                $stmt->bindParam(':stan', $state);
                $stmt->execute();
            }
        }
        $this->render('addEquipment', ['messages' => $this->messages]);
    }

    public function validate(array $file) : bool {
        if($file == null){
            return false;
        }
        if($file['size'] > self::MAX_FILE_SIZE){
            $this->messages[] = 'File is too large for destination file system';
            return false;
        }

        if( !isset( $file['type'] ) || !in_array($file['type'], self::SUPPORTED_TYPES)){
            $this->messages[] = 'File type is not supported by this system';
            return false;
        }
        return true;
    }

    public function checkOut()
    {
        $checkOutRepository = new CheckOutRepository();
        if(isset($_GET['rentalId'])){
            $rentalId = $_GET['rentalId'];
            $checkOutRepository->markAsReceived($rentalId);
        }

        $checkOutList = $checkOutRepository->getAll();
        echo $checkOutList;
    }
}