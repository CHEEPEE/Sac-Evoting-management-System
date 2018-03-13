<?php
function getAccessCodeFromElectionId($election_id)
{
  # code...

include 'dbconnect.php';
  $sql = "SELECT election_access_code FROM election where id = $election_id";
  $sqlResult = $conn->query($sql);
  if ($sqlResult ->num_rows>0) {
    # code...
    while ($row = $sqlResult->fetch_assoc()) {
      # code...
      return $row['election_access_code'];

    }
  }
}

?>
