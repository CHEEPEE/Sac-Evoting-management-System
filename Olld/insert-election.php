<?php
include 'dbconnect.php';


$election_name= $_POST['election_name'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];

echo $election_name.$start_date.$end_date;
$sql = "INSERT INTO election (election_name,date_start,date_end) VALUES ('$election_name','$start_date','$end_date')";
if ($conn->query($sql)=== TRUE) {
  # code...
header("location:manage-evoting.php");
}else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
