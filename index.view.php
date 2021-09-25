<!DOCTYPE html>
<html>
<head>
    <link href="index.css" rel="stylesheet">
</head>
<body>
<h2>Person Register</h2>
<form class="form-block" method="post">
    <label for="name"><b>Name:</b></label>
    <input type="text" id="name" name="name" placeholder="Name">
    <label for="surname">Surname:</label>
    <input type="text" id="surname" name="surname" placeholder="Surname">
    <label for="personalNumber">Personal Number:</label>
    <input type="text" id="personalNumber" name="personalNumber" placeholder="Number">
    <label for="additionalInfo">Additional Info:</label>
    <input type="text" id="additionalInfo" name="additionalInfo" placeholder="Info">
    <input type="submit" name="submitNew" value="Submit"><br><br>

</form>
<form class="form-block" action="driverInfo.php">
    <label for="searchNumber">Search by Personal Number:</label>
    <input type="text" id="searchNumber" name="searchNumber" placeholder="Number">
    <input type="submit" name="submitSearch" value="Submit"><br>
</form>

<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Surname</th>
            <th>Personal Number</th>
            <th>Additional Info</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($showTable as $person):
            /** @var Person $person */?>
        <tr>
            <td><?= $person->getName(); ?></td>
            <td><?= $person->getSurname(); ?></td>
            <td><?= $person->getPersonalNumber(); ?></td>
            <td><?= $person->getAdditionalInfo(); ?></td>

        </tr>
        <?php endforeach; ?>
        <tbody>
    </table>
</div>

</body>
</html>