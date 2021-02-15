<div class="modal fade" id="listModalLike" tabindex="-1" role="dialog" aria-labelledby="relationModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content lists-modal">
        <div class="modal-header">
            <label class="font-eb font-16 pt-2 pl-5">Your Lists</label>
          <button class="btn-list"><i class="fas fa-plus-circle"></i></button>
        </div>
        <div class="modal-body">
            @csrf
            @method('DELETE')
          <div class="lists-modal-body" id="LikesListsData">

             
            
              <p class="text-right p-4"><a href="#" class="color-r font-eb font-14 text-underl">Back To Top</a><i class="fas fa-arrow-up color-r"></i></p>
          </div>
          <input type="hidden" id="rc" value="0" name="rc">
          {{-- <input type="text" id="list" value="0" name="list"> --}}
        </div>
      </div>
    </div>
  </div>

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
              $('#LikesListsData').html(data);
                
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