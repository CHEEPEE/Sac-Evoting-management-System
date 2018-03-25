<div class="tab-pane fade show active" id="v-pills-manage-student" role="tabpanel" aria-labelledby="v-pills-manage-student-tab">

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
              <form class="" action="admin-manage-students.php" method="post">
                <div class="form-group">
                  <label for="exampleInputEmail1">Student Number</label>
                  <input type="text" name="student-number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Number">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Student Full Name</label>
                  <input type="text" name="full-name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Full Name">
                </div>
                <div class="form-group">
                <!-- <div class="row">
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
                </div> -->
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
