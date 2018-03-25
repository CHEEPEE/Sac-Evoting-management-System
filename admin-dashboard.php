

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
        if (isset($_REQUEST['eid'])) {
          $eid = $_REQUEST['eid'];
          # code...
          header("location:admin-manage-election.php?eid=$eid");
        }

  ?>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <!-- Navbar content -->
    <a class="navbar-brand" href="#">E-Voting</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <!-- <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home Page <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Profile</a>
        </li> -->
      </ul>
    </div>
  </nav>
  <div class="container-fluid">

    <br>
    <div class="row">
      <div class="col-2">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <a class="nav-link active" id="v-pills-home-tab" href="admin-manage-election.php" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Manage Election</a>
          <a class="nav-link" id="v-pills-manage-student-tab"  href="admin-manage-students.php" data-toggle="pill" href="#v-pills-manage-student" role="tab" aria-controls="v-pills-manage-student" aria-selected="false">Manage Students</a>

          <a class="nav-link" id="v-pills-settings-tab"  href="admin-manage-voting-results.php" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Manage Voting Results</a>
          <a class="nav-link" id="v-pills-year-course-tab"  href="admin-manage-department.php" data-toggle="pill" href="#v-pills-year-course" role="tab" aria-controls="v-pills-year-course" aria-selected="false">Manage Department</a>
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
          <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">

          </div>
          <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
          <div class="tab-pane fade" id="v-pills-year-course" role="tabpanel" aria-labelledby="v-pills-year-course-tab">
            <div class="container">
              &nbsp;Year Course
              <div class="row ml-1 mb-3 mt-3">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".add-department">Add Department</button>
              </div>
              <div class="row">
                <div class="col-10">
                  <!-- deparment List Accordion -->
                  <?php
                  $getDepartmentSql = "SELECT * FROM department";
                  $getDepartmentSqlresult = $conn->query($getDepartmentSql);

                  if ($getDepartmentSqlresult->num_rows > 0) {
                      // output data of each row
                      while($row = $getDepartmentSqlresult->fetch_assoc()) {

                   ?>
                  <div id="accordion">
                    <div class="card">
                      <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                          <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne<?php echo $row['department_id'];?>" aria-expanded="false" aria-controls="collapseOne<?php echo $row['department_id'];?>">
                          <?php echo $row['department_name']; ?>
                          </button>
                        </h5>
                      </div>

                      <div id="collapseOne<?php echo $row['department_id'];?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                          <button type="button" class="btn btn-primary mt-1 mb-1" data-toggle="modal" data-target=".add-course<?php echo $row['department_id'];?>">Add Course</button>
                          <div class="modal fade add-course<?php echo $row['department_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md modal-dialog-centered">
                              <div class="modal-content">
                                <div class="container mr-3 mt-3 mb-3 ml-3">
                                  <div class="row">
                                    <div class="col-11">
                                      <form class="" action="admin-dashboard.php?depid=<?php echo $row['department_id'];?>" method="post">
                                        <div class="form-group">
                                          <label for="exampleInputEmail1">Course Name</label>
                                          <input type="text" name="course-name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Number">
                                        </div>
                                        <input class="btn btn-primary" type="submit" name="insert-course" value="Submit">
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <ul class="list-group list-group-flush">






                          <?php
                            $courselistSql = "SELECT * FROM course WHERE department_id = '".$row['department_id']."'";
                            $courseListResult = $conn->query($courselistSql);
                            if ($courseListResult->num_rows>0) {
                              # code...
                              while ($getCourseRow = $courseListResult->fetch_assoc()) {
                                ?> <li class="list-group-item"><?php echo $getCourseRow['course_name']; ?></li> <?php
                                # code...
                              }
                            }
                          ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
                    }
                  } else {
                      echo "0 results";
                  }

                  ?>
                  <!-- End Department-list Accordion -->
                </div>
              </div>
              <div class="modal fade add-department" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-centered">
                  <div class="modal-content">
                    <div class="container mr-3 mt-3 mb-3 ml-3">
                      <div class="row">
                        <div class="col-11">
                          <form class="" action="admin-dashboard.php?" method="post">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Department Name</label>
                              <input type="text" name="department-name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Number">
                            </div>
                            <input class="btn btn-primary" type="submit" name="add-department" value="Submit">
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal fade add-course" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-centered">
                  <div class="modal-content">
                    <div class="container mr-3 mt-3 mb-3 ml-3">
                      <div class="row">
                        <div class="col-11">
                          <form class="" action="admin-dashboard.php" method="post">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Course Name</label>
                              <input type="text" name="course-name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Number">
                            </div>
                            <input class="btn btn-primary" type="submit" name="insert-course" value="Submit">
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>
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
