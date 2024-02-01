<?php

#namespace Repository;

use Models\Client;
#use PDO;
#use Repository;

require_once 'Repository.php';

class ClientRepository extends Repository
{
    public function getById($clientId): ?Client{
        $stmt = $this->database->connect()->prepare('
            SELECT klient_id AS id,
                   imie AS name,
                   nazwisko AS surname,
                   email,
                   hash
            FROM public.klienci
            WHERE id = :id
        ;');
        $stmt->bindParam(':id', $clientId);
        $stmt->execute();
        $client = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$client){
            return null;
        }

        return new Client(
            $client['id'],
            $client['name'],
            $client['surname'],
            $client['email'],
            $client['hash']
        );
    }

    public function getByEmail($email): ?Client{
        $stmt = $this->database->connect()->prepare('
            SELECT klient_id AS id,
                   imie AS name,
                   nazwisko AS surname,
                   email,
                   hash
            FROM public.klienci
            WHERE email = :email
        ;');
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $client = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$client){
            return null;
        }

        return new Client(
            $client['id'],
            $client['name'],
            $client['surname'],
            $client['email'],
            $client['hash']
        );
    }
}