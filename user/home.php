<?php
include "../top.php";
include "../nav.php";


if (!empty($_POST)) {
	$is_match = false;

	if (isset($_POST['btnYes'])) {
		$is_match = true;
	}

	$match_id = $_POST['hidUserId'];
	$db->insertMatch($username, $match_id, $is_match);
}

$strangers = $db->selectStrangersByNetId($username);
$stranger = $strangers[0];

?>

<div class="text-center">
	<div>
		<h3><?= $stranger['fldFirstName'] . " " . $stranger['fldLastName']; ?></h3>
		<img src="<?= ROOT . '/web/img/gifs/defaultProPic.gif'; ?>" />
	</div>
	<div class="row">
		<div class="col-xs-3"></div>
		<div class="col-xs-1">
			<img style="width:100%;" src="<?= ROOT . '/web/img/gifs/earlyBird.gif' ?>"></li>
		</div>
		<div class="col-xs-1">
			<img style="width:100%;" src="<?= ROOT . '/web/img/gifs/nonSmoker.gif' ?>"></li>
		</div>
		<div class="col-xs-1">
			<img style="width:100%;" src="<?= ROOT . '/web/img/gifs/pot.gif' ?>"></li>
		</div>
		<div class="col-xs-1">
			<img style="width:100%;" src="<?= ROOT . '/web/img/gifs/partyAnimal.gif' ?>"></li>
		</div>
		<div class="col-xs-1">
			<img style="width:100%;" src="<?= ROOT . '/web/img/gifs/4Year.gif' ?>"></li>
		</div>
		<div class="col-xs-3"></div>
	</div>
	<div>
		<form action="<?php print $phpSelf; ?>" method="post" id="frmNoMatch">
			<input type="hidden" id="hidUserId" name="hidUserId" value="<?php print $stranger['pmkId']; ?>" />
			<input type="submit" id="btnNo" name="btnNo" value="Nah" class="button">
		</form>
		<a>View Profile</a>
		<form action="<?php print $phpSelf; ?>" method="post" id="frmMatch">
			<input type="hidden" id="hidUserId" name="hidUserId" value="<?php print $stranger['pmkId']; ?>" />
			<input type="submit" id="btnYes" name="btnYes" value="Yes" class="button">
		</form>
	</div>
</div>