    $("#listForm").on('submit',function(event) {
        event.preventDefault();
        $.ajax({
            url:$(this).attr('action'),
            method:"POST",
            data:$(this).serialize(),
            success:function(data){
                toastr[data.type](data.message);
                if(data.type == 'success'){
                    $('#listForm')[0].reset();
                    $('input[name="name"]').focus();
                    $('#newListModal').modal('toggle');
                    getAllDataOfLists();
                }

            },
            error:function(request, status, error){
                    if(request.status == 422){

                        toastr.error(request.responseJSON.errors.name[0]);
                    }
                   
                },
            
        });
    });

$(document).ready(function(){
 getAllDataOfLists();

});

function getAllDataOfLists(){
    $.ajax({
        url:$('#getDataUrl').val(),
        method:"GET",
        success:function(data){
            $('#listsData').html(data);
        }
    });
}

function assignIdOfList(id){
    $('#delId').val(id);
}

$("#deleteForm").on('submit',function(event){
 event.preventDefault();
 $.ajax({
    url:$(this).attr('action'),
    method:"POST",
    data:$("#deleteForm").serialize(),
    success:function(data){
        toastr[data.type](data.message);
        if(data.type == 'success'){
            $('#deleteForm')[0].reset();
            $('#deleteModal').modal('toggle');
            $('#delId').val(0);

            getAllDataOfLists();
        }

    },
    error:function(request, status, error){
            if(request.status == 422){

                toastr.error(request.responseJSON.errors.name[0]);
            }
           
        },
    
});

});

function changeType(id,type){
 
    $.ajax({
        url:$("#typeUrl").val(),
        method:"POST",
        data:{_token:$("input[name='_token']").val(),list_id:id,type:type},
        success:function(data){
            toastr[data.type](data.message);
            getAllDataOfLists();
        }
    });
}