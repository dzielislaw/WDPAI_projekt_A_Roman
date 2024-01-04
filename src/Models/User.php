<?php

namespace Models;

class User
{
    private string $name;
    private string $surname;
    private string $email;
    private string $hash;

    /**
     * @param String $name
     * @param String $surname
     * @param String $email
     * @param String $hash
     */
    public function __construct(string $name, string $surname, string $email, string $hash)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->hash = $hash;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function gethash(): string
    {
        return $this->hash;
    }

    public function setHash(string $passwordHash): void
    {
        $this->hash = $passwordHash;
    }

}
?>