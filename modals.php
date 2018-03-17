
<!-- Add Election Modal -->
<div class="modal fade" id="bd-add-election-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Election</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <form action="admin-dashboard.php" method="post">
          <div>
              <label for="election_name">Election Name: </label>
              <input type="text" required name="election_name" class="form-control mb-3" id="election_name" aria-describedby="emailHelp" placeholder="Election Name">
          </div>
          <div>
              <label>Start Date: </label>
              <input class="mb-3" type="date" required name="start_date">
          </div>
          <div>
              <label>End Date: </label>
              <input class="mb-3" type="date" required name="end_date">
          </div>

          <div class="modal-footer">

                <button class="btn btn-default btn-sm" name="add-election" type="submit">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End  Add Election Modal -->
<?php
if (isset($_REQUEST['eid'])) {
  # code...

  $e_id = $_REQUEST['eid'];

?>
<!-- Add Position Modal -->
<div class="modal fade" id="bd-add-position-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Election</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <form action="admin-dashboard.php?eid=<?php echo $e_id;?>" method="post">
          <div>
            <label for="position_name">Position Label</label>
            <input type="text" required name="position_name" class="form-control" id="position_name" aria-describedby="emailHelp" placeholder="Postion Label" >
          </div>
          <div class="modal-footer">
                <button class="btn btn-default btn-sm" name="add-position" type="submit">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="bd-add-party-list-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Election</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <form action="admin-dashboard.php?eid=<?php echo $e_id;?>" method="post">
          <div>
            <label for="party_list_name">Add Party-List</label><br>
            <input type="text" required name="party_list_name" class="form-control" id="party_list_name" aria-describedby="emailHelp" placeholder="Party List">

          </div>
          <div class="modal-footer">
                <button class="btn btn-default btn-sm" name="add-party-list" type="submit">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!--add candidate modal-->
<!-- <div class="modal fade" id="bd-add-candidate-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Election</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <form action="admin-dashboard.php?eid=<?php echo $e_id;?>&posid=<?php echo $position_id;?>" method="post" enctype="multipart/form-data">
            <div class="form-2">
                  <label for="candidate_name">Candidate Name <?php echo $position_id;?></label>
                  <input type="text" required name="candidate_name" class="form-control" id="position_name" aria-describedby="emailHelp" placeholder="Name">
                  <label for="candidate_cource">Course</label>
                  <input type="text" required name="candidate_cource" class="form-control" id="position_name" aria-describedby="emailHelp" placeholder="Course">
                  <label for="candidate_des">Description</label>
                  <input type="text" required name="candidate_des" class="form-control" id="position_name" aria-describedby="emailHelp" placeholder="Candidate Description">
                   <label for="fileToUpload">upload picture</label>
                    <input type="file" name="fileToUpload" id="fileToUpload">
                  <select name="partylist">
                   <?php
                    $party_list_sql = "SELECT * FROM party_list WHERE election_id=$e_id";
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
</div> -->





<?php

}# end of if isset
 ?>
<!-- Add Position Modal -->
