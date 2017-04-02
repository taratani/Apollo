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

/*
* ParseUser::getCurrentUser() is NULL if the user isn't logged in,
* therefore, this function effectively returns wether or not they
* are logged in
*/
function isLoggedIn() {
	return ParseUser::getCurrentUser();
}

//easy way to make alert
function createAlert($msg) {
	echo createAlertWithType("danger", $msg);
}

//type can be: danger, warning, success, primary, default, info
function createAlertWithType($type, $msg) {
	echo "<div class='alert alert-". $type ."' role='alert' style='text-align:center'>$msg</div>";
}
?>

<html>
<head>
	<title>Apollo Project</title>

		<!--include bootstrap css in every file, done by storing it in the header -->
	<link href="css/bootstrap.css" rel="stylesheet">
</head>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
        <img alt="Apollo" src="imgs/ApolloLogo.png" width="25px" height="25px">
      </a>
    </div>

    <!-- This will be the left side of the navbar -->
      <ul class="nav navbar-nav">
        <li><a href="#">Link</a></li>
      </ul>
     

      <!-- This is the right side. We will show two different things depending if they are signed in or not-->
      <ul class="nav navbar-nav navbar-right">
      <?php 
  		if(isLoggedIn()) {//if they are logged in, show them this
  			echo '<li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> ' .
	          ParseUser::getCurrentUser()->get("username") .
	          '<span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="#">Profile</a></li>
	            <li role="separator" class="divider"></li>
	            <li><a href="signout.php">Logout</a></li>
	          </ul>
	        </li>';
      	} else {//otherwise, show them this
	      	echo '<li><form class="navbar-form" method="POST" action="login.php">
		        <div class="form-group">
		          <input type="text" class="form-control" placeholder="Username" id="username" name="username">
		        </div>
		        <div class="form-group">
		          <input type="password" class="form-control" placeholder="Password" id="passwd" name="passwd">
		        </div>
		        <button type="submit" class="btn btn-success">Login</button>
		        <a href="signup.php"><button class="btn btn-danger btn-sm" type="button">Sign Up</button></a>
		      </form></li>
		      <li></li>';

      	}
      ?>
         
        
      </ul>
  </div><!-- /.container-fluid -->
</nav>