<?php
include 'dbconnect.php';
$position_name = $_POST['position_name'];
$election_id = $_REQUEST['electionid'];

echo $position_name.$election_id;

$position_insert_sql = "INSERT INTO election_positions (position_name,election_id) VALUES ('$position_name',$election_id)";
if ($conn->query($position_insert_sql) === TRUE) {
  # code...
  header("location:manage-election.php?electionid=$election_id");
}
 ?>
