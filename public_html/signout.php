<?php
	require_once "header.php";

	use Parse\ParseUser;

	if(ParseUser::getCurrentUser()) {
		ParseUser::logOut();
	}

	header("location:login.php");
?>
<?php
	require_once "footer.php";//need to include these to complete the page without errors
?>