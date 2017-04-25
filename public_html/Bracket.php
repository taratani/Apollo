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
	<head>
		<title>Apollo</title>
		<link rel="stylesheet" href="styles/main.css">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src="https://connect.soundcloud.com/sdk/sdk-3.1.2.js"></script>
<script>
SC.initialize({
  client_id: 'Ygt8GZZd1lUpJBr450wjq7VPQzdHTRXE8'
});

</script>

	</head>
	<body>

  <h1 style="text-align:center"> Monthy Contest ~ April <h1>
  <i><h4 style="padding-left:75px"> Round 1 <h4></i>

      <div class="container">
  <div class="row">
    <div class="col-md-15">
        <table class="table-condensed" style="width:100%">
          <tr>

            <td class="col-md-5"><div class="input-group">
            
            <div class="thumbnail">
      <a name="wgt"></a> <!-- widget scroll target for mobiles -->
      <iframe id="sc-widget"
        src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/193109085"
             &amp;auto_play=false&hide_related=true&show_comments=false
             &show_user=true&show_artwork=true&show_reposts=false&buying=false
             &download=false"
        width="100%" height="166" scrolling="no" frameborder="no"></iframe>
      <div class="caption">
        <h3 style="padding-right:9em;">Johnny Beat Good ~ Alien</h3>
        <p><a href="#" class="btn btn-primary" role="button">Vote</a></p>
      </div>
    </div>
            </td>
            <td class="col-md-2" rowspan="2" style="padding:0px; position:relative; min-width:50px;">
              <div style="border-top: 2px solid #090; border-right: 2px solid #090; width:80%; height:25%; float: left; position:absolute; top:25%;"></div>
              <div style="border-bottom: 2px solid #090; border-right: 2px solid #090; width:80%; height:25%; float: left; position:absolute; top:50%;"></div>
              <div style="border-top: 2px solid #090; width: 20%; margin-left: 80%; float: right; position:absolute;"></div>
            </td>
            <td class="col-md-5" rowspan="2"><div class="input-group"><div class="form-control">Check back next week to vote on Round 2!</div></div></td>
          </tr>
          <tr>
            <td class="col-md-5"><div class="input-group">
    <div class="thumbnail">
      <a name="wgt"></a> 
      <iframe id="sc-widget"
        src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/193109085"
             &amp;auto_play=false&hide_related=true&show_comments=false
             &show_user=true&show_artwork=true&show_reposts=false&buying=false
             &download=false"
        width="100%" height="166" scrolling="no" frameborder="no"></iframe>
      <div class="caption">
        <h3 style="padding-right:9em;">Johnny Beat Good ~ Alien</h3>
        <p><a href="#" class="btn btn-primary" role="button">Vote</a></p>
      </div>
    </div>
    </td>
          </tr>
        </table>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-15">
        <table class="table-condensed" style="width:100%">
          <tr>

            <td class="col-md-5"><div class="input-group">
            <div class="thumbnail">
      <a name="wgt"></a> <!-- widget scroll target for mobiles -->
      <iframe id="sc-widget"
        src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/193109085"
             &amp;auto_play=false&hide_related=true&show_comments=false
             &show_user=true&show_artwork=true&show_reposts=false&buying=false
             &download=false"
        width="100%" height="166" scrolling="no" frameborder="no"></iframe>
      <div class="caption">
        <h3 style="padding-right:9em;">Johnny Beat Good ~ Alien</h3>
        <p><a href="#" class="btn btn-primary" role="button">Vote</a></p>
      </div>
    </div>
            </td>
            <td class="col-md-2" rowspan="2" style="padding:0px; position:relative; min-width:50px;">
              <div style="border-top: 2px solid #090; border-right: 2px solid #090; width:80%; height:25%; float: left; position:absolute; top:25%;"></div>
              <div style="border-bottom: 2px solid #090; border-right: 2px solid #090; width:80%; height:25%; float: left; position:absolute; top:50%;"></div>
              <div style="border-top: 2px solid #090; width: 20%; margin-left: 80%; float: right; position:absolute;"></div>
            </td>
            <td class="col-md-5" rowspan="2"><div class="input-group"><div class="form-control">Check back next week to vote on Round 2!</div></div></td>
          </tr>
          <tr>
            <td class="col-md-5"><div class="input-group">
    <div class="thumbnail">
      <a name="wgt"></a> <!-- widget scroll target for mobiles -->
      <iframe id="sc-widget"
        src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/193109085"
             &amp;auto_play=false&hide_related=true&show_comments=false
             &show_user=true&show_artwork=true&show_reposts=false&buying=false
             &download=false"
        width="100%" height="166" scrolling="no" frameborder="no"></iframe>
      <div class="caption">
        <h3 style="padding-right:9em;">Johnny Beat Good ~ Alien</h3>
        <p><a href="#" class="btn btn-primary" role="button">Vote</a></p>
      </div>
    </div>
    </td>
          </tr>
        </table>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-15">
        <table class="table-condensed" style="width:100%">
          <tr>

            <td class="col-md-5"><div class="input-group">
            <div class="thumbnail">
      <a name="wgt"></a> 
      <iframe id="sc-widget"
        src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/193109085"
             &amp;auto_play=false&hide_related=true&show_comments=false
             &show_user=true&show_artwork=true&show_reposts=false&buying=false
             &download=false"
        width="100%" height="166" scrolling="no" frameborder="no"></iframe>
      <div class="caption">
        <h3 style="padding-right:9em;">Johnny Beat Good ~ Alien</h3>
        <p><a href="#" class="btn btn-primary" role="button">Vote</a></p>
      </div>
    </div>
            </td>
            <td class="col-md-2" rowspan="2" style="padding:0px; position:relative; min-width:50px;">
              <div style="border-top: 2px solid #090; border-right: 2px solid #090; width:80%; height:25%; float: left; position:absolute; top:25%;"></div>
              <div style="border-bottom: 2px solid #090; border-right: 2px solid #090; width:80%; height:25%; float: left; position:absolute; top:50%;"></div>
              <div style="border-top: 2px solid #090; width: 20%; margin-left: 80%; float: right; position:absolute;"></div>
            </td>
            <td class="col-md-5" rowspan="2"><div class="input-group"><div class="form-control">Check back next week to vote on Round 2!</div></div></td>
          </tr>
          <tr>
            <td class="col-md-5"><div class="input-group">
    <div class="thumbnail">
      <a name="wgt"></a> <!-- widget scroll target for mobiles -->
      <iframe id="sc-widget"
        src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/193109085"
             &amp;auto_play=false&hide_related=true&show_comments=false
             &show_user=true&show_artwork=true&show_reposts=false&buying=false
             &download=false"
        width="100%" height="166" scrolling="no" frameborder="no"></iframe>
      <div class="caption">
        <h3 style="padding-right:9em;">Johnny Beat Good ~ Alien</h3>
        <p><a href="#" class="btn btn-primary" role="button">Vote</a></p>
      </div>
    </div>
    </td>
          </tr>
        </table>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-15">
        <table class="table-condensed" style="width:100%">
          <tr>

            <td class="col-md-5"><div class="input-group">
            <div class="thumbnail">
      <a name="wgt"></a> <!-- widget scroll target for mobiles -->
      <iframe id="sc-widget"
        src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/193109085"
             &amp;auto_play=false&hide_related=true&show_comments=false
             &show_user=true&show_artwork=true&show_reposts=false&buying=false
             &download=false"
        width="100%" height="166" scrolling="no" frameborder="no"></iframe>
      <div class="caption">
        <h3 style="padding-right:9em;">Johnny Beat Good ~ Alien</h3>
        <p><a href="#" class="btn btn-primary" role="button">Vote</a></p>
      </div>
    </div>
            </td>
            <td class="col-md-2" rowspan="2" style="padding:0px; position:relative; min-width:50px;">
              <div style="border-top: 2px solid #090; border-right: 2px solid #090; width:80%; height:25%; float: left; position:absolute; top:25%;"></div>
              <div style="border-bottom: 2px solid #090; border-right: 2px solid #090; width:80%; height:25%; float: left; position:absolute; top:50%;"></div>
              <div style="border-top: 2px solid #090; width: 20%; margin-left: 80%; float: right; position:absolute;"></div>
            </td>
            <td class="col-md-5" rowspan="2"><div class="input-group"><div class="form-control">Check back next week to vote on Round 2!</div></div></td>
          </tr>
          <tr>
            <td class="col-md-5"><div class="input-group">
    <div class="thumbnail">
      <a name="wgt"></a> <!-- widget scroll target for mobiles -->
      <iframe id="sc-widget"
        src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/193109085"
             &amp;auto_play=false&hide_related=true&show_comments=false
             &show_user=true&show_artwork=true&show_reposts=false&buying=false
             &download=false"
        width="100%" height="166" scrolling="no" frameborder="no"></iframe>
      <div class="caption">
        <h3 style="padding-right:9em;">Johnny Beat Good ~ Alien</h3>
        <p><a href="#" class="btn btn-primary" role="button">Vote</a></p>
      </div>
    </div>
    </td>
          </tr>
        </table>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-15">
        <table class="table-condensed" style="width:100%">
          <tr>

            <td class="col-md-5"><div class="input-group">
            <div class="thumbnail">
      <a name="wgt"></a>
      <iframe id="sc-widget"
        src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/193109085"
             &amp;auto_play=false&hide_related=true&show_comments=false
             &show_user=true&show_artwork=true&show_reposts=false&buying=false
             &download=false"
        width="100%" height="166" scrolling="no" frameborder="no"></iframe>
      <div class="caption">
        <h3 style="padding-right:9em;">Johnny Beat Good ~ Alien</h3>
        <p><a href="#" class="btn btn-primary" role="button">Vote</a></p>
      </div>
    </div>
            </td>
            <td class="col-md-2" rowspan="2" style="padding:0px; position:relative; min-width:50px;">
              <div style="border-top: 2px solid #090; border-right: 2px solid #090; width:80%; height:25%; float: left; position:absolute; top:25%;"></div>
              <div style="border-bottom: 2px solid #090; border-right: 2px solid #090; width:80%; height:25%; float: left; position:absolute; top:50%;"></div>
              <div style="border-top: 2px solid #090; width: 20%; margin-left: 80%; float: right; position:absolute;"></div>
            </td>
            <td class="col-md-5" rowspan="2"><div class="input-group"><div class="form-control">Check back next week to vote on Round 2!</div></div></td>
          </tr>
          <tr>
            <td class="col-md-5"><div class="input-group">
    <div class="thumbnail">
      <a name="wgt"></a>
      <iframe id="sc-widget"
        src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/193109085"
             &amp;auto_play=false&hide_related=true&show_comments=false
             &show_user=true&show_artwork=true&show_reposts=false&buying=false
             &download=false"
        width="100%" height="166" scrolling="no" frameborder="no"></iframe>
      <div class="caption">
        <h3 style="padding-right:9em;">Johnny Beat Good ~ Alien</h3>
        <p><a href="#" class="btn btn-primary" role="button">Vote</a></p>
      </div>
    </div>
    </td>
          </tr>
        </table>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-15">
        <table class="table-condensed" style="width:100%">
          <tr>

            <td class="col-md-5"><div class="input-group">
            <div class="thumbnail">
      <a name="wgt"></a>
      <iframe id="sc-widget"
        src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/193109085"
             &amp;auto_play=false&hide_related=true&show_comments=false
             &show_user=true&show_artwork=true&show_reposts=false&buying=false
             &download=false"
        width="100%" height="166" scrolling="no" frameborder="no"></iframe>
      <div class="caption">
        <h3 style="padding-right:9em;">Johnny Beat Good ~ Alien</h3>
        <p><a href="#" class="btn btn-primary" role="button">Vote</a></p>
      </div>
    </div>
            </td>
            <td class="col-md-2" rowspan="2" style="padding:0px; position:relative; min-width:50px;">
              <div style="border-top: 2px solid #090; border-right: 2px solid #090; width:80%; height:25%; float: left; position:absolute; top:25%;"></div>
              <div style="border-bottom: 2px solid #090; border-right: 2px solid #090; width:80%; height:25%; float: left; position:absolute; top:50%;"></div>
              <div style="border-top: 2px solid #090; width: 20%; margin-left: 80%; float: right; position:absolute;"></div>
            </td>
            <td class="col-md-5" rowspan="2"><div class="input-group"><div class="form-control">Check back next week to vote on Round 2!</div></div></td>
          </tr>
          <tr>
            <td class="col-md-5"><div class="input-group">
    <div class="thumbnail">
      <a name="wgt"></a> <!-- widget scroll target for mobiles -->
      <iframe id="sc-widget"
        src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/193109085"
             &amp;auto_play=false&hide_related=true&show_comments=false
             &show_user=true&show_artwork=true&show_reposts=false&buying=false
             &download=false"
        width="100%" height="166" scrolling="no" frameborder="no"></iframe>
      <div class="caption">
        <h3 style="padding-right:9em;">Johnny Beat Good ~ Alien</h3>
        <p><a href="#" class="btn btn-primary" role="button">Vote</a></p>
      </div>
    </div>
    </td>
          </tr>
        </table>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-15">
        <table class="table-condensed" style="width:100%">
          <tr>

            <td class="col-md-5"><div class="input-group">
            <div class="thumbnail">
      <a name="wgt"></a>
      <iframe id="sc-widget"
        src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/193109085"
             &amp;auto_play=false&hide_related=true&show_comments=false
             &show_user=true&show_artwork=true&show_reposts=false&buying=false
             &download=false"
        width="100%" height="166" scrolling="no" frameborder="no"></iframe>
      <div class="caption">
        <h3 style="padding-right:9em;">Johnny Beat Good ~ Alien</h3>
        <p><a href="#" class="btn btn-primary" role="button">Vote</a></p>
      </div>
    </div>
            </td>
            <td class="col-md-2" rowspan="2" style="padding:0px; position:relative; min-width:50px;">
              <div style="border-top: 2px solid #090; border-right: 2px solid #090; width:80%; height:25%; float: left; position:absolute; top:25%;"></div>
              <div style="border-bottom: 2px solid #090; border-right: 2px solid #090; width:80%; height:25%; float: left; position:absolute; top:50%;"></div>
              <div style="border-top: 2px solid #090; width: 20%; margin-left: 80%; float: right; position:absolute;"></div>
            </td>
            <td class="col-md-5" rowspan="2"><div class="input-group"><div class="form-control">Check back next week to vote on Round 2!</div></div></td>
          </tr>
          <tr>
            <td class="col-md-5"><div class="input-group">
    <div class="thumbnail">
      <a name="wgt"></a> <!-- widget scroll target for mobiles -->
      <iframe id="sc-widget"
        src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/193109085"
             &amp;auto_play=false&hide_related=true&show_comments=false
             &show_user=true&show_artwork=true&show_reposts=false&buying=false
             &download=false"
        width="100%" height="166" scrolling="no" frameborder="no"></iframe>
      <div class="caption">
        <h3 style="padding-right:9em;">Johnny Beat Good ~ Alien</h3>
        <p><a href="#" class="btn btn-primary" role="button">Vote</a></p>
      </div>
    </div>
    </td>
          </tr>
        </table>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-15">
        <table class="table-condensed" style="width:100%">
          <tr>

            <td class="col-md-5"><div class="input-group">
            <div class="thumbnail">
      <a name="wgt"></a>
      <iframe id="sc-widget"
        src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/193109085"
             &amp;auto_play=false&hide_related=true&show_comments=false
             &show_user=true&show_artwork=true&show_reposts=false&buying=false
             &download=false"
        width="100%" height="166" scrolling="no" frameborder="no"></iframe>
      <div class="caption">
        <h3 style="padding-right:9em;">Johnny Beat Good ~ Alien</h3>
        <p><a href="#" class="btn btn-primary" role="button">Vote</a></p>
      </div>
    </div>
            </td>
            <td class="col-md-2" rowspan="2" style="padding:0px; position:relative; min-width:50px;">
              <div style="border-top: 2px solid #090; border-right: 2px solid #090; width:80%; height:25%; float: left; position:absolute; top:25%;"></div>
              <div style="border-bottom: 2px solid #090; border-right: 2px solid #090; width:80%; height:25%; float: left; position:absolute; top:50%;"></div>
              <div style="border-top: 2px solid #090; width: 20%; margin-left: 80%; float: right; position:absolute;"></div>
            </td>
            <td class="col-md-5" rowspan="2"><div class="input-group"><div class="form-control">Check back next week to vote on Round 2!</div></div></td>
          </tr>
          <tr>
            <td class="col-md-5"><div class="input-group">
    <div class="thumbnail">
      <a name="wgt"></a> 
      <iframe id="sc-widget"
        src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/193109085"
             &amp;auto_play=false&hide_related=true&show_comments=false
             &show_user=true&show_artwork=true&show_reposts=false&buying=false
             &download=false"
        width="100%" height="166" scrolling="no" frameborder="no"></iframe>
      <div class="caption">
        <h3 style="padding-right:7em;">Johnny Beat Good ~ Alien</h3>
        <p><a href="#" class="btn btn-primary" role="button">Vote</a></p>
      </div>
    </div>
    </td>
          </tr>
        </table>
    </div>
  </div>
</div>



	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <!--<script src="https://connect.soundcloud.com/sdk/sdk-3.1.2.js"></script>-->
	</body>
<?php
  include "footer.php";
?>