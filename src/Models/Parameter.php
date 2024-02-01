<?php

namespace Models;
require_once __DIR__.'/DictClass.php';
class Parameter extends DictClass
{
    private float $value;
    private String $unit;

    public function __construct(int $id, String $name, float $value, string $unit)
    {
        parent::__construct($id, $name);
        $this->value = $value;
        $this->unit = $unit;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function setValue(float $value): void
    {
        $this->value = $value;
    }

    public function getUnit(): string
    {
        return $this->unit;
    }

    public function setUnit(string $unit): void
    {
        $this->unit = $unit;
    }

}