<?php
	require_once "header.php";

	use Parse\ParseUser;

	//they cant see their profile if they're not logged in...
	if(!isLoggedIn()) {
		header("location:index.php");
	}

	if (isset($_POST['bio'])) {
		$bio = $_POST['bio'];
		ParseUser::getCurrentUser()->set("bio", $bio);
		ParseUser::getCurrentUser()->save();
	}

	require_once "Upload.php";
	require_once "soundcloud.php";
	require_once "track.php";

	$sc = NULL;

	if($user->get("soundcloud_user_id")) {
		$sc = new SoundCloud($user->get("soundcloud_user_id"));
	}

	if(isset($_POST['accountName'])) {
		//fetch id from name
		$id = SoundCloud::getUserIdFromUsername($_POST['accountName']);
		if(!$id) {
			createAlert("Error: Coundn't find account, check your spelling and try again");
		} else {
			$user->set("soundcloud_user_id", $id);
			$user->save();
		}
	}

	//check for unlink
	if(isset($_POST['unlink'])) {
		if($sc) {
			$sc->unlink();
		}
	}

	if($sc) {
		$sc->getPlaylists();
		foreach($sc->getPlaylists() as $playlist => $value) {
			$a = print_r($playlist,true);
			echo $a."\n\n\n\n\n$value";
		}
		/*foreach ($sc->getTracks() as $track) {
			echo $track->user_id;
		}*/
	}

	// Check if image file is an actual image or fake image
	if(isset($_POST["submit"])) {
		$upload = new Upload();
		$file = 'photo';

		$fileOk = 1;

		// check if valid file
		if(!$upload->fileExists($file)){
			echo '<div class="alert alert-danger">';
			echo  '<strong>Error!</strong> File must be selected before submitting.';
			echo '</div>';
			$fileOk = 0;
		}

		// check directory is writable
		if(!$upload->checkDir() && $fileOk){
			echo '<div class="alert alert-danger">';
			echo  '<strong>Error!</strong> File could not be uploaded.';
			echo '</div>';
			$fileOk = 0;
		}

		// check file is an image
		if(!$upload->checkType($file) && $fileOk){
			echo '<div class="alert alert-danger">';
			echo  '<strong>Error!</strong> File must have the extension png, jpg, or jpeg.';
			echo '</div>';
			$fileOk = 0;
		}

		// check file is less than 1 mb
		if(!$upload->checkSize($file) && $fileOk){
			echo '<div class="alert alert-danger">';
			echo  '<strong>Error!</strong> File is too big to be uploaded.';
			echo '</div>';
			$fileOk = 0;
		}

		// if everything checks out, attempt to upload file
		if($fileOk){
			$name = basename($_FILES[$file]['name']);
			if(move_uploaded_file($_FILES[$file]['tmp_name'], $upload->destination.$name))
			{
				// check if user has profile pic saved
				if(ParseUser::getCurrentUser()->get('profPic') != 'imgs/imgs/defaultProf.jpg')
				{
					// delete old picture
					unlink(ParseUser::getCurrentUser()->get('profPic'));
				}
				// save new path to profile pic
				ParseUser::getCurrentUser()->set('profPic', $upload->destination.$name);
				ParseUser::getCurrentUser()->save();

				echo '<div class="alert alert-success">';
				echo  '<strong>Success!</strong> The file '.$_FILES[$file]['name'].' has been uploaded!';
				echo '</div>';				
			}else{
				echo '<div class="alert alert-danger">';
				echo  '<strong>Error!</strong> File could not be uploaded.';
				echo '</div>';				
			}
		}else{
			echo '<div class="alert alert-danger">';
			echo  '<strong>Error!</strong> File could not be uploaded.';
			echo '</div>';
		}
	}
?>

<!-- this scrip changes the color of the buttons in the panel when clicked -->
<script>
$(document).ready(function() {
$(".btn-pref .btn").click(function () {
    $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
    // $(".tab").addClass("active"); // instead of this do the below 
    $(this).removeClass("btn-default").addClass("btn-primary");   
});
});
</script>

<!-- this script sends a post request for the bio change -->
<script>
$(document).ready(function(){
$("#bioSubmit").click(function(){
    $.post("profile.php",
    {
        bio: $("#biography").val()
    }
    );
});
});
</script>


<!-- this is the beginning of the panel -->
<div class="row">
	<div class="col-md-6 col-md-offset-1">
		<div class="panel panel-info" style="text-align:center;">

		<!-- heading for the panel -->
		 	<div class="panel-heading">
		    	<h3 class="panel-title">Welcome to your profile page!</h3>
		  	</div>

		  	<!-- start of the body for the panel -->
		  	<div class="panel-body">      
		    	<img <?php echo 'src='.ParseUser::getCurrentUser()->get("profPic"); ?> class="img-circle" alt="Cinque Terre" width="250" height="250"> 

					<form action="profile.php" method="post" enctype="multipart/form-data">
					    <div class="col-md-offset-5">
					    	<input type="file" name="photo" id="photo">
					    </div>
					    <input type="submit" value="Upload Image" name="submit" class="btn btn-primary btn-sm">
					</form>

				<!-- buttons and wells for the profile info -->
				<div class="panel-body">
			    	<div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
			        	<div class="btn-group" role="group">
			            	<button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
			                <div class="hidden-xs">Biography</div>
			            	</button>
			        	</div>
			        	<div class="btn-group" role="group">
			            	<button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
			                	<div class="hidden-xs">Tournaments</div>
			            	</button>
			        	</div>
			        	<div class="btn-group" role="group">
			            	<button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
			                <div class="hidden-xs">Social Media</div>
			            	</button>
			        	</div>
			    	</div>
		    		<div class="well">
		      			<div class="tab-content">

		      				<!-- This is the tab for the biography -->
		        			<div class="tab-pane fade in active" id="tab1">
		          				<h4><?php echo ParseUser::getCurrentUser()->get("bio"); ?></h4>

							<!-- Start of modal for editing bio -->
								<div class="col-md-offset-11">
									<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#bioModal"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit</button>
								</div>
								<div id="bioModal" class="modal fade" role="dialog">
							  		<div class="modal-dialog">
							  			<form action="profile.php" method="post">
							    			<div class="modal-content">
							      				<div class="modal-header">
							        				<button type="button" class="close" data-dismiss="modal">&times;</button>
							        				<h4 class="modal-title">Edit Bio</h4>
							      				</div>
							      				<div class="modal-body">
		          									<textarea id="biography" rows="9" cols="70"></textarea>
							      				</div>
							      				<div class="modal-footer">
							        				<button id="bioSubmit" class="btn btn-info">Submit</button>
							      				</div>
							    			</div>
							    		</form>
							  		</div>
								</div>
		        			</div>
		        			<!-- end of modal for editing bio -->

			        		<div class="tab-pane fade in" id="tab2">
			          			<h3>No tournaments yet. Check them out <a href="index.php">here!</a></h3>
			        		</div>
			        		<div class="tab-pane fade in" id="tab3">
			        			<a class="btn btn-social btn-facebook" href="#">
		    						<span class="fa fa-facebook"></span> Facebook
		 						</a>
				          		<a class="btn btn-social btn-twitter" href="#">
		    						<span class="fa fa-twitter"></span> Twitter
		 						</a>
		 						<a class="btn btn-social btn-soundcloud">
		    						<span class="fa fa-soundcloud" href="#"></span> Soundcloud
		 						</a>
			        		</div>
		      			</div>
		    		</div>
		  		</div>
			</div> <!-- end of div for body of panel -->
		</div>
	</div>
	<div class="col-md-3 col-md-offset-1">
		<div class="panel panel-info" style="text-align:center;">

		<!-- heading for the panel -->
		 	<div class="panel-heading">
		    	<h3 class="panel-title">SoundCloud!</h3>
		  	</div>

		  	<!-- start of the body for the panel -->
		  	<div class="panel-body">
		  	
		  	<?php
		  		if(!$user->get("soundcloud_user_id")) {
		  			echo '<form class="form-inline" action="profile.php" method="POST">
							  <div class="form-group">
							    <label for="accountName">SoundCloud Name</label>
							    <input type="text" class="form-control" id="accountName" name="accountName" placeholder="OneWordInUrl">
							  </div>
							  <button type="submit" class="btn btn-success">Link</button>
							</form>';
		  		} else {
		  			echo '<form class="form-inline" action="profile.php" method="POST">
							  <button type="submit" class="btn btn-danger" name="unlink" value="yes">Unlink</button>
							</form>';
		  		}
		  	?>
		  	</div>
		</div>    
	</div> 
</div>	<!-- end of container for panel -->

<?php
	require_once "footer.php";//need to include these to complete the page without errors
?>