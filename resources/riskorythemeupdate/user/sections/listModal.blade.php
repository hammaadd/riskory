<div class="modal fade" id="listModal" tabindex="-1" role="dialog" aria-labelledby="relationModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content lists-modal">
        <div class="modal-header">
            <label class="font-eb font-16 pt-2 pl-5">Your Lists</label>
          <button class="btn-list" data-toggle="modal" data-target="#newListModal" data-dismiss="modal"><i class="fas fa-plus-circle"></i></button>
        </div>
        <div class="modal-body">
            @csrf
            @method('DELETE')
          <div class="lists-modal-body" id="userListsData">

             
            
              <p class="text-right p-4"><a href="#" class="color-r font-eb font-14 text-underl">Back To Top</a><i class="fas fa-arrow-up color-r"></i></p>
          </div>
          <input type="hidden" id="rc" value="0" name="rc">
          {{-- <input type="text" id="list" value="0" name="list"> --}}
        </div>
      </div>
    </div>
  </div>
 {{-- Modal --}}
 <div class="modal fade riskory-modal" id="newListModal" tabindex="-1" role="dialog" aria-labelledby="listModal" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="text-center">
            <h6 class="p-style font-b">Creating new list</h6>
            <input type="hidden" value="{{route('get.all.lists')}}" id="getDataUrl"></span>
            <form id="listForm" method="POST" action="{{route('add.list')}}">
                @csrf
                <input type="text" name="name" placeholder="List Name" class="form-control color-b br-10 mt-2 mb-3" required>
                <input type="text" name="description" placeholder="Description" class="form-control color-b br-10">
                <div class="radio-item">
                    <input type="radio" id="publiclist" name="listtype" value="1" checked="">
                    <label for="publiclist" class="font-14">Public</label>
                </div>
                <div class="radio-item ml-3">
                    <input type="radio" id="privatelist" name="listtype" value="0">
                    <label for="privatelist" class="font-14">Private</label>
                </div>
                <div class="my-2">
                    <button class="font-14 font-b color-r bg-transparent border-2 br-30 px-3 py-2 mx-1" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" name="" value="Create" class="font-14 font-b color-w bg-red border-2 br-20 px-3 py-2 mx-1">
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="{{asset('js/list.js')}}"></script>
  <script>
    
function callModal(id){
    $("#rc").val($("#"+id).attr('data-rc'));
    var _token = $("input[name=_token]").val();
         $.ajax({
             url:"{{route('fetch.user.lists')}}",
             method:"POST",
             data:{_token:_token,rc_id:$("#"+id).attr('data-rc')},
             success:function(data)
             {
              $('#userListsData').html(data);
                
             }
           });

}

function listCheck(id){
   check = document.getElementById(id);
   var _token = $("input[name=_token]").val();
    console.log(id);
    list = $("#"+id).val();
    

    rc_id = $("#rc").val();
   if(check.checked == true){
    $.ajax({
             url:"{{route('add.rc.to.list')}}",
             method:"POST",
             data:{_token:_token,rc_id:rc_id,list_id:list},
             success:function(data)
             {
               toastr[data.type](data.message);
              //$('#userListsData').html(data);
            //   arrOfIds.forEach(checkElements);
             }
           });
   }else{
    var _method = $("input[name=_method]").val(); 
    $.ajax({
             url:"{{route('remove.rc.from.list')}}",
             method:"POST",
             data:{_token:_token,rc_id:rc_id,list_id:list,_method:_method},
             success:function(data)
             {
               toastr[data.type](data.message);
             }
           });
   }
}

  </script>