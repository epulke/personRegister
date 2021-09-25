<?php

require_once "vendor/autoload.php";

use App\Person;
use App\PersonDatabase;

$personRegister = new PersonDatabase();
$showTable = $personRegister->getPersonsAll();


if (isset($_POST["submitNew"]))
{
    $personRegister->addPerson(
        new Person($_POST["name"], $_POST["surname"], $_POST["personalNumber"], $_POST["additionalInfo"])
    );
    $personRegister->savePersonsDatabase();
}

if (isset($_POST["delete"]))
{

    $personDelete = $personRegister->searchPerson($_POST["deleteNumber"]);
    $personRegister->deletePerson($personDelete);
    $personRegister->savePersonsDatabase();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['postdata'] = $_POST;
    unset($_POST);
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}


require "index.view.php";