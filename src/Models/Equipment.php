<?php

namespace Models;

class Equipment
{
    private int $id;
    private String $name;
    private String $producer_name;
    private String $price;
    private array $categories;
    private array $parameters;
    private string $additional_info;

    private String $image_path;

    private bool $availability;

    /**
     * @param int $id
     * @param String $name
     * @param String $producer_name
     * @param String $price
     * @param array $categories
     * @param array $parameters
     * @param string $additional_info
     * @param String $image_path
     * @param bool $availability
     */
    public function __construct(int $id, string $name, string $producer_name, string $price, array $categories, array $parameters, string $additional_info, string $image_path, bool $availability)
    {
        $this->id = $id;
        $this->name = $name;
        $this->producer_name = $producer_name;
        $this->price = $price;
        $this->categories = $categories;
        $this->parameters = $parameters;
        $this->additional_info = $additional_info;
        $this->image_path = $image_path;
        $this->availability = $availability;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getAvailability(): bool
    {
        return $this->availability;
    }

    public function setAvailability(bool $availability): void
    {
        $this->availability = $availability;
    }


    public function getImagePath(): string
    {
        return $this->image_path;
    }

    public function setImagePath(string $image_path): void
    {
        $this->image_path = $image_path;
    }

    public function getCategories(): array
    {
        return $this->categories;
    }

    public function setCategories(array $categories): void
    {
        $this->categories = $categories;
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }

    public function setParameters(array $parameters): void
    {
        $this->parameters = $parameters;
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

    public function getCategory(): array
    {
        return $this->categories;
    }

    public function setCategory(array $categories): void
    {
        $this->categories = $categories;
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