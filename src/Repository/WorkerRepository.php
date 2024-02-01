<?php

namespace Repository;
use Models\Worker;
use PDO;

require_once 'Repository.php';
require_once __DIR__.'/../Models/Worker.php';

class WorkerRepository extends \Repository
{
    public function getByEmail($email): ?Worker
    {
        $stmt = $this->database->connect()->prepare('
            SELECT pracownik_id AS id,
                   imie AS name,
                   nazwisko AS surname,
                   email,
                   hash
            FROM public.pracownicy
            WHERE email = :email;
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $worker = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$worker){
            return null;
        }

        return new Worker(
            $worker['id'],
            $worker['email'],
            $worker['name'],
            $worker['surname'],
            $worker['hash']
        );
    }

    public function getById(int $workerId): ?Worker
    {
        $stmt = $this->database->connect()->prepare('
            SELECT pracownik_id AS id,
                   imie AS name,
                   nazwisko AS surname,
                   email,
                   hash
            FROM public.pracownicy
            WHERE pracownik_id = :id;
        ');
        $stmt->bindParam(':id', $workerId);
        $stmt->execute();
        $worker = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$worker){
            return null;
        }

        return new Worker(
            $worker['id'],
            $worker['email'],
            $worker['name'],
            $worker['surname'],
            $worker['hash']
        );
    }

}