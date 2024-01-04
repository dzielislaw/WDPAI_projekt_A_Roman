<?php

namespace Repository;

use Models\User;
use PDO;
use Repository;

require_once 'Repository.php';

class UserRepository extends Repository
{
    public function getUser($email): ?User{
        #echo $email;
        $stmt = $this->database->connect()->prepare('
            SELECT imie AS name, nazwisko AS surname, email, hash FROM public.klienci WHERE email = :email
        ;');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$user){
            return null;
        }

//        echo $user['name'];
//        echo $user['surname'];
//        echo $user['email'];
//        echo $user['hash'];

        return new User(
            $user['name'],
            $user['surname'],
            $user['email'],
            $user['hash']
        );
    }
}