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

<div class="text-center">
	<div>
		<h3><?= $stranger['fldFirstName'] . " " . $stranger['fldLastName']; ?></h3>
		<img src="<?= ROOT . '/web/img/defaultProPic.jpg'; ?>" />
	</div>
	<div class="row">
		<div class="col-xs-3"></div>
		<div class="col-xs-1">
			<img style="width:100%;" src="<?= ROOT . '/web/img/earlyBird.jpg' ?>"></li>
		</div>
		<div class="col-xs-1">
			<img style="width:100%;" src="<?= ROOT . '/web/img/nonSmoker.jpg' ?>"></li>
		</div>
		<div class="col-xs-1">
			<img style="width:100%;" src="<?= ROOT . '/web/img/pot.jpg' ?>"></li>
		</div>
		<div class="col-xs-1">
			<img style="width:100%;" src="<?= ROOT . '/web/img/partyAnimal.jpg' ?>"></li>
		</div>
		<div class="col-xs-1">
			<img style="width:100%;" src="<?= ROOT . '/web/img/4Year.jpg' ?>"></li>
		</div>
		<div class="col-xs-3"></div>
	</div>
	<div>
		<form action="<?php print $phpSelf; ?>" method="post" id="frmNoMatch">
			<input type="hidden" id="hidUserId" name="hidUserId" value="<?= print $stranger['pmkId']; ?>" />
			<input type="submit" id="btnNo" name="btnNo" value="Nah" class="button">
		</form>
		<a>View Profile</a>
		<form action="<?php print $phpSelf; ?>" method="post" id="frmMatch">
			<input type="hidden" id="hidUserId" name="hidUserId" value="<?= print $stranger['pmkId']; ?>" />
			<input type="submit" id="btnYes" name="btnYes" value="Yes" class="button">
		</form>
	</div>
</div>