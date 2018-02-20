<?php
include 'dbconnect.php';
session_start();
$candid = $_REQUEST['candid'];
$election_id = $_SESSION['electionid'];


$delete_position = "DELETE FROM candidates WHERE candidate_id = $candid;";

if ($conn->query($delete_position) === TRUE) {
    header("location:manage-election.php?electionid=$election_id");
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
