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
    <script src="/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
SC.initialize({
  client_id: 'Ygt8GZZd1lUpJBr450wjq7VPQzdHTRXE8'
});

</script>

<script src="jquery-3.2.1.min.js"></script>

   </head>

<body>
<!--title of the page-->
  <h1 style="text-align:center"> Monthy Contest ~ April <h1>
  <i><h4 style="padding-left:75px"> Round 1 <h4></h4></i>

            <!-- one instance of the widget -->
            <a name="wgt"></a>
            <iframe id="sc-widget"
                    src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/193109082&amp;auto_play=false&amp;hide_related=true&amp;show_comments=false&amp;show_user=true&amp;show_artwork=true&amp;show_reposts=false&amp;buying=false&amp;download=false"
                    width="100%" height="200" scrolling="no" frameborder="no"></iframe>


   <!--Start of brackets -->
<div class="container">
  <div class="row">
    <div class="col-md-6">
        <?php

          // array for band names
          $band = array("cloonyw21","deepgraysea","jackjohnsonmusic","kygo","cloonyw21","cloonyw21","cloonyw21","cloonyw21","cloonyw21","cloonyw21","cloonyw21","cloonyw21","cloonyw21","cloonyw21","cloonyw21","cloonyw21");

          // array for track names
          $track = array("Mystery","aurora", "posters", "intro", "Mystery","Mystery","Mystery","Mystery","Mystery","Mystery","Mystery","Mystery","Mystery","Mystery","Mystery","Mystery");

          $count = 0;

          // for loop that generates each matchup for the tournament
          for ($x = 0; $x < 8; $x++) {
              echo    '<table class="table-condensed" style="width:100%">
                          <tr>
                              <td class="col-md-5"><div class="input-group" style="min-width:50em">
                                  <div class="thumbnail" style="background-image: url(imgs/AprilBanner.png); background-size:cover">
                                      <div class="caption">
                                          <h5 style="padding-right:2em; color:#FFFFFF">'.$band[$count].'  ~ '.$track[$count].'</h5>
                                            <p>
                                                <a href="#wgt" onclick="return player.loadSCWidget(this);" data-band="'.$band[$count].'" data-track="'.$track[$count].'" class="btn btn-primary" role="button">Play</a>&emsp;&emsp;&emsp;&emsp;&emsp;

                                                <a href="#" class="btn btn-primary" id="'.$count.'" role="button">Vote ( )</a>
                                            </p>
                                      </div>
                                  </div>
                              </td>
                              <td class="col-md-2" rowspan="2" style="padding:0px; position:relative; min-width:50px;">
                                  <div style="border-top: 2px solid #090; border-right: 2px solid #090; width:80%; height:25%; float: left; position:absolute; top:25%;"></div>
                                  <div style="border-bottom: 2px solid #090; border-right: 2px solid #090; width:80%; height:25%; float: left; position:absolute; top:50%;"></div>
                                  <div style="border-top: 2px solid #090; width: 20%; margin-left: 80%; float: right; position:absolute;"></div>
                              </td>
                              <td class="col-md-5" rowspan="2" style="min-width:10em"><div class="input-group"><div class="form-control">Winner of Round 1</div></div></td>
                          </tr>';
              $count++;

              echo        '<tr>
                              <td class="col-md-5"><div class="input-group" style="min-width:50em">
                                  <div class="thumbnail" style="background-image: url(imgs/AprilBanner.png); background-size:cover">
                                      <div class="caption">
                                          <h5 style="padding-right:2em; color:#FFFFFF">'.$band[$count].'  ~ '.$track[$count].'</h5>
                                            <p>
                                                <a href="#wgt" onclick="return player.loadSCWidget(this);" data-band="'.$band[$count].'" data-track="'.$track[$count].'" class="btn btn-primary" role="button">Play</a>&emsp;&emsp;&emsp;&emsp;&emsp;

                                                <a href="#" class="btn btn-primary" id="'.$count.'" role="button">Vote ( )</a>
                                            </p>
                                      </div>
                                  </div>
                              </td>
                          </tr>
                      </table>';
              $count++;
          }
        ?>
    </div>
  </div>
</div>  

<!--End of brackets-->

 <script src="https://w.soundcloud.com/player/api.js" type="text/javascript"></script>
<script src="player.js" type="text/javascript"></script>
<script type="text/javascript">
  //First track loaded in
  player.scInitialize('mystery');
</script>               

</body>


<?php
  include "footer.php";
?>