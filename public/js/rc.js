$('.delete-button').on('click', function(){
    rc = $(this).attr('data-rc');
    $('#rcDeleteModal').modal('toggle');
    console.log(rc);
});

