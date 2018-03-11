<?php

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

 ?>
