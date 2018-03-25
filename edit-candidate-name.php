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
      <input type="text" name="candidate-fname" value="<?php echo $rowpos['candidate_fname']; ?>">
        <input type="text" name="candidate-mname" value="<?php echo $rowpos['candidate_mname']; ?>">
          <input type="text" name="candidate-lname" value="<?php echo $rowpos['candidate_lname']; ?>">

      <input type="submit">
    </form>

    <?php
    # code...

  }
}



 ?>
