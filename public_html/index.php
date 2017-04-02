<?php
	require "header.php";
	use Parse\ParseUser;
	use Parse\ParseQuery;
	use Parse\ParseException;

	/*
	* Since this is the homepage, they don't need to be logged in
	if(!ParseUser::getCurrentUser()) {
		header('location:login.php');
	}
	*/
?>
<body>

</body>
<?php
	include "footer.php";

?>
