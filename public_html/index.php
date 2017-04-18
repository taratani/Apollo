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
<h1>Recent Winners</h1>
	
		<div class="row">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="imgs/Artist1.png">
      <div class="caption">
        <h3>March Winner</h3>
        <p><i><b>Artist name</b> is an aspising artist from Boulder, Colorado. His music... (brief description of artist)</i></p>
        <p><a href="https://soundcloud.com" class="btn btn-primary" role="button">Soundcloud</a> <a href="#" class="btn btn-default" role="button">Facebook</a> <a herf= "#" class="btn btn-default" role="button">Twitter</a> <a herf= "#" class="btn btn-default" role="button">Instagram</a></p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="imgs/Artist2.png">
      <div class="caption">
        <h3>February Winner</h3>
        <p><i><b>Artist name</b> is an aspising artist from Boulder, Colorado. His music... (brief description of artist)</i></p>
        <p><a href="https://soundcloud.com" class="btn btn-primary" role="button">Soundcloud</a> <a href="#" class="btn btn-default" role="button">Facebook</a> <a herf= "#" class="btn btn-default" role="button">Twitter</a> <a herf= "#" class="btn btn-default" role="button">Instagram</a></p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="imgs/Artist4.png">
      <div class="caption">
        <h3>January Winner</h3>
        <p><i><b>Artist name</b> is an aspising artist from Boulder, Colorado. His music... (brief description of artist)</i></p>
        <p><a href="https://soundcloud.com" class="btn btn-primary" role="button">Soundcloud</a> <a href="#" class="btn btn-default" role="button">Facebook</a> <a herf= "#" class="btn btn-default" role="button">Twitter</a> <a herf= "#" class="btn btn-default" role="button">Instagram</a></p>
      </div>
    </div>
  </div>
</div>

<h1>Tournaments</h1>

	<div>
		<div class="jumbotron">
		<div style=" background-image:url('imgs/AprilBanner.png'); background-size:100%">
		
		

  <div class="container">
  		
    <h1 style="color:white">Monthly Contest ~ April</h1>

  <p style="color:white">16 artists</p>
<!-- Single button -->
<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Vote! <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="#">Vote</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Check Results</a></li>
  </ul>
</div></p>
  </div>
</div>


<div class="jumbotron">
		<div style=" background-image:url('imgs/Summer.png'); background-size:100%">
		
		

  <div class="container">
  		
    <h1 style="color:white">Summer Jams Contest </h1>

  <p style="color:white">16 artists</p>
<!-- Single button -->
<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Vote! <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="#">Vote</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Check results</a></li>
  </ul>
</div></p>


<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</body>


<?php
	include "footer.php";

?>
