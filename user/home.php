<?php
include "../top.php";


if (!empty($_POST)) {
	$is_match = false;

	if (isset($_POST['btnYes'])) {
		$is_match = true;
	}

	$match_id = $_POST['hidUserId'];

	$db->insertMatch($username, $match_id, $is_match);
}

$strangers = $db->selectStrangersByNetId('jsiebert');
$stranger = $strangers[0];

?>

<div>
	<div>
		<h3><?= $stranger['fldFirstName'] . " " . $stranger['fldLastName']; ?></h3>
		<img src="<?= ROOT . '/web/img/defaultProPic.jpg'; ?>" />
	</div>
	<ul class="qualities">
		<li><img>Time to Rise</li>
		<li><img>Smoker</li>
		<li><img>Year</li>
		<li><img>Lifestyle</li>
	</ul>
	<form action="<?php print $phpSelf; ?>" method="post" id="frmMatch">
		<input type="hidden" id="hidUserId" name="hidUserId" value="<?= print $stranger['pmkId']; ?>" />
		<input type="submit" id="btnYes" name="btnYes" value="Yes" class="button">
	</form>
	<form action="<?php print $phpSelf; ?>" method="post" id="frmNoMatch">
		<input type="hidden" id="hidUserId" name="hidUserId" value="<?= print $stranger['pmkId']; ?>" />
		<input type="submit" id="btnNo" name="btnNo" value="Nah" class="button">
	</form>
</div>