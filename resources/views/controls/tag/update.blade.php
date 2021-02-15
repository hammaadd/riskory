@extends('layouts.adminApp')

@section('pageHeading')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{URL::route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('tag.index')}}">Tags</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit</li>
    </ol>
  </nav>
@endsection
@section('content')
<div class="row d-flex justify-content-center mb-4">
    <div class="col-md-8 col-sm-12 col-lg-6">
     <div class="card shadow border-left-warning">
         <div class="card-header text-center">
         <span class="text-center">Edit tag <i class="fas fa-list-alt text-warning"></i></span>
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
         <form method="POST" action="{{route('tag.update',$tag->id)}}">
            @csrf
            @method('PUT')
                
                <div class="form-group">
                    <label for="name">Name</label>
                <input type="text" class="form-control" placeholder="Name of tag" name="name" value="{{$tag->name}}" required>
                </div>
                

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="0" @if($tag->status==0) selected @endif>Inactive</option>
                        <option value="1" @if($tag->status==1) selected @endif>Active</option>
                    </select>
                </div>


               
                <button type="submit" class="float-right btn btn-outline-warning shadow-sm">Update <i class="fas fa-pen"></i></button>
              </form>
               
         </div>
       </div>
    </div>
 </div>

@endsection