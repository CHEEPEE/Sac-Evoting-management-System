<div class="tab-pane fade  show active" id="v-pills-year-course" role="tabpanel" aria-labelledby="v-pills-year-course-tab">
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
