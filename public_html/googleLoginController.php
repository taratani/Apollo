<?php
	require_once 'vendor/autoload.php';

	session_start();

	use Parse\ParseObject;
	use Parse\ParseQuery;
	use Parse\ParseACL;
	use Parse\ParsePush;
	use Parse\ParseUser;
	use Parse\ParseInstallation;
	use Parse\ParseException;
	use Parse\ParseAnalytics;
	use Parse\ParseFile;
	use Parse\ParseCloud;
	use Parse\ParseClient;

	ParseClient::initialize('apollo', '', 'ApolloMasterKey');//DONT TOUCH THESE
	ParseClient::setServerURL('http://localhost:1337', 'parse');//OR THESE

    function _post($str){ 
        $val = !empty($_POST[$str]) ? $_POST[$str] : null; 
        return $val; 
    }
	$username = _post('username');
	try {
		//login
		$loggedUser = ParseUser::logIn($username, '000000');
	} catch (ParseException $error) {
		// login error,to register
		$user = new ParseUser();
		$user->set("username", $username);
		$user->set("email", _post('email'));
		$user->set("password", '000000');
		$user->set("firstname", _post('firstname'));
		$user->set("lastname", _post('lastname'));
		$user->set("bio", "No bio"); // bio initially empty but can be changed in profile page
		$user->set("profPic", "imgs/defaultProf.jpg");	// set default profile picture
    	try {
	    	$user->signUp();
			echo 'success';
		} catch (ParseException $ex) {
			echo "Unable to sign up: " . $ex;
		}
	}
	if(ParseUser::getCurrentUser()) {
		echo 'success';
	}
?>