<?php
include 'dbconnect.php';

$election_id = $_REQUEST['electionid'];
$delete_position = "DELETE FROM election WHERE id = $election_id;";

if ($conn->query($delete_position) === TRUE) {
    header("location:admin-dashboard.php");
} else {
    echo "Error deleting record: " . $conn->error;
}


 ?>
