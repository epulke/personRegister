<!DOCTYPE html>
<html>
<head>
    <link href="index.css" rel="stylesheet">
</head>
<body>
<h2>Person Register</h2>

<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>Data</th>
            <th>Information</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($showTable as $person):
            /** @var Person $person */?>
        <tr>
            <td><b>Name</b></td>
            <td><?= $person->getName(); ?></td>
        </tr>
        <tr>
            <td><b>Surname</b></td>
            <td><?= $person->getSurname(); ?></td>
        </tr>
        <tr>
            <td><b>Personal Number</b></td>
            <td><?= $person->getPersonalNumber(); ?></td>
        </tr>
        <tr>
            <td><b>Additional Information</b></td>
            <td><?= $person->getAdditionalInfo(); ?></td>
        </tr>
        <?php endforeach; ?>
        <tbody>
    </table>
</div>

<form class="form-block" action="index.php" method="post">
    <label for="back"><b>Go back:</b></label>
    <input type="submit" name="back" value="Back">
</form>
<form class="form-block" action="index.php" method="post">
    <label for="delete"><b>Delete this person:</b></label>
    <input type="hidden" name="deleteNumber" value="<?= $personNumber?>">
    <input type="submit" name="delete" value="Delete">
</form>

</body>
</html>