<?php
include 'dbconnect.php';
$candid = $_REQUEST['candid'];

$selectpos = "SELECT * FROM candidates WHERE candidate_id  = $candid";
$postResult = $conn->query($selectpos);
if ($postResult->num_rows>0) {
  # code...
  while ($rowpos = $postResult->fetch_assoc()) {
    ?>
    <form class="" method="POST" action="update-candidate-name.php?candid=<?php echo $candid;?>" method="post">
      <input type="text" name="candidate-name" value="<?php echo $rowpos['candidate_name']; ?>">
      <input type="submit">
    </form>

    <?php
    # code...

  }
}



 ?>
