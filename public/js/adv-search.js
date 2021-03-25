$('#industry').on('change', function(){
    ids = $(this).val();
    type= $(this).attr('data-type');
    url = $(this).attr('data-url');

    $.ajax({
        url:url,
        method:"GET",
        data:{type:type,ids:ids},
        success:function(data){
            console.log(data);
        }
    });
});
