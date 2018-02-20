<?php
include 'dbconnect.php';
$election_id = $_REQUEST['electionid'];
$position_id = $_REQUEST['posid'];

$candidatename = $_POST['candidate_name'];
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

$insertSQL = "INSERT INTO candidates (candidate_name,candidate_course,candidate_party_list_id,candidate_des,election_id,position_id,img_location) VALUES('$candidatename','$candidateCourse','$party_list_id','$candidatedes',$election_id,$position_id,'$target_file')";
if ($conn->query($insertSQL)===TRUE) {

header("location:manage-election.php?electionid=$election_id");
  # code...
}else {
  # code...
  echo "Error: "."<br>" . $conn->error;
}

 ?>
