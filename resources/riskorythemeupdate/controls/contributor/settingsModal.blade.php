@if($user->count()>0)
<div class="modal fade" id="settingsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update user settings</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <input type="hidden" value="{{$user->id}}" name="user_id">
            <div class="card">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><strong class="text-primary">Name: </strong> {{$user->name}}</li>
                  <li class="list-group-item"><strong class="text-primary">Email: </strong> {{$user->email}}</li>
                </ul>
              </div>
              <hr>
              <h3 class="text-center px-1 py-2">Settings</h3>
            <div class="form-group">
                <label for="Rcstatus">Risk control by default status.</label>
                <select name="rc_status" id="Rcstatus" class="form-control">
                    
                    <option value="1" @if($user->rc_status==1) selected @endif>Approved</option>
                    <option value="0" @if($user->rc_status==0) selected @endif>Pending</option>

                </select>
            </div>
           
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="updateStatus()">Update Settings</button>
        </div>
      </div>
    </div>
</div>
@endif