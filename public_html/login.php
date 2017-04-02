<?php
	include "header.php";

	use Parse\ParseUser;
	use Parse\ParseException;

	if($_POST['username'] && $_POST['passwd']) {
		$user = $_POST['username'];
		$password = $_POST['passwd'];

		if($user && $password) {//both are set
			try {
				$loggedUser = ParseUser::logIn($user, $password);
			} catch (ParseException $error) {
				createAlert("Incorrect Login");
			}
		}
	}
	if(ParseUser::getCurrentUser()) {
		header("location:index.php");
	}
?>
<body>
	<div class="col-md-4 col-md-offset-4" style="padding-top:10%"> 
		<div class="well" style="text-align:center">
			<h2>Apollo</h2>
			<hr>
			<form action="login.php" method="POST">
				 <div class="form-group">
				    <label for="user">Username</label>
				    <input type="text" class="form-control" id="user" name="user" placeholder="Username">
				  </div>
				  <div class="form-group">
				    <label for="password">Password</label>
				    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
				  </div>

				  <button type="submit" class="btn btn-success">Login</button>
			</form>
			  <a href="signup.php"><button class="btn btn-danger">Sign Up</button></a>
		</div>
	</div>
</body>
<?php
	include "footer.php";

?>