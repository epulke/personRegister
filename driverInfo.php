<?php

require_once "vendor/autoload.php";

use App\PersonDatabase;

$personRegister = new PersonDatabase();
$showTable = $personRegister->getPersonsAll();

if (isset($_GET["submitSearch"]))
{
    $personNumber = $_GET["searchNumber"];
    $showTable = $personRegister->searchPersonArray($_GET["searchNumber"]);
}


require "driverInfo.view.php";