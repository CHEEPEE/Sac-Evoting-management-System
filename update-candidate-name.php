<?php
include 'dbconnect.php';
session_start();
$candid = $_REQUEST['candid'];
$candidate_fname = $_POST['candidate-fname'];
$candidate_mname= $_POST['candidate-mname'];
$candidate_lname = $_POST['candidate-lname'];
$election_id = $_SESSION['electionid'];
$updatepostioname = "UPDATE candidates SET candidate_fname = '$candidate_fname',candidate_mname = '$candidate_mname',candidate_lname = '$candidate_lname' WHERE candidate_id =  $candid";
if ($conn->query($updatepostioname) === TRUE) {
    header("location:admin-manage-election.php");
} else {
    echo "Error updating record: " . $conn->error;
}
 ?>
