

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- icons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style media="screen">
      body{
        margin: 0 auto;
      }
       .footer9{
        background-color: #292c2f;
        color: #fff;
        margin:-20px;
        padding-left: 40px;
        padding-right: 40px;
        padding-top: 40px;
        margin-top: 50vh;

      }
      #foot-head1{
        font-family: Allura,cursive;
      }
    </style>
  </head>


  <body>
  <?php include 'dbconnect.php';
        include 'department-management.php';
        include 'functions.php';
        $position_id;

  ?>
<?php include 'navbar.php'; ?>

  <div class="container-fluid">

    <br>
    <div class="row">
      <div class="col-2">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <a class="nav-link " href="admin-manage-election.php">Manage Election</a>
          <a class="nav-link"  href="admin-manage-students.php">Manage Students</a>

          <a class="nav-link active" href="admin-manage-voting-results.php">Manage Voting Results</a>
          <!-- <a class="nav-link" href="admin-manage-department.php">Manage Department</a> -->
        </div>
      </div>
      <div class="col-9">
        <div class="tab-content" id="v-pills-tabContent">
              <!-- Manage Election -->
              <?php include 'manage-voting-results-tab.php'; ?>


          <!-- End manage Election -->
        </div>
          <!-- Manage student Page -->

          <!-- End Manage Student Page -->


        </div>
      </div>
    </div>

  </div>
 <footer class="footer9">
        <div class="row" id="row1">
            <div class="col-md-3 col-md-offset-0 col-sm-6 footer-navigation" id="col1">
                <h3 id="foot-head1"> St. Anthony's College</h3>
                <p class="company-name">Copyright © 2017 </p>
            </div>
            <div class="col-md-3 footer-contacts">
                <div id="sec1"><i class="fa fa-phone footer-contacts-icon"></i>
                    <p id="par2" class="ficon ion-ios-telephone-outline"> (036) 540-9238</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 footer-contacts">
                <div id="sec3"><i class=""></i>
                    <p id="par3" class="icon ion-ios-telephone-outline"> (036) 540-9971; 540-9196 </p>
                </div>
            </div>
            <div class="col-md-3 footer-contacts">
                <div id="sec2"><span class=""> </span>
                    <p id="par1"><span class="new-line-span ion-ios-location"> San Jose de Buenavista</span> Antique, Philippines</p>
                </div>
            </div>
            <div class="clearfix visible-sm-block"></div>
        </div>
    </footer>
</body>
</html>
