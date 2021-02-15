{{-- <div class="modal fade" id="ratingModal" tabindex="-1" role="dialog" aria-labelledby="ratingModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content lists-modal">
        <div class="modal-header">
            <label class="font-eb font-16 pt-2 pl-5 text-center">Rate this risk control</label>
        </div>
        <div class="modal-body">
            
        </div>
      </div>
    </div>
  </div> --}}

  <div class="modal fade riskory-modal" id="ratingModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="text-center">
              <p class="lead">Rate risk control</p>
              @csrf
              <form action="{{route('do.rating')}}" method="POST" id="ratingForm">
                @csrf
              @include('user.sections.rating')
              <input type="hidden" name="rc" id="ratingRc" value="0">
              <div class="my-2">
                <button class="font-14 font-b color-r bg-transparent border-2 br-30 px-3 py-2 mx-1" type="button" data-dismiss="modal">Cancel</button>
                <input type="submit" name="" value="Rate" class="font-14 font-b color-w bg-red border-2 br-20 px-3 py-2 mx-1">
              </form>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>

  <script>
      function doRating(id){
        $("#ratingModal").modal('toggle');
        $("#ratingRc").val(id);
      }

      function updateShowRating(id){
        _token = $("input[name='_token']").val();
        $.ajax({
          url:'{{route('update.rating.view')}}',
          method:"POST",
          async:false,
          data:{_token:_token,rc_id:id},
          success:function(data){
            
            $("#showRating"+id).html(data);
          }
        });
      }

      $('#ratingForm').on('submit',function(e){
        e.preventDefault();

        rc_id = $("#ratingRc").val();
        _token = $("input[name='_token']").val();
      

        $.ajax({
          url:$(this).attr('action'),
          method:"POST",
          data:$("#ratingForm").serialize(),
          success:function(data){
            toastr[data.type](data.message);
            $("#ratingForm")[0].reset();
            $("#ratingModal").modal('toggle');
            setTimeout(updateShowRating(rc_id),500);
            
          }
        });
      });

  </script>



