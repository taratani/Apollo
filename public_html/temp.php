<?php
	require "header.php";
	
	use Parse\ParseUser;
	use Parse\ParseException;

	$user = new ParseUser();
	$user->set("username", "jadengrossman");
	$user->set("password", "temp123");
	$user->set("email", "jaden.grossman@colorado.edu");
	$user->set("firstname", "Jaden");
	$user->set("lastname", "Grossman");
	$user->setArray("permissions", ["view", "edit", "edituser", "admin"]);

	try {
		$user->signUp();
	} catch (ParseException $ex) {
		echo $ex;
	}
?>
<body>
</body>
<?php
	include "footer.php";

?>
