<?php
	require_once 'vendor/autoload.php';

	session_start();

	use Parse\ParseClient;
	use Parse\ParseUser;
	use Parse\ParseException;

	ParseClient::initialize('Inventory', '', 'qwertyuioptempmaster');
	ParseClient::setServerURL('http://localhost:1337', 'parse');
	
	$currentUser = ParseUser::getCurrentUser();
	$sessionToken = ParseUser::getCurrentUser()->getSessionToken();

	if(!$currentUser) {
		header('location:login.php');
	}

	if(in_array("admin", $currentUser->get("permissions")) || in_array("edituser", $currentUser->get("permissions"))) {
		echo "HI";
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$confirmpassword = $_POST['confirmpassword'];
		$admin = $_POST['admin'];
		$edituser = $_POST['edituser'];
		$view = $_POST['view'];
		$edit = $_POST['edit'];
		$add = $_POST['add'];


		$permArray = array();
		if($admin) {
			array_push($permArray, "admin");
		}
		if($edituser) {
			array_push($permArray, "edituser");
		}
		if($view) {
			array_push($permArray, "view");
		}
		if($edit) {
			array_push($permArray, "edit");
		}
		if($add) {
			array_push($permArray, "add");
		}

		if($firstname && $lastname && $email && $password && $confirmpassword) {
			if($password == $confirmpassword) {
				$user = new ParseUser();
				$user->set("username", $email);
				$user->set("email", $email);
				$user->set("password", $password);
				$user->set("firstname", $firstname);
				$user->set("lastname", $lastname);
				$user->setArray("permissions", $permArray);

				try {
					$user->signUp();
					ParseUser::become($sessionToken);
					echo "SUCCESS@@@#@#";
				} catch (ParseException $ex) {
					echo "Unable to sign up: " . $ex;
				}
			} else {
				echo "Passwords are not equal";
			}
		} else {
			echo "SHIT";
		}
	} else {
		echo "no permission";
	}

	
?>