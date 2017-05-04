<html>
<head>
	<title>Welcome to Apollo !</title>
	<meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="841891348854-ieido46gjsi0kpp7k5ep1heqn8ab49u4.apps.googleusercontent.com">
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap-social.css" rel="stylesheet">
	<link href="css/font-awesome.css" rel="stylesheet">

</head>
<body>
    <div style="position:absolute;z-index:-1;width:100%;height:100%;">
        <img src="imgs/homepage.jpg" width="100%" height="100%"/>
    </div>
    <div class="col-md-4 col-md-offset-4" style="padding-top:5%"> 
	    <div style="text-align:center">
		    <a href="index.php"><img alt="Apollo" src="imgs/ApolloLogo.png" width="500px" height="500px"></a>
		    <h2 style="color:#FFFFFF">Welcome to Apollo</h2>
		    <a href="login.php"><button class="btn btn-danger">Login</button></a>
		     <a href="signup.php"><button class="btn btn-danger">Signup</button></a>
	    </div>
        <div class="col-md-12"></div>
        <div align="center" style= "padding-top: 30px; padding-bottom: 30px; margin-bottom: 30px;">
    	    <a class="btn btn-social btn-facebook" style="display: inline-block;" id="facebook-login">
                <span class="fa fa-facebook"></span> Facebook
		    </a>
  		    <a class="g-signin2" data-onsuccess="onSignIn" style="display: inline-block;position:relative;top:14px;">
     	        <span class="fa fa-google"></span> Google
		    </a>
        </div>
	    <div align="center" style= "padding-top: 30px; padding-bottom: 30px; margin-bottom: 30px;">
	        <a href="#">About Us</a>
	    </div>
	</div>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="https://connect.facebook.net/en_US/sdk.js"></script>
	<script src="https://apis.google.com/js/platform.js"></script>
	<script>
		window.fbAsyncInit = function() {
			FB.init({
				appId      : '247044185699436',
				xfbml      : true,
				version    : 'v2.9'
			});
		};
		$("#facebook-login").on("click", function(){
			FB.login(function(response) {
				if (response.authResponse) {
					console.log(response.authResponse.accessToken)
					// alert('You are logged in &amp; cookie set!');
					// Now you can redirect the user or do an AJAX request to
					// a PHP script that grabs the signed request from the cookie.
					var data = 'accessToken=' + response.authResponse.accessToken
					$.ajax({
						type: "POST",
						url: "facebookLoginController.php",
						data: data,
						success: function(msg){
							console.log(msg)
							if (msg === 'success') {
								location.href = 'index.php'
							}
						}
					});
				} else {
					alert('User cancelled login or did not fully authorize.');
				}
    		});
    		return false;
		});
		function onSignIn(googleUser) {
			// Useful data for your client-side scripts:
			var profile = googleUser.getBasicProfile();
			// console.log("ID: " + profile.getId()); // Don't send this directly to your server!
			// console.log('Full Name: ' + profile.getName());
			// console.log('Given Name: ' + profile.getGivenName());
			// console.log('Family Name: ' + profile.getFamilyName());
			// console.log("Image URL: " + profile.getImageUrl());
			// console.log("Email: " + profile.getEmail());

			// The ID token you need to pass to your backend:
			var id_token = googleUser.getAuthResponse().id_token;
			// console.log("ID Token: " + id_token);
			var data = 'username=' + profile.getName() + '&email=' + profile.getEmail() + '&firstname=' + profile.getGivenName() + '&lastname=' + profile.getFamilyName() + '&id=' + profile.getId()
			$.ajax({
				type: "POST",
				url: "googleLoginController.php",
				data: data,
				success: function(msg){
					console.log(msg)
					if (msg === 'success') {
						location.href = 'index.php'
					}
				}
			});
      };

</script>
</body>
</html>