
  <!-- Modal -->
  <div class="modal fade" id="deleteAll" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> <i class="flaticon-warning-sign icon-lg text-danger">  </i> Delete All Tracker Info</h5>
          <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="display: block !important;"><i class="flaticon-close icon-lg ">  </i></span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure you want to remove all the tracker info
        </div>
        <div class="modal-footer">
          <a href="{{ route('admin.delete_track_info') }}" type="button" class="btn btn-danger">Yes, I'm</a>
        </div>
      </div>
    </div>
</div>
