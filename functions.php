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

function getNameFromUserId($userId)
{
  # code...
}

function validateAccessCode($accessCode)
{
  # code...
  include 'dbconnect.php';
  $validateAccessCodeSql = "SELECT * from election where election_access_code ='$accessCode'";
  $sqlResult  = $conn->query($validateAccessCodeSql);

  if ($sqlResult->num_rows>0) {
    # code...
      # code...Haru
      return true;
  }else {
    return false;
  }


}

function validateInsertedAccessCode($student_id,$accessCode)
{
  # code...
  include 'dbconnect.php';
  $validateAccessCodeSql = "SELECT * from registerd_student where student_id ='$student_id' AND election_access_code='$accessCode'";
  $sqlResult  = $conn->query($validateAccessCodeSql);

  if ($sqlResult->num_rows>0) {
    # code...
      # code...Haru
      return true;
  }else {
    return false;
  }
}


?>
