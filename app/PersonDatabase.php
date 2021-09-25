<?php

namespace App;

use League\Csv\Reader;
use League\Csv\Statement;
use League\Csv\Writer;

class PersonDatabase
{
    private array $personsAll;

    public function __construct()
    {
        $csv = Reader::createFromPath("personDatabase.csv", 'r');
        $csv->setHeaderOffset(0);
        $stmt = Statement::create();
        $records = $stmt->process($csv);
        foreach ($records as $record) {
            $this->addPerson(
                new Person($record["name"], $record["surname"], $record["personalNumber"], $record["additionalInfo"]
                ));
        }
    }

    public function addPerson(Person $person): void
    {
        $this->personsAll[] = $person;
    }

    public function getPersonsAll(): array
    {
        return $this->personsAll;
    }

    public function getPersonsArray(): array
    {
        $personDataArray = [];
        foreach ($this->personsAll as $person) {
            /** @var Person $person */
            $personDataArray[] = $person->getPersonDataArray();
        }
        return $personDataArray;
    }

    public function savePersonsDatabase(): void
    {
        $csv = Writer::createFromPath("personDatabase.csv", "w+");
        $header = ["name", "surname", "personalNumber", "additionalInfo"];
        $csv->insertOne($header);
        $csv->insertAll($this->getPersonsArray());
    }

    public function searchPerson(int $personalNumber): Person
    {
        foreach ($this->personsAll as $person)
        {
            /** @var Person $person */
            if ($person->getPersonalNumber() === $personalNumber)
            {
                return $person;
            }
        }
    }

    public function searchPersonArray(int $personalNumber): array
    {
        $searchedPerson = [];

        if ($personalNumber === 1)
        {
            $searchedPerson = $this->getPersonsAll();
        }
        foreach ($this->personsAll as $person)
        {
            /** @var Person $person */
            if ($person->getPersonalNumber() === $personalNumber)
            {
                $searchedPerson[] = $person;
            }
        }
        return $searchedPerson;
    }

    public function deletePerson(Person $personToDelete): void
    {
        foreach ($this->personsAll as $key => $person)
        {
            /** @var Person $person */
            if ($person === $personToDelete)
            {
                unset($this->personsAll[$key]);
            }
        }
    }


}