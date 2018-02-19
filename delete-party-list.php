<?php
include 'dbconnect.php';
session_start();
$election_id = $_SESSION['electionid'];
$partid = $_REQUEST['partid'];
$election_id = $_REQUEST['electionid'];
$delete_position = "DELETE FROM party_list WHERE party_list_id = $partid;";

if ($conn->query($delete_position) === TRUE) {
    header("location:manage-election.php?electionid=$election_id");
} else {
    echo "Error deleting record: " . $conn->error;
}
 ?>
