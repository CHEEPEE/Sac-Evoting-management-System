<?php
include 'dbconnect.php';

$election_id = $_REQUEST['electionid'];
echo $election_id;
//include 'bootstrap.php';
?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sac eVoting</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allura">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand navbar-link" href="landing.html"><img src="assets/img/Saclogo1.png" id="logo">SAC eVoting</a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">Account </a>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation"><a href="Landing.html">Logout </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="content" class="form-1">
        <div class="container-fluid" id="candidates">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <form class="form-horizontal custom-form">
                        <h1>Manage Election</h1></form>
                </div>
            </div>
        </div>
    </div>
    <div id="welcome1">
        <div class="jumbotron">
            <div>
          <form class="" action="add-positions.php?electionid=<?php echo $election_id;?>" method="post">
  <div class="form-2">
        <label for="position_name">Position</label>
        <input type="text" required name="position_name" class="form-control" id="position_name" aria-describedby="emailHelp" placeholder="Postion" >
  </div>
  <input type="submit" class="btn btn-default" value="Add">
</form>
            </div>
            <div>
    <form class="" action="add-partylist.php?electionid=<?php echo $election_id;?>" method="post">
  <div class="form-2">
        <label for="party_list_name">Add Party-List</label><br>
        <input type="text" required name="party_list_name" class="form-control" id="party_list_name" aria-describedby="emailHelp" placeholder="Party List">
  </div>
  <input type="submit" class="btn btn-default" value="Add">
</form>
            </div>
            <?php
$getPostions_sql = "SELECT * FROM election_positions WHERE election_id = $election_id";
$getPositionRequest = $conn->query($getPostions_sql);

 if ($getPositionRequest->num_rows > 0) {
     // output data of each row
     while($row = $getPositionRequest->fetch_assoc()) {
         ?>
         <div id="accordion-1" class="panel-group" aria-multiselectable="true" role="tablist">
           <div class="card">
             <div class="card-header" id="headingOne">
               <h5 class="mb-0">
                 <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <?php echo "" . $row["position_name"]."  <a href='manage-election.php?electionid=".$row['id']."'> <i class='large material-icons'> edit</i> Edit Name</a><br>";
                     $position_id = $row['id']; ?>
                 </button>
               </h5>
             </div>

             <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion-1">
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
     //echo $row['party_list_name']."<br>";

   }
 }else {
    echo "0 results";
 }


 ?>


   </div>
  
</div>
  </div>

</div>
  <script type="text/javascript">
$('.collapse').collapse();
  </script>

        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
