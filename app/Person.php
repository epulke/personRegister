<?php

namespace App;

class Person
{
    private string $name;
    private string $surname;
    private int $personalNumber;
    private string $additionalInfo;

    public function __construct(string $name, string $surname, int $personalNumber, string $additionalInfo)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->personalNumber = $personalNumber;
        $this->additionalInfo = $additionalInfo;
    }

    public function getPersonDataArray(): array
    {
        return [$this->name, $this->surname, $this->personalNumber, $this->additionalInfo];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getPersonalNumber(): int
    {
        return $this->personalNumber;
    }

    public function getAdditionalInfo(): string
    {
        return $this->additionalInfo;
    }

}