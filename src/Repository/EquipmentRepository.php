<?php

use Models\Equipment;

require_once 'Repository.php';
#use Models\Equipment;
require_once __DIR__.'/../Models/Equipment.php';

class EquipmentRepository extends Repository{
    public function getEquipment(int $id): Equipment
    {
        $stmt = $this->database->connect()->prepare('
        SELECT egzemplarze.egzemplarz_id, narzedzia.nazwa AS name, producenci.nazwa AS producer_name,
               egzemplarze.stan AS state, egzemplarze.uwagi, narzedzia.cena AS price, narzedzia.narzedzie_id
        FROM egzemplarze
        INNER JOIN narzedzia ON egzemplarze.narzedzie_id = narzedzia.narzedzie_id
        INNER JOIN producenci ON narzedzia.producent_id = producenci.producent_id
        WHERE egzemplarze.egzemplarz_id = :id;
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt =$this->database->connect()->prepare('
        SELECT kategorie.nazwa FROM kategorie
        INNER JOIN narzedzia_kategorie ON kategorie.kategoria_id = narzedzia_kategorie.kategoria_id
        INNER JOIN narzedzia ON narzedzia_kategorie.narzedie_id = narzedzia.narzedzie_id
        WHERE narzedzia.narzedzie_id = :id
        ORDER BY kategorie.nazwa;
        ');
        $stmt->bindParam(':id', $result['narzedzie_id'], PDO::PARAM_INT);
        $stmt->execute();
        $query2result = $stmt->fetchAll(PDO::FETCH_NUM);
        $categories = array();
        foreach($query2result as $row){
            $categories[] = $row[0];
        }

        # TODO
       /* $stmt =$this->database->connect()->prepare('
        SELECT parametry.nazwa AS parameter,
               public.narzedzia_parametry.wartosc AS value,
               jednostki.nazwa AS unit
        FROM narzedzia_parametry
        INNER JOIN jednostki ON narzedzia_parametry.jednostka_id = jednostki.jednostka_id
        INNER JOIN parametry ON narzedzia_parametry.parametr_id = parametry.parametr_id
        WHERE narzedzia_parametry.narzedzie_id = :narzedzie_id
        ORDER BY parametry.nazwa;
        ');
        $stmt->bindParam(':id', $result['narzedzie_id'], PDO::PARAM_INT);
        $stmt->execute();
        $query3result = $stmt->fetchAll(PDO::FETCH_NUM);
        $categories = array();
        foreach($query2result as $row){
            $categories[] = $row[0];
        }*/


        return new Equipment($id, $result['name'], $result['producer_name'], $result['price'],
            $categories, $result['state']);
    }

    public function getEquipments() : array
    {
        $result = [];
        $stmt = $this->database->connect()->prepare('
        SELECT nazwa, producenci.nazwa AS producent, cena
        FROM narzedzia
        INNER JOIN producenci ON narzedzia.producent_id = producenci.producent_id;
        ');
        $stmt->execute();
        #TODO dokończxyć
    }

    public function getEquipmentsByCategoryID($category_id) : array
    {
        $stmt = $this->database->connect()->prepare('
        SELECT egzemplarz_id AS id FROM egzemplarze
INNER JOIN narzedzia ON egzemplarze.narzedzie_id = narzedzia.narzedzie_id
INNER JOIN kategorie ON narzedzia.narzedzie_id = kategorie.kategoria_id
WHERE kategorie.kategoria_id = :category_id;
        ');
        $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $equipments = array();
        foreach($result as $row){
            $equipments[] = $this->getEquipment($row['id']);
        }
        return $equipments;
    }
}