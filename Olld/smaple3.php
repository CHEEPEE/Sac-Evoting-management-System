<?php
// Create connection
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'samples';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else {
$sql = "INSERT INTO samples1 (names)
            VALUES('".$_POST['names']."')";
if(!mysqli_query($conn,$sql)){
echo "Not Inserted" . mysqli_error($conn);
}else{
echo "Inserted";
}
}
//header('refresh:1; url=login.php');
mysqli_close($conn);
?>