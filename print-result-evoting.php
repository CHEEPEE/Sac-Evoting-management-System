<div class="col s2 right">
  <input type="submit" class="btn white-text" name="" value="Print now" onclick="printDiv('print')">
</div>
<div id = 'print'>
<?php


if (isset($_REQUEST['electionid'])) {
  # code...
  include 'dbconnect.php';
  $eid = $_REQUEST['electionid'];

  $sql = "SELECT * FROM election_positions where election_id = '$eid'";
  $sqlResult = $conn->query($sql);
  if ($sqlResult->num_rows>0) {
    # code...
    echo "<table>";
    while ($row = $sqlResult->fetch_assoc()) {
      ?>
      <div class="row container-fluid">
        <div class="col-12">
            <?php
            $position_id = $row['id'];
            echo "<tr><th>". $row['position_name'] ."</th><th> </th><th> </th></tr>";
            echo "<tr>";
              $sqlSelectCandidate = "SELECT * FROM candidates where election_id = '$eid' AND position_id = '$position_id'";
              $sqlCandidateResult = $conn->query($sqlSelectCandidate);
              if ($sqlCandidateResult->num_rows>0) {
                # code...
                while ($candRow = $sqlCandidateResult->fetch_assoc()) {
                  $can_id = $candRow['candidate_id'];
                  # code...
                  echo "<th>"."<img width='50px' height ='50px' src = ' " .$candRow['img_location'] ."'></th><th>".$candRow['candidate_fname']." ".$candRow['candidate_lname']."</th><th>".getVote($eid,$can_id)."</th>";


                }
              }
            echo "</tr>";


            ?>






        </div>

      </div>



       <?php
      # code...

    }
    echo "</table>";
  }
}

function getVote($election_id,$election_cand_id)
{
  # code...
  include 'dbconnect.php';
  $getVotesql = "SELECT * FROM election_votes where election_id = '$election_id' AND election_candidate_id = '$election_cand_id'";
  $getVoteResult = $conn->query($getVotesql);
  if ($getVoteResult->num_rows>0) {
    # code...
    if ($row = $getVoteResult->fetch_assoc()) {
      # code...
      return $row['election_vote'];
    }
  }
}


 ?>
</div>

 <script type="text/javascript">
function printDiv(divName) {
   var printContents = document.getElementById(divName).innerHTML;
   var originalContents = document.body.innerHTML;
   document.body.innerHTML = printContents;
   window.print();
   document.body.innerHTML = originalContents;
}
</script>
