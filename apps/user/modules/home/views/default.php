<div class="row page-wrapper">
	<div class="col-md-12">
		<h1>Your Habitat</h1>
		<div class="row">
			<div class="col-xs-12 col-sm-8" id="matcher">
				<h3>Find a Roommate</h3>
			<?php if (!empty($unseen_user)): ?>
				<div class="row">
					<div class="col-xs-4">
						<img src="/img/profile_pic.png" alt="Help this guy find a roommate" class="img-circle img-fill">
					</div>
					<div class="col-xs-8">
						<h4><?= $unseen_user['name']; ?></h4>
					</div>
				</div>
				<div>
					<div class="col-xs-2">This</div>
					<div class="col-xs-2">is</div>
					<div class="col-xs-2">one</div>
					<div class="col-xs-2">thing</div>
					<div class="col-xs-2">about</div>
					<div class="col-xs-2">me</div>
				</div>
				<div>
					<p>Think you'd make good roommates?</p>
					<button class="btn btn-default">No</button>
					<button class="btn btn-default">Yes</button>
				</div>
			<?php endif; ?>
			</div>
			<div class="col-xs-12 col-sm-4" id="matches">
				<h3>Your Matches (3)</h3>
				<p>You matched with the following people!</p>
				<ul>
					<li>Person 1 - Email</li>
					<li>Person 2 - Email</li>
					<li>Person 3 - Email</li>
				</ul>
			</div>
		</div>
	</div>
</div>