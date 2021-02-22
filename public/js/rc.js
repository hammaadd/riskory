$('.delete-button').on('click', function(){
    rc = $(this).attr('data-rc');
    url = $('input[name="base-url"]').val();
    $('input[name="rc-delete-id"]').val(0);
    $('input')
    $('#rcDeleteModal').modal('toggle');
    $('#riskcontrol-slug').attr('href',url+'/rc/'+rc);
    $('input[name="rc-delete-id"]').val(rc);
});

