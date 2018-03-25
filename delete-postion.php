<?php
include 'dbconnect.php';
session_start();
$position_id = $_REQUEST['posid'];
$election_id = $_SESSION['electionid'];


$delete_position = "DELETE FROM election_positions WHERE id = $position_id;";

if ($conn->query($delete_position) === TRUE) {
    header("location:admin-manage-election.php?electionid=$election_id");
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
