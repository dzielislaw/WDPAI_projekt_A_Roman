<?php

use Models\Equipment;

require_once 'Repository.php';
#use Models\Category;
require_once __DIR__.'/../Models/Category.php';

class CategoriesRepository extends Repository
{
    public function getCategories() : ?array{
        $stmt = $this->database->connect()->prepare('
        SELECT kategoria_id AS id, nazwa AS name FROM kategorie ORDER BY name;
        ');
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(!$result){
            return null;
        }
        $categories = array();
        foreach ($result as $row){
            $categories[] = new Models\Category($row['id'], $row['name']);
        }
        return $categories;
    }
}