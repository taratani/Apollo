<?php
	require_once "header.php";



	use Parse\ParseUser;

	//if they are already signed in, send them to index
	if(isLoggedIn()) {
		header("location:index.php");
	}

	//just for future reference, the follow way of creating a user is NOT professional, 
	//professionals use Ajax to make a call in the background.
	//but that takes more time and adds complexity
	//so here it is
	$username = $_POST['user'];
	$passwd1 = $_POST['password'];
	$passwd2 = $_POST['password2'];
	$email = $_POST['email'];

	if($username && $passwd1 && $passwd2 && $email) {//if all four are set
		if(strlen($passwd1) >= 6) {//make sure password is at least 6 chars long
			if($passwd1 == $passwd2) {
				//if we get to here, everything looks good, try to sign them up!
				$user = new ParseUser();
				$user->set("username", $username);//required
				$user->set("email", $email);//required
				$user->set("password", $passwd1);//required
				$user->set("bio", "No bio"); // bio initially empty but can be changed in profile page
				$user->set("profPic", "imgs/defaultProf.jpg");	// set default profile picture
				try {
					$user->signUp();
					//if we made it to here, we are successful
					createAlertWithType("success", "Successfully Signed Up!");
				} catch (Exception $e) {
					//check for errors on signup
					if(strpos($e, 'Account already exists for this username.')) {
						createAlert("Error: Username is taken!");
					} else if(strpos($e, 'Account already exists for this email address.')) {
						createAlert("Error: This email has already been taken!");
					} else {
						echo "ERROR: " . $e;
					}
				}
			} else {//passwords dont match
				createAlert("Error: Passwords don't match");
			}
		} else {//less than 6 long
			createAlert("Error: Your password must be at least 6 characters long");
		}
	} else {
		createAlert("Error: Please fill all fields");
	}
?>

<div class="col-md-4 col-md-offset-4" style="padding-top:10%"> 
	<div class="well" style="text-align:center">
		<h2>Apollo - Signup</h2>
		<hr>
		<form action="signup.php" method="POST">
			<div class="form-group">
			    <label for="user">Username</label>
			    <input type="text" class="form-control" id="user" name="user" placeholder="Username">
			</div>
			<div class="form-group">
			    <label for="user">Email</label>
			    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
			</div>
			<div class="form-group">
			    <label for="password">Password</label>
			    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
			</div>
			<div class="form-group">
			    <label for="password">Confirm Password</label>
			    <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm Password">
			</div>
			  	<button href="signup.php" class="btn btn-danger">Sign Up</button>
		</form>
		Already have an account? <a href="login.php">Click here</a>
	</div>
</div>

<?php
	require_once "footer.php";//need to include these to complete the page without errors
?>