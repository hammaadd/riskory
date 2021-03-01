$('.like-button').on('click', function(){
    rc = $(this).attr('data-rc');
    if(rc > 0){
        $.ajax({
            url:$(this).attr('data-url'),
            method:"GET",
            data:{rc:rc},
            success:function(data){
                $('#like-div-'+rc).html(data);
            },
            error:function(request, status, error){
                    if(request.status == 422){

                        toastr.error(request.responseJSON.errors.name[0]);
                    }

                },

        });
    }
});
