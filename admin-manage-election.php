

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- icons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
          <a class="nav-link active" href="admin-manage-election.php">Manage Election</a>
          <a class="nav-link"  href="admin-manage-students.php">Manage Students</a>

          <a class="nav-link" href="admin-manage-voting-results.php">Manage Voting Results</a>
          <!-- <a class="nav-link" href="admin-manage-department.php">Manage Department</a> -->
        </div>
      </div>
      <div class="col-9">
        <div class="tab-content" id="v-pills-tabContent">
              <!-- Manage Election -->
              <?php include 'manage-election-tab.php'; ?>

          <!-- End manage Election -->
        </div>
          <!-- Manage student Page -->
          <div class="tab-pane fade" id="v-pills-manage-student" role="tabpanel" aria-labelledby="v-pills-manage-student-tab">

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Register A Student</button>
            <div class="row mt-3">
              <?php
                $courselistSql = "SELECT * FROM college_student";
                $courseListResult = $conn->query($courselistSql);
                if ($courseListResult->num_rows>0) {
                  # code...
                  while ($getCourseRow = $courseListResult->fetch_assoc()) {
                    ?>
                    <div class="row container-fluid">
                      <div class="col-12">
                          <?php echo $getCourseRow['fullname']; ?>

                      </div>

                    </div>



                     <?php
                    # code...

                  }
                }
              ?>
            </div>
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                  <div class="container mr-3 mt-3 mb-3 ml-3">
                    <div class="row">
                      <div class="col-12">
                        <h5>Register A student</h5>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-8">
                        <form class="" action="admin-dashboard.php" method="post">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Student Number</label>
                            <input type="text" name="student-number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Number">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Student Full Name</label>
                            <input type="text" name="full-name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Full Name">
                          </div>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-6">
                              <select required name="course" class="form-control form-control-sm mb-3">
                                <option></option>
                                <?php
                                  $courselistSql = "SELECT * FROM course";
                                  $courseListResult = $conn->query($courselistSql);
                                  if ($courseListResult->num_rows>0) {
                                    # code...
                                    while ($getCourseRow = $courseListResult->fetch_assoc()) {
                                      ?> <option value="<?php echo $getCourseRow['course_id']; ?>"> <?php echo $getCourseRow['course_name']; ?> </option><?php
                                      # code...
                                    }
                                  }
                                ?>
                              </select>
                            </div>
                            <div class="col-4">
                              <select required name="year_level" class="form-control form-control-sm mb-3">
                                <option></option>
                                <option value="1">1st Year</option>
                                <option value="2">2nd Year</option>
                                <option value="3">3rd Year</option>
                                <option value="4">4th Year</option>
                                <option value="5">5th Year</option>
                              </select>
                            </div>
                          </div>
                          </div>

                          <input class="btn btn-primary" type="submit" name="register-student" value="Submit">

                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <!-- End Manage Student Page -->


        </div>
      </div>
    </div>

  </div>
  <?php include 'modals.php'; ?>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->


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
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>
