

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
          <a class="nav-link active"  href="admin-manage-students.php">Manage Students</a>

          <a class="nav-link" href="admin-manage-voting-results.php">Manage Voting Results</a>
          <!-- <a class="nav-link " href="admin-manage-department.php">Manage Department</a> -->
        </div>
      </div>
      <div class="col-9">
        <div class="tab-content" id="v-pills-tabContent">
              <!-- Manage Election -->
              <?php include 'manage-students-tab.php'; ?>


          <!-- End manage Election -->
        </div>
          <!-- Manage student Page -->

          <!-- End Manage Student Page -->


        </div>
      </div>
    </div>

  </div>
  <?php include 'modals.php'; ?>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>
