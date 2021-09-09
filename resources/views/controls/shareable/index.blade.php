@extends('layouts.adminApp')

@section('pageHeading')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{URL::route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Edit Tweet Shareable Content</li>
    </ol>
  </nav>
@endsection
@section('summernote')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection
@section('content')
<div class="row d-flex justify-content-center mb-4">
    <div class="col-md-8 col-sm-12 col-lg-6">
     <div class="card shadow border-left-success">
         <div class="card-header text-center">
         <span class="text-center">Configure Twitter Shareable content <i class="fab fa-twitter text-success"></i></span>
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
        @php
         
          $hashtags = json_decode($shareable->hashtags);
          $people = json_decode($shareable->people);
        @endphp
         <form method="POST" action="{{route('shareable.update')}}">
            @csrf
                
                <div class="form-group">
                    <label for="name">Content</label>
                    <textarea class="form-control" name="content" required rows="5">{{$shareable->content}}</textarea>
                    <small class="form-text text-muted">For Risk Control title use **RC_TITLE** , For url use **RC_URL**.</small>
                </div>

                <div class="form-group">
                    <label for="status">Hashtags <i>#</i></label>
                    <select id="hashtags" name="hashtags[]" multiple="multiple" class="form-control">
                    @isset($hashtags)
                        @foreach($hashtags as $ht)
                          <option value="{{$ht}}" selected>{{$ht}}</option>
                        @endforeach
                    @endisset
                    </select>
                    <small class="form-text text-muted">Add hashtags without spaces.</small>
                </div>

                <div class="form-group">
                    <label for="status">People <i>@</i></label>
                    <select id="people" name="people[]" multiple="multiple" class="form-control">
                      @isset($people)
                        @foreach($people as $pe)
                          <option value="{{$pe}}" selected>{{$pe}}</option>
                        @endforeach
                      @endisset
                    </select>
                    <small class="form-text text-muted">Add people without spaces.</small>
                </div>

               
                <button type="submit" class="float-right btn btn-outline-success shadow-sm">Update <i class="fas fa-plus"></i></button>
              </form>
               
         </div>
       </div>
    </div>
 </div>

@endsection
@section('scripts')
<script>
$(document).ready(function() {
    $('#hashtags').select2({
      tags:true
    });
    $('#people').select2({
      tags:true
    });
});
</script>
@endsection


