<script type="text/javascript">
    $idOfData = '#all_rc_data';
    $url = "{{ route('rc.fetch.all') }}";
    function like(){
        $idOfData = '#all_rc_data';
        $url = "{{route('rc.like',)}}";
        $page = {{$rcs->currentPage()}};
        like_rc($page);
    }
    function allRcsData(){
        $idOfData = '#all_rc_data';
        $url = "{{ route('rc.fetch.all') }}";
        $page = {{$rcs->currentPage()}};
        fetch_data(page);
    }
    $(document).ready(function(){
    
     $(document).on('click', '.page-link', function(event){
        event.preventDefault(); 
        var page = $(this).attr('href').split('page=')[1];
        fetch_data(page);
     });
    
     
    
    });

    function like_rc(page){
        $.ajax({
          url:$url,
          method:"GET",
          data:{page:page},
          success:function(data)
          {
          if(data == true){
              allRcsData();
          }
          }
        });
    }

    function fetch_data(page)
     {
      var _token = $("input[name=_token]").val();
      $.ajax({
          url:$url,
          method:"POST",
          data:{_token:_token, page:page},
          success:function(data)
          {
           $($idOfData).html(data);
          }
        });
     }

    
</script>