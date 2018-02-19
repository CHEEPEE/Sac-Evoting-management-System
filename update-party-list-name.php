<?php
include 'dbconnect.php';
session_start();
$partid = $_REQUEST['partid'];
$partylisname = $_POST['party-list-name'];
$election_id = $_SESSION['electionid'];
$updatepostioname = "UPDATE party_list SET party_list_name = '$partylisname' WHERE party_list_id =  $partid";
if ($conn->query($updatepostioname) === TRUE) {
    header("location:manage-election.php?electionid=$election_id");
} else {
    echo "Error updating record: " . $conn->error;
}
 ?>
