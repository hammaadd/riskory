@extends('layouts.adminApp')

@section('pageHeading')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{URL::route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{URL::route('adminProfile')}}">Profile</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit avatar</li>
    </ol>
  </nav>
@endsection
@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-md-6">
     <div class="card shadow">
         <div class="card-header text-center">
         <span class="text-center">Update admin avatar</span>
         </div>
         <div class="card-body">
         <form method="POST" action="{{URL::route('admin.upload.avatar')}}" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="col-sm-12 d-flex justify-content-center">
                        <img src="
                        @if(Auth::user()->avatar == 'images/avatars/default.png')
                        https://ui-avatars.com/api/?background=random&name={{ str_replace(' ','+' ,Auth::user()->name) }}
                        @else
                        {{asset('adminAvat/'.Auth::user()->avatar)}}
                        @endif
                        " alt="" class="rounded-circle img-thumbnail image-contain-150">
                    </div>
                    
                        <div class="form-group mt-3">
                            <label for="avatar">Upload avatar</label>
                          <input type="file" class="form-control-file form-control shadow-sm" id="avatar" name="avatar" required>
                        </div>
                    
                </div>
                <button type="submit" class="float-right btn btn-outline-secondary shadow-sm">Update</button>
              </form>
               
         </div>
       </div>
    </div>
 </div>

@endsection