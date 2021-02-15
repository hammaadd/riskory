@extends('layouts.adminApp')

@section('pageHeading')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{URL::route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Edit Content</li>
    </ol>
  </nav>
@endsection
@section('summernote')
<link href="{{asset('adminAssets/summernote/summernote.min.css')}}" rel="stylesheet">
<script src="{{asset('adminAssets/summernote/summernote.min.js')}}"></script>
@endsection

@section('content')

<div class="row d-flex justify-content-center mb-4">
    <div class="col-md-12 col-sm-12 col-lg-10">
     <div class="card shadow border-left-warning">
         <div class="card-header text-center">
         <span class="text-center">Update Content</span>
         </div>
         <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
         <form method="POST" action="{{route('content.update',$content->id)}}">
            @csrf
            @method('PUT') 
                <div class="form-group">
                    <label for="heading"><strong>Heading</strong></label>
                <input type="text" class="form-control" placeholder="Heading" name="heading" required value="{{$content->heading}}">
                </div>
                    
                <div class="form-group">
                    <label for="content"><strong>Content</strong> </label>
                    <textarea name="content" id="summernote" class="form-control" cols="30" rows="5" required>{!!$content->content!!}</textarea>
                  
                </div>
                
              


               
                <button type="submit" class="float-right btn btn-outline-warning shadow-sm">Update <i class="fas fa-pen"></i></button>
              </form>
               
         </div>
       </div>
    </div>
 </div>

@endsection
@section('scripts')
<script>
    $(document).ready(function() {
    $('#summernote').summernote({
        height:200,
        toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
       ['insert', ['link', 'picture', 'video']],
       ['fullscreen']
  ]
    });
  });
</script>
    
@endsection