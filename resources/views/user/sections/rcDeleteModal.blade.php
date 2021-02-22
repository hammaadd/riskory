<div class="modal fade riskory-modal" id="rcDeleteModal" tabindex="-1" role="dialog" aria-labelledby="rcDeleteModal" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="text-center">
              <h6 class="p-style text-danger">Delete Risk Control</h6>
              <form action="{{route('rc.delete')}}" method="POST" id="rc-delete-form" >
                @csrf
                @method('DELETE')
                <input name="rc-delete-id" value="" type="hidden">
                <input name="base-url" value="{{url('/')}}" type="hidden">

                <p class="lead">Do you really want to delete <a id="riskcontrol-slug" href="#">this</a> risk control?</p>
                  <div class="my-2">
                    <button class="font-14 font-b color-r bg-transparent border-2 br-7 px-3 py-2 mx-1" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" name="" value="Delete" class="font-14 font-b color-w bg-red border-2 br-7 px-3 py-2 mx-1">
                </div>
            
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>