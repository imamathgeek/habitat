<?php
include "../top.php";

$strangers = $db->selectStrangersByNetId('jsiebert');
echo ROOT . '/web/img/defProPic.pdf';
?>

<div>
<?php foreach($strangers as $stranger): ?>
	<div>
		<h3><?= $stranger['fldFirstName'] . " " . $stranger['fldLastName']; ?></h3>
		<img src="<?= ROOT . '/web/img/defProPic.jpg'; ?>"></img>
	</div>
	<ul>
		<li>Time to Rise</li>
		<li>Smoker</li>
		<li>Year</li>
		<li>Lifestyle</li>
	</ul>
<?php endforeach; ?>
</div>