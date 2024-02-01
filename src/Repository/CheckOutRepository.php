<?php

namespace Repository;

use PDO;

require_once 'Repository.php';

class CheckOutRepository extends \Repository
{
    public function getAll(): ?array
    {
        $stmt = $this->database->connect()->prepare('
        SELECT public.wypozyczenia.wypozyczenie_id AS rental_id,
               narzedzia.nazwa AS equipment_name,
               concat(klienci.imie, \' \', klienci.nazwisko) as client
        FROM wypozyczenia
        INNER JOIN egzemplarze ON wypozyczenia.egzemplarz_id = egzemplarze.egzemplarz_id
        INNER JOIN narzedzia ON egzemplarze.narzedzie_id = narzedzia.narzedzie_id
        INNER JOIN klienci ON wypozyczenia.klient_id = klienci.klient_id
        WHERE wypozyczenia.odebrane = 0;
        ');
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(empty($result)){
            return null;
        }
        return $result;
    }

    public function markAsReceived($rentalId): void
    {
        $stmt = $this->database->connect()->prepare('
        UPDATE wypozyczenia
        SET odebrane = 1
        WHERE wypozyczenie_id = :rentalId;
        ');
        $stmt->bindParam(':rentalId', $rentalId);
        $stmt->execute();
    }

}