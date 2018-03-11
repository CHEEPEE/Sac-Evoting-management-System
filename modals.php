
<!-- Add Election Modal -->
<div class="modal fade" id="bd-add-election-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Election</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <form action="insert-election.php" method="post">
          <div>
              <label for="election_name">Election Name: </label>
              <input type="text" required name="election_name" class="form-control mb-3" id="election_name" aria-describedby="emailHelp" placeholder="Election Name">
          </div>
          <div>
              <label>Start Date: </label>
              <input class="mb-3" type="date" required name="start_date">
          </div>
          <div>
              <label>End Date: </label>
              <input class="mb-3" type="date" required name="end_date">
          </div>

          <div class="modal-footer">

                <button class="btn btn-default btn-sm" name="add-election" type="submit">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End  Add Election Modal -->
