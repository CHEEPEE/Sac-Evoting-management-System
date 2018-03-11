<?php

include 'dbconnect.php';

$username = $_POST['username'];
$password = $_POST['password'];

$loginsql = "SELECT * FROM users where username = '$username' AND password = '$password'";
$loginresult = $conn->query($loginsql);
if ($loginresult->num_rows>0) {
  # code...
  while ($user_row = $loginresult ->fetch_assoc()) {
    # code...
    $users_role = $user_row['role'];
    if ($users_role == "admin") {
      # code...
      header("location:admin-dashboard.php");
    }else if($users_role == "student") {
      header("location:student.php");
      # code...
    }
  }
}else {
  echo "Failed";
}

?>
