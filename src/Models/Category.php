<?php

namespace Models;
require_once __DIR__.'/DictClass.php';

class Category extends DictClass
{
    public function __construct(int $id, string $name)
    {
        parent::__construct($id, $name);
    }

}