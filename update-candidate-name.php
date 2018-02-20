<?php
include 'dbconnect.php';
session_start();
$candid = $_REQUEST['candid'];
$candidatename = $_POST['candidate-name'];
$election_id = $_SESSION['electionid'];
$updatepostioname = "UPDATE candidates SET candidate_name = '$candidatename' WHERE candidate_id =  $candid";
if ($conn->query($updatepostioname) === TRUE) {
    header("location:manage-election.php?electionid=$election_id");
} else {
    echo "Error updating record: " . $conn->error;
}
 ?>
