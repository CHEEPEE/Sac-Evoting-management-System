<?php
include 'dbconnect.php';
$position_id = $_REQUEST['posid'];

$selectpos = "SELECT * FROM election_positions WHERE id  = $position_id";
$postResult = $conn->query($selectpos);
if ($postResult->num_rows>0) {
  # code...
  while ($rowpos = $postResult->fetch_assoc()) {
    ?>
    <form class="" method="POST" action="update-position-name.php?posid=<?php echo $position_id;?>" method="post">
      <input type="text" name="position-name" value="<?php echo $rowpos['position_name']; ?>">
      <input type="submit">
    </form>

    <?php
    # code...

  }
}

?>
