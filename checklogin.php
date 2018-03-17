<?php

include 'dbconnect.php';

session_start();
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
    }else {
      # code...


    }
  }
}else {
  $getStudent  ="SELECT * FROM college_student where student_num ='$username' AND password = '$password'";
  $getStudentResult = $conn->query($getStudent);
  if ($getStudentResult->num_rows>0) {
    # code...
    while ($student_user_row = $getStudentResult ->fetch_assoc()) {
      # code...
      $_SESSION['user_id'] = $student_user_row['student_num'];
      $_SESSION['user_name'] = $student_user_row['fullname'];
      header("location:student.php");

    }
  }else {
  echo "Login Failed";
  };
}

?>
