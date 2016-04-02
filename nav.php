<nav>
    <ul class="nav nav-pills">
		<li <?php if ($phpSelf == "/user/home.php") { print 'class="active"'; }?>><a href="home.php">Find a Roommate</a></li>
		<li <?php if ($phpSelf == "/user/match.php") { print 'class="active"'; }?>><a href="match.php">View Your Matches</a></li>
		<li <?php if ($phpSelf == "/user/account.php") { print 'class="active"'; }?>><a href="account.php">Your Profile</a></li>
		<li><a href="/../index.php">Log Out</a></li>
	</ul>
</nav>
