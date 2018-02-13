<?php
include 'dbconnect.php';

$election_id = $_REQUEST['electionid'];
echo $election_id;

?>
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
         echo "" . $row["position_name"]." <a href='manage-election.php?electionid=".$row['id']."'>Edit Position Name </a><br>";
         $position_id = $row['id'];
         ?>
         <form class="" action="add-candidates.php?electionid=<?php echo $election_id;?>&posid=<?php echo $position_id; ?>" method="post">
           <div class="form-2">
                 <label for="candidate_name">Candidate Name</label>
                 <input type="text" required name="candidate_name" class="form-control" id="position_name" aria-describedby="emailHelp" placeholder="Postion">
                 <label for="candidate_cource">Course</label>
                 <input type="text" required name="candidate_cource" class="form-control" id="position_name" aria-describedby="emailHelp" placeholder="Postion">
                 <label for="candidate_des">Description</label>
                 <input type="text" required name="candidate_des" class="form-control" id="position_name" aria-describedby="emailHelp" placeholder="Postion">
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
