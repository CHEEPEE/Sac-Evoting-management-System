<?php
include 'dbconnect.php';

$election_id = $_REQUEST['electionid'];
echo $election_id;
include 'bootstrap.php';
?>
<div class="row justify-content-md-center">
  <div class="col-4">



<form class="" action="add-positions.php?electionid=<?php echo $election_id;?>" method="post">
  <div class="form-2">
        <label for="position_name">Position</label><br>
        <input type="text" required name="position_name" class="form-control" id="position_name" aria-describedby="emailHelp" placeholder="Postion">
  </div>
  <input type="submit" class="btn btn-default" value="Add">
</form>
<form class="" action="add-partylist.php?electionid=<?php echo $election_id;?>" method="post">
  <div class="form-2">
        <label for="party_list_name">Add Party-List</label><br>
        <input type="text" required name="party_list_name" class="form-control" id="party_list_name" aria-describedby="emailHelp" placeholder="Postion">
  </div>
  <input type="submit" class="btn btn-default" value="Add">
</form>

<?php
$getPostions_sql = "SELECT * FROM election_positions wHERE election_id = $election_id";
$getPositionRequest = $conn->query($getPostions_sql);

 if ($getPositionRequest->num_rows > 0) {
     // output data of each row
     while($row = $getPositionRequest->fetch_assoc()) {
         ?>
         <div id="accordion">
           <div class="card">
             <div class="card-header" id="headingOne">
               <h5 class="mb-0">
                 <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <?php echo "" . $row["position_name"]." <a href='manage-election.php?electionid=".$row['id']."'><i class='large material-icons'>edit</i>Edit Name</a><br>";
                     $position_id = $row['id']; ?>
                 </button>
               </h5>
             </div>

             <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
               <div class="card-body">
                 <form class="" action="add-candidates.php?electionid=<?php echo $election_id;?>&posid=<?php echo $position_id; ?>" method="post">
                   <div class="form-2">
                         <label for="candidate_name">Candidate Name</label>
                         <input type="text" required name="candidate_name" class="form-control" id="position_name" aria-describedby="emailHelp" placeholder="Name">
                         <label for="candidate_cource">Course</label>
                         <input type="text" required name="candidate_cource" class="form-control" id="position_name" aria-describedby="emailHelp" placeholder="Course">
                         <label for="candidate_des">Description</label>
                         <input type="text" required name="candidate_des" class="form-control" id="position_name" aria-describedby="emailHelp" placeholder="Candidate Description">
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
             # code...
             echo $rowcandidate['candidate_name']."<br>";
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
     echo $row['party_list_name']."<br>";

   }
 }else {
    echo "0 results";
 }


 ?>


   </div>
  </div>
  <!--
  <div id="accordion">
    <div class="card">
      <div class="card-header" id="headingOne">
        <h5 class="mb-0">
          <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Collapsible Group Item #1
          </button>
        </h5>
      </div>

      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
        </div>
      </div>
    </div>
   <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Collapsible Group Item #2
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Collapsible Group Item #3
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div> -->
</div>
  <script type="text/javascript">
$('.collapse').collapse();
  </script>
