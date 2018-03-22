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



  if (isset($_POST['add-candidate'])) {
    # code...

        include 'dbconnect.php';
        $election_id = $_REQUEST['eid'];
        $position_id = $_REQUEST['posid'];

        $candidatename = $_POST['candidate_name'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];

        $candidateCourse = $_POST['candidate_cource'];
        $candidatedes = $_POST['candidate_des'];
        $party_list_id = $_POST['partylist'];

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        $insertSQL = "INSERT INTO candidates (candidate_fname,candidate_mname,candidate_lname,candidate_course,candidate_party_list_id,candidate_des,election_id,position_id,img_location) VALUES('$fname','$mname','$lname','$candidateCourse','$party_list_id','$candidatedes',$election_id,$position_id,'$target_file')";
        if ($conn->query($insertSQL)===TRUE) {

        header("location:admin-dashboard.php?eid=$election_id");
          # code...
        }else {
          # code...
          echo "Error: "."<br>" . $conn->error;
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
    // $insertIntoUsers = "INSERT INTO users (username,password,role) VALUES ('$student_number','$student_number','student')";
    // if ($conn->query($insertIntoUsers)) {
    //   # code...
    // }
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
  date_default_timezone_set("America/New_York");
  $access_code = date('Ymdhis');

  echo $election_name.$start_date.$end_date;
  $sql = "INSERT INTO election (election_name,date_start,date_end,election_access_code) VALUES ('$election_name','$start_date','$end_date',$access_code)";
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
