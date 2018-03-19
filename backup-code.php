back up Code

<!-- <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
  <div class="row">
    <div class="col-6">
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
                 $election_id = $row['id'];
                 echo getAccessCodeFromElectionId($election_id);
                   echo "<div class='list-group-item list-group-item-action'>
                           <div class='row'><div class='col-9'> "
                           . $row["election_name"]. " " . $row["date_start"]. " " . $row["date_end"]. "
                           </div>
                         <div class='col-3'>
                           <a href = 'admin-dashboard.php?eid=".$row['id']."' >
                            <i class='icon ion-gear-a'>
                            </i>
                          </a>
                          <a href =
                           'delete-evoting.php?electionid=".$row['id']."' >
                           <i class='ml-3 icon ion-close-circled'>
                           </i>
                           </a>
                        </div>
                        </div>
                        </div>";

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
    <!-- Manage Election -->
    <div class="col-6">
      <div class="col-11">

           <?php
           if (isset($_REQUEST['eid'])) {
             ?>

             <div class="row mb-3">
               <div class="col-3">
                   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bd-add-position-modal-lg">Add Position</button>
               </div>
               <div class="col-3">
                   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bd-add-party-list-modal-lg">Add Party-List</button>
               </div>

             </div>
             <div id="accordion" class="mb-3">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                      <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"  aria-controls="collapseOne">
                    Manage Party List
                      </button>
                    </h5>
                  </div>

                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">

                      <?php
                     $election_id = $_REQUEST['eid'];
                      $party_list_sql = "SELECT * FROM party_list WHERE election_id=$election_id";
                      $partylist_result = $conn->query($party_list_sql);
                      if ($partylist_result->num_rows>0) {
                        # code...
                        while ($row = $partylist_result->fetch_assoc()) {
                          # code...
                          $partid = $row['party_list_id'];

                          echo $row['party_list_name']." <a href = 'edit-party-list.php?partid=$partid'>Edit</a> <a href = 'delete-party-list.php?partid=$partid'>delete</a><br>";
                        }
                      }else {
                         echo "0 results";
                      }

                       ?>
                    </div>
                  </div>
                </div>
              </div>

             <?php
             # code...
             $election_id = $_REQUEST['eid'];

            $getPostions_sql = "SELECT * FROM election_positions WHERE election_id = $election_id";
            $getPositionRequest = $conn->query($getPostions_sql);

            if ($getPositionRequest->num_rows > 0) {
                // output data of each row
                while($row = $getPositionRequest->fetch_assoc()) {
                   $position_id = $row['id'];

                    // echo " <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#bd-add-party-list-modal-lg'></button>";
                    ?>
                    <div class="row">
                      <div class="row container-fluid">
                        <div class="col-12">
                          <p>
                            <button class="btn" type="button" data-toggle="collapse" data-target="#collapse<?php echo $position_id?>" aria-expanded="false" aria-controls="collapseExample">
                              <?php echo "" . $row["position_name"]."";  ?>
                            </button>
                          </p>
                        </div>

                        <div class="col-12">
                          <div class="collapse" id="collapse<?php echo $position_id?>">
                            <div class="card card-body">
                              <div class="col-12">
                                  <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#bd-add-candidate-modal-lg<?php echo $position_id?>">Add Candidate</button>
                              </div>
                              <?php   echo "<a class = 'ml-1' href='edit-position-name.php?posid=".$row['id']."'> <i class='large material-icons'>edit</i>Edit Postition Name<br></a> ";
                                       echo "<a class = 'ml-1' href='delete-postion.php?posid=".$row['id']."'> <i class='large material-icons'>delete</i>Delete Name<br></a> ";
                               ?>

                              <div class="modal fade" id="bd-add-candidate-modal-lg<?php echo $position_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Add Election</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form action="admin-dashboard.php?eid=<?php echo $election_id;?>&posid=<?php echo $position_id;?>" method="post" enctype="multipart/form-data">
                                        <div class="form-2">
                                              <label for="candidate_name"> First Name</label>
                                              <input type="text" required name="fname" class="form-control" id="position_name" aria-describedby="emailHelp" placeholder="First Name">

                                              <label for="candidate_name"> Middle Name</label>
                                              <input type="text" required name="mname" class="form-control" id="position_name" aria-describedby="emailHelp" placeholder="Middle Name">

                                              <label for="candidate_name"> LastName</label>
                                              <input type="text" required name="lname" class="form-control" id="position_name" aria-describedby="emailHelp" placeholder="Last Name">

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
                                      <div class="modal-footer">
                                            <button class="btn btn-default btn-sm" name="add-candidate" type="submit">Save</button>
                                      </div>
                                    </form>
                                  </div>
                              </div>
                            </div>
                          </div>
                         </div>
                       </div>
                      </div>
                    </div>

                    <?php
                    $getCandidatessql = "SELECT * FROM candidates WHERE election_id=$election_id AND position_id = $position_id";
                    $getCandidateResult =$conn->query($getCandidatessql);
                        if ($getCandidateResult->num_rows>0)
                         {
                          while ($rowcandidate = $getCandidateResult->fetch_assoc()) {
                            $candid = $rowcandidate['candidate_id'];
                            $img = $rowcandidate['img_location'];

                             # code...
                            echo "<div class='row container-fluid ml-1'>";
                            echo "<div class = 'col-12'><image src = '$img' width='100px' height = '100px'>";
                            echo $rowcandidate['candidate_fname']." ".$rowcandidate['candidate_mname']." ".$rowcandidate['candidate_lname']." "." <a href = 'edit-candidate-name.php?candid=$candid'>Edit</a> <a href = 'delete-candidate.php?candid=$candid'>Delete</a><br></div>";

                          }
                          # code...
                        }

                      }
                      echo "</div></div>";
                    } else {

                            }
                  }
               // end isset
                  ?>
          </div>
        </div>
      </div>
    </div>


    <!-- End Manage Election -->


</div> -->
