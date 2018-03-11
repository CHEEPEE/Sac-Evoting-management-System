<?php
if (isset($_REQUEST['eid'])) {
  # code...
$eid = $_REQUEST['eid'];

  if (isset($_POST['add-position'])) {
    # code...
    include 'dbconnect.php';
    $position_name = $_POST['position_name'];

    $position_insert_sql = "INSERT INTO election_positions (position_name,election_id) VALUES ('$position_name',$eid)";
    if ($conn->query($position_insert_sql) === TRUE) {
      # code...
      header("location:admin-dashboard.php?eid=$eid");
    }
  }
  if (isset($_POST['add-party-list'])) {
    # code...

    include 'dbconnect.php';
    $partylistname = $_POST['party_list_name'];
    $insertPartyListSql = "INSERT INTO party_list (party_list_name,election_id) VALUES ('$partylistname',$eid);";
    if ($conn->query($insertPartyListSql)===TRUE) {
      # code...
  header("location:admin-dashboard.php?eid=$eid");
    }else {
      # code...
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

  }


}


if (isset($_POST['add-department'])) {
  # code...
  $department = $_POST['department-name'];
  $sql = "INSERT INTO department (department_name) VALUES ('$department')";
  if ($conn->query($sql) === TRUE) {

  }
  else
  {

  }
}

if (isset($_POST['insert-course'])) {
  # code...
  $dept_id = $_REQUEST['depid'];
  $course_name = $_POST['course-name'];

  $sql = "INSERT INTO course (course_name,department_id) VALUES ('$course_name',$dept_id)";
  if ($conn->query($sql) === TRUE) {

  }
  else
  {

  }
}
if (isset($_POST['register-student'])) {
  # code...
  $student_number = $_POST['student-number'];
  $fullname = $_POST['full-name'];
  $course = $_POST['course'];
  $year_level = $_POST['year_level'];
  $department_id = getDepartmentIdUsingCourse($course);

  $insertStudent = "INSERT INTO college_student (student_num,fullname,password,course_id,department_id,year_level) VALUE('$student_number','$fullname','$student_number',$course,$year_level,$department_id)";
  if ($conn->query($insertStudent) ===TRUE) {
    # code...
    $insertIntoUsers = "INSERT INTO users (username,password,role) VALUES ('$student_number','$student_number','student')";
    if ($conn->query($insertIntoUsers)) {
      # code...
    }
  }

}

function getDepartmentIdUsingCourse($courseId){
  include 'dbconnect.php';
  $sql = "SELECT * FROM course WHERE course_id = $courseId";
  $sqlResult = $conn->query($sql);

  if ($sqlResult->num_rows > 0) {
    # code...
    while ($row = $sqlResult->fetch_assoc()) {
      return $row['department_id'];
      # code...
    }
  }
}

if (isset($_POST['manage-election'])) {
  # code...
}

if (isset($_POST["add-election"])) {
  # code...
  include 'dbconnect.php';

  $election_name= $_POST['election_name'];
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];
  echo $election_name.$start_date.$end_date;
  $sql = "INSERT INTO election (election_name,date_start,date_end) VALUES ('$election_name','$start_date','$end_date')";
  if ($conn->query($sql)=== TRUE) {
    # code...
  header("location:admin-dashboard.php");
  }else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
if (isset($_POST['add-position'])) {
  # code...
  include 'dbconnect.php';
  $position_name = $_POST['position_name'];

  $position_insert_sql = "INSERT INTO election_positions (position_name,election_id) VALUES ('$position_name',$election_id)";
  if ($conn->query($position_insert_sql) === TRUE) {
    # code...
    header("location:admin-dashboard.php");
  }
}

 ?>
