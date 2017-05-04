<?php
	require_once 'vendor/autoload.php';

	session_start();

	use Parse\ParseClient;
	use Parse\ParseUser;
	use Parse\ParseException;
    use Facebook\Facebook;

	ParseClient::initialize('apollo', '', 'ApolloMasterKey');//DONT TOUCH THESE
	ParseClient::setServerURL('http://localhost:1337', 'parse');//OR THESE
	// accessToken from homepage ajax post
    $accessToken = $_POST['accessToken'];
    $fb = new Facebook([
        'app_id' => '247044185699436',
        'app_secret' => '8e52875ab34a062388d5642c0d047a6c',
        'default_graph_version' => 'v2.5',
    ]);
    try {
        // Returns a `Facebook\FacebookResponse` object
        $response = $fb->get('/me?fields=id,name,first_name,last_name,email', $accessToken);
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }
    // facebook graph user
    $graphUser = $response->getGraphUser();
    $username = $graphUser->getName();
    try {
		//login
		$loggedUser = ParseUser::logIn($username, '000000');
	} catch (ParseException $error) {
		// login error,to register
        $user = new ParseUser();
        $user->set("username", $username);
        $user->set("email", $username.'@gamil.com');
        $user->set("password", '000000');
    	try {
	    	$user->signUp();
		} catch (ParseException $ex) {
			echo "Unable to sign up: " . $ex;
		}
	}
	if(ParseUser::getCurrentUser()) {
		echo 'success';
	}
?>