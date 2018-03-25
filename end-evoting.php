<?php

include 'dbconnect.php';
$eid = $_REQUEST['electionid'];

$sql = "UPDATE election set ongoing = 'false' where id = $eid;";
if ($conn->query($sql) === TRUE) {
    header("location:admin-manage-election.php");
} else {
    echo "Error updating record: " . $conn->error;
}
?>
