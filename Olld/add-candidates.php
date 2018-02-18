<?php
include 'dbconnect.php';
$election_id = $_REQUEST['electionid'];
$position_id = $_REQUEST['posid'];

$candidatename = $_POST['candidate_name'];
$candidateCourse = $_POST['candidate_cource'];
$candidatedes = $_POST['candidate_des'];
$party_list_id = $_POST['partylist'];

$insertSQL = "INSERT INTO candidates (candidate_name,candidate_course,candidate_party_list_id,candidate_des,election_id,position_id) VALUES('$candidatename','$candidateCourse','$party_list_id','$candidatedes',$election_id,$position_id)";
if ($conn->query($insertSQL)===TRUE) {

  header("location:manage-election.php?electionid=$election_id");
  # code...
}else {
  # code...
  echo "Error: "."<br>" . $conn->error;
}

 ?>
