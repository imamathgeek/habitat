<?php
include("../top.php");
include("../nav.php");


$matches = $db->selectMatchesByNetId('edzwonar');

$matches = $db->selectMatchesByNetId($username);
?>
 <link rel="stylesheet" href="style.css" type="text/css" media="screen">
<h1>Meet Your Matches!</h1>

<p id="des">Welcome to your habitat, a place for you, where you belong. Our team has carefully selected people we feel will complement your living style. Start emailing your matches to have your perfect college roommate experience here at UVM!</p>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Gender</th>
            <th>Year</th>
            <th>On/Off Campus?</th>
        </tr>
    </thead>
<?php if (!empty($matches)): ?>
    <tbody>
    <?php foreach ($matches as $match): ?>
        <tr>
            <td><?= $match['fldFirstName'] . " " . $match['fldLastName']; ?></td>
            <td><?= $match['fldGender']; ?></td>
            <td><?= $match['fldYear']; ?></td>
            <td>Unknown</td>
        </tr>
    <?php endforeach; ?>
    </tbody>
<? else: ?>
    <td>No matches yet, boss.</td>
<?php endif; ?>
</table>
