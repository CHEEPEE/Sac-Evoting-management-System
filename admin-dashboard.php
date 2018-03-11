

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
  ?>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <!-- Navbar content -->
    <a class="navbar-brand" href="#">E-Voting</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home Page <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Profile</a>
        </li>
      </ul>

    </div>
  </nav>
  <div class="container-fluid">

    <br>
    <div class="row">
      <div class="col-2">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Manage Election</a>
          <a class="nav-link" id="v-pills-manage-student-tab" data-toggle="pill" href="#v-pills-manage-student" role="tab" aria-controls="v-pills-manage-student" aria-selected="false">Manage Students</a>
          <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Electoral Position</a>
          <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Manage Voting Results</a>
          <a class="nav-link" id="v-pills-year-course-tab" data-toggle="pill" href="#v-pills-year-course" role="tab" aria-controls="v-pills-year-course" aria-selected="false">Manage Year & Course</a>
        </div>


      </div>


      <div class="col-4 mr-3">
        <div class="tab-content" id="v-pills-tabContent">
              <!-- Manage Election -->
          <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

            <div class="container">
              <div class="row">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bd-add-election-modal-lg">Add Election</button>
              </div>
            </div>


            <div class="container mt-3">
              <div class="row">
                <?php
                $evotingsql = "SELECT * FROM election ORDER BY id DESC";
                $result = $conn->query($evotingsql);

                 if ($result->num_rows > 0) {
                     // output data of each row
                     while($row = $result->fetch_assoc()) {
                         echo "<div class='list-group-item list-group-item-action'><div class='row'><div class='col-10'> ". $row["election_name"]. " " . $row["date_start"]. " " . $row["date_end"]. "</div><div class='col-2'><a href = 'admin-dashboard.php?eid=".$row['id']."' ><i class='icon ion-gear-a'></i></a><a href = 'delete-evoting.php?electionid=".$row['id']."' ><i class='ml-3 icon ion-close-circled'></i></a></div></div></div>";
                         $election_id = $row['id'];
                         ?>


                         <?php
                     }
                 } else {
                     echo "0 results";
                 }
                ?>
              </div>
            </div>
          </div>
          <!-- End manage Election -->

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
                    ?> <?php echo $getCourseRow['fullname']; ?> <?php
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
      <div class="col-5">
        <div class="row mb-3">
          <div class="col-3">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add Position</button>
          </div>
          <div class="col-3">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add Party-List</button>
          </div>
        </div>
        <div class="row">
           <?php

           if (isset($_REQUEST['eid'])) {
             # code...
             $election_id = $_REQUEST['eid'];

            $getPostions_sql = "SELECT * FROM election_positions WHERE election_id = $election_id";
            $getPositionRequest = $conn->query($getPostions_sql);

            if ($getPositionRequest->num_rows > 0) {
                // output data of each row
                while($row = $getPositionRequest->fetch_assoc()) {
                   $position_id = $row['id'];
                    ?>
                    <div id="accordion">
                      <div class="card">
                        <div class="card-header" id="headingOne">
                          <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $position_id;?>" aria-expanded="true" aria-controls="collapseOne">
                             <?php echo "" . $row["position_name"]."";
                                 ?>
                            </button>
                          </h5>
                        </div>


                        <div id="collapse<?php echo $position_id;?>" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                          <?php   echo "<a href='edit-position-name.php?posid=".$row['id']."'> <i class='large material-icons'>edit</i>Edit Postition Name<br></a> ";
                                   echo "<a href='delete-postion.php?posid=".$row['id']."'> <i class='large material-icons'>delete</i>Delete Name<br></a> ";
                           ?>
                          <div class="card-body">
                            <form class="" action="add-candidates.php?electionid=<?php echo $election_id;?>&posid=<?php echo $position_id; ?>" method="post" enctype="multipart/form-data">
                              <div class="form-2">
                                    <label for="candidate_name">Candidate Name</label>
                                    <input type="text" required name="candidate_name" class="form-control" id="position_name" aria-describedby="emailHelp" placeholder="Name">
                                    <label for="candidate_cource">Course</label>
                                    <input type="text" required name="candidate_cource" class="form-control" id="position_name" aria-describedby="emailHelp" placeholder="Course">
                                    <label for="candidate_des">Description</label>
                                    <input type="text" required name="candidate_des" class="form-control" id="position_name" aria-describedby="emailHelp" placeholder="Candidate Description">
                                     <label for="fileToUpload">upload picture</label>
                                      <input type="file" name="fileToUpload" id="fileToUpload">
                                    <select name="partylist">
                                     <?php
                                      $party_list_sql = "SELECT * FROM party_list WHERE election_id=$election_id";
                                      $partylist_result = $conn->query($party_list_sql);
                                      if ($partylist_result->num_rows>0) {
                                        # code...
                                        while ($rowpartylist = $partylist_result->fetch_assoc()) {
                                          $partylistid= $rowpartylist['party_list_id'];
                                          $partylistvalue = $rowpartylist['party_list_name'];
                                          # code...
                                         echo "<option value ='$partylistid'>$partylistvalue</option>";
                                        }
                                      }else {
                                         echo "0 results";
                                      }
                                      ?>

                                    </select>


                              </div>
                              <input type="submit" class="btn btn-default" value="Add Candidate">
                            </form>
                          </div>
                       </div>
                      </div>


                    <?php
                    $getCandidatessql = "SELECT * FROM candidates WHERE election_id=$election_id AND position_id = $position_id";
                    $getCandidateResult =$conn->query($getCandidatessql);
                    if ($getCandidateResult->num_rows>0) {

                      while ($rowcandidate = $getCandidateResult->fetch_assoc()) {
                        $candid = $rowcandidate['candidate_id'];
                        $img = $rowcandidate['img_location'];
                         # code...
                        echo "<image src = '$img' width='100px' height = '100px'>";
                        echo $rowcandidate['candidate_name']." <a href = 'edit-candidate-name.php?candid=$candid'>Edit</a> <a href = 'delete-candidate.php?candid=$candid'>Delete</a><br>";
                      }
                      # code...
                    }

                }

            } else {
              echo "0 results";
            }

            $party_list_sql = "SELECT * FROM party_list WHERE election_id=$election_id";
            $partylist_result = $conn->query($party_list_sql);
            if ($partylist_result->num_rows>0) {
              # code...
              while ($row = $partylist_result->fetch_assoc()) {
                # code...
                $partid = $row['party_list_id'];
                echo $row['party_list_name']."<a href = 'edit-party-list.php?partid=$partid'>Edit</a> <a href = 'delete-party-list.php?partid=$partid'>delete</a><br>";
              }
            }else {
               echo "0 results";
            }

         }
         // end isset
            ?>


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
