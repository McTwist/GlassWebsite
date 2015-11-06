<div class="navcontainer">
	<div class="navcontent">
		<!-- temporary nav -->
		<a class="homebtn" href="/">Blockland Glass</a>
		<ul>
			<li><a href="/addons" class="navbtn">Add-Ons</a></li>
			<li><a href="/builds" class="navbtn">Builds</a></li>
			<li><a href="/stat" class="navbtn">Statistics</a></li>
			<?php
				if(isset($_SESSION['loggedin'])) {
					//for some reason these only work for me with .php at the end
					//it might have to do with my version of apache
					echo "<li><a href=\"/user\" class=\"navbtn\">" . htmlspecialchars($_SESSION['username']) . "</a></li>";
					echo "<li><a href=\"/logout.php\" class=\"navbtn\" onclick=\"document.getElementById('logoutForm').submit(); return false;\">Log Out</a></li>";
				} else {
					echo "<li><a href=\"/login.php\" class=\"navbtn\" onclick=\"document.getElementById('loginForm').submit(); return false;\">Log In</a></li>";
				}

				if(!isset($_SESSION['csrftoken'])) {
					$_SESSION['csrftoken'] = rand();
				}
				//these forms are a bit redundant but i'm not sure if login and logout will stay identical
			?>
			<form class="hidden" id="logoutForm" action="/logout.php">
				<input type="hidden" name="csrftoken" value="<?php echo($_SESSION['csrftoken']); ?>">
				<input type="hidden" name="<?php echo(htmlspecialchars($_SERVER['REQUEST_URI'])); ?>">
			</form>
			<form class="hidden" id="loginForm" action="/login.php">
				<input type="hidden" name="csrftoken" value="<?php echo($_SESSION['csrftoken']); ?>">
				<input type="hidden" name="<?php echo(htmlspecialchars($_SERVER['REQUEST_URI'])); ?>">
			</form>
		</ul>
	</div>
</div>
