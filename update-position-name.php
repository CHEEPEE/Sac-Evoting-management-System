<?php
include 'dbconnect.php';
session_start();
$posid = $_REQUEST['posid'];
$posname = $_POST['position-name'];
$election_id = $_SESSION['electionid'];

$updatepostioname = "UPDATE election_positions SET position_name = '$posname' WHERE id =  $posid";
if ($conn->query($updatepostioname) === TRUE) {
    header("location:manage-election.php?electionid=$election_id");
} else {
    echo "Error updating record: " . $conn->error;
}

 ?>
