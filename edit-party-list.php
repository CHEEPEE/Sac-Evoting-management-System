<?php
include 'dbconnect.php';
$partid = $_REQUEST['partid'];

$selectpos = "SELECT * FROM party_list WHERE party_list_id  = $partid";
$postResult = $conn->query($selectpos);
if ($postResult->num_rows>0) {
  # code...
  while ($rowpos = $postResult->fetch_assoc()) {
    ?>
    <form class="" method="POST" action="update-party-list-name.php?partid=<?php echo $partid;?>" method="post">
      <input type="text" name="party-list-name" value="<?php echo $rowpos['party_list_name']; ?>">
      <input type="submit">
    </form>

    <?php
    # code...

  }
}
 ?>
