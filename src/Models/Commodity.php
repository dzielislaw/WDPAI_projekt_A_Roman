<?php

namespace Models;

class Commodity
{
    private int $id;
    private String $name;
    private String $producer_name;
    private String $price;
    private string $category;
    private string $additional_info;

    public function __construct(int $id, string $name, string $producer_name, string $price, string $category, string $additional_info)
    {
        $this->id = $id;
        $this->name = $name;
        $this->producer_name = $producer_name;
        $this->price = $price;
        $this->category = $category;
        $this->additional_info = $additional_info;
    }


    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getProducerName(): string
    {
        return $this->producer_name;
    }

    public function setProducerName(string $producer_name): void
    {
        $this->producer_name = $producer_name;
    }

    public function getPrice(): string
    {
        return $this->price;
    }

    public function setPrice(string $price): void
    {
        $this->price = $price;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    public function getAdditionalInfo(): string
    {
        return $this->additional_info;
    }

    public function setAdditionalInfo(string $additional_info): void
    {
        $this->additional_info = $additional_info;
    }

}