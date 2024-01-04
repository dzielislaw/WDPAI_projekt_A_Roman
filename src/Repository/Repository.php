<?php

require_once __DIR__."/../../Database.php";

#namespace Repository;

class Repository
{
    protected $database;

    public function __construct(){
        $this->database = new Database();
    }

}