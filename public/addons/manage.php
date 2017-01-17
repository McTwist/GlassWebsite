<?php
	require dirname(__DIR__) . '/../private/autoload.php';
	use Glass\AddonManager;

	//info is an array that either has the property "redirect" set, or has the following
	//	message - string
	//	addon - AddonObject
	//	user - UserObject
	$info = include(realpath(dirname(__DIR__) . "/../private/json/manageAddon.php"));

	if(isset($info['redirect'])) {
		header("Location: " . $info['redirect']);
		die();
	}

	$addon = AddonManager::getFromId($_GET['id']);

	$_PAGETITLE = "Blockland Glass | Manage Add-On";
	include(realpath(dirname(__DIR__) . "/../private/header.php"));
	include(realpath(dirname(__DIR__) . "/../private/navigationbar.php"));

	if(!isset($_GET['tab']) || $_GET['tab'] == "") {
		$_GET['tab'] = "desc";
	}
?>

<div class="maincontainer">
	<div class="tile" style="width:calc(100%-15px); font-size: 1.8em">
		Managing <b><?php echo htmlspecialchars($addon->getName()) ?></b>
	</div>
	<div class="tile" style="width: 200px; float: left;">
		<ul class="sidenav">
			<li><a href="?id=<?php echo $_GET['id'] ?>&tab=desc">Description</a></li>
			<!-- <li><a href="?id=<?php echo $_GET['id'] ?>&tab=ss">Screenshots</a></li> -->
			<li><a href="/addons/upload/screenshots.php?id=<?php echo $_GET['id'] ?>">Screenshots</a></li>
			<li><a href="?id=<?php echo $_GET['id'] ?>&tab=dep">Dependencies</a></li>
		</ul>
		<br />
		<ul class="sidenav">
			<li><a href="https://blocklandglass.com/addons/update.php?id=<?php echo $_GET['id'] ?>">Update</a></li>
		</ul>
		<br />
		<ul class="sidenav">
			<li><a href="https://blocklandglass.com/stats/addon.php?id=<?php echo $_GET['id'] ?>">Statistics</a></li>
		</ul>
	</div>
	<div class="tile" style="width: 680px; padding: 15px; float: right;">
		<?php
			include(realpath(dirname(__FILE__) . "/manage/" . $_GET['tab'] . ".php"));
		?>
	</div>
</div>
<?php
	include(realpath(dirname(__DIR__) . "/../private/footer.php"));
?>
