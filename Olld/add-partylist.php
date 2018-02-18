<?php
include 'dbconnect.php';
$election_id  = $_REQUEST['electionid'];
$partylistname = $_POST['party_list_name'];
$insertPartyListSql = "INSERT INTO party_list (party_list_name,election_id) VALUES ('$partylistname',$election_id);";
if ($conn->query($insertPartyListSql)===TRUE) {
  # code...
  header("location:manage-election.php?electionid=$election_id");
}else {
  # code...
  echo "Error: " . $sql . "<br>" . $conn->error;
}
 ?>
