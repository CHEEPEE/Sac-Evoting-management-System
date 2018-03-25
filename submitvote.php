<?php

if (isset($_POST['submit-vote'])) {

    $eid=$_REQUEST['eid'];
    include 'dbconnect.php';
    session_start();
    $student_id =   $_SESSION['user_id'];
  # code...
    $getElectionId = "SELECT * from election_positions where election_id ='$eid'";
    $getElectionidResult = $conn->query($getElectionId);
    if ($getElectionidResult->num_rows>0) {
      # code...
      while ($row = $getElectionidResult->fetch_assoc()) {
        $posID = $row['id'];
        echo $_POST[$posID];
        $cadidate_id = $_POST[$posID];



          $selectVoting = "SELECT * from election_votes where election_id = $eid AND election_candidate_id = $cadidate_id";
          $getElectionVoting = $conn->query($selectVoting);
            if ($getElectionVoting->num_rows>0) {
              # code...
              while ($election_row=$getElectionVoting->fetch_assoc()) {
                # code...
                $election_vote =$election_row['election_vote']+1;
                $updateVote = "UPDATE election_votes set election_vote = $election_vote where election_id = $eid AND election_candidate_id = $cadidate_id";
                if ($conn->query($updateVote)===TRUE) {
                  # code...
                    echo "success";

                }else {
                  # code...
                  echo "UPDATE election_votes set election_vote = $election_vote where election_id = $eid AND election_candidate_id = $posId " . $conn->error;

                }


              }
            }else {

              echo "SELECT * from election_votes where election_id = $eid AND election_candidate_id = $posID " . $conn->error;

            }
          # code...



        }
        # code...
      }
    else {
      echo "SELECT * from election_positions where election_id ='$eid " . $conn->error;

    }

}
header("location:student.php");
$sqlVoted = "INSERT INTO voted_students (eid,student_id) VALUES ('$eid','$student_id')";
if ($conn->query($sqlVoted)===TRUE) {
  # code...
    echo "success";

}


?>
