@extends('layouts.adminApp')

@section('pageHeading')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{URL::route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('bframework.index')}}">Business Frameworks</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit</li>
    </ol>
  </nav>
@endsection
@section('content')
<div class="row d-flex justify-content-center mb-4">
    <div class="col-md-8 col-sm-12 col-lg-6">
     <div class="card shadow border-left-warning">
         <div class="card-header text-center">
         <span class="text-center">Edit Business Framework <i class="fas fa-chart-area text-warning"></i></span>
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
         <form method="POST" action="{{route('bframework.update',$bframework->id)}}">
            @csrf
            @method('PUT')
                
                <div class="form-group">
                    <label for="name">Name</label>
                <input type="text" class="form-control" placeholder="Name of business process" name="name" value="{{$bframework->name}}" required>
                </div>
                    
                <div class="form-group">
                    <label for="note">Note <small class="text-danger">(optional)</small></label>
                <textarea name="note" id="note" class="form-control" cols="30" rows="5">{{$bframework->note}}</textarea>
                  
                </div>
                
                <div class="form-group">
                    <label for="parent">Parent <small class="text-danger">(if any)</small></label>
                    <select name="parent_id" id="parent" class="form-control">
                        <option value="" @if(empty($bframework->id)) selected @endif>None</option>
                    @foreach($bframeworks as $bf)
                        <option value="{{$bf->id}}" @if($bframework->parent_id==$bf->id) selected @endif>{{$bf->name}}</option>
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="0" @if($bframework->status==0) selected @endif>Inactive</option>
                        <option value="1" @if($bframework->status==1) selected @endif>Active</option>
                    </select>
                </div>


               
                <button type="submit" class="float-right btn btn-outline-warning shadow-sm">Update <i class="fas fa-pen"></i></button>
              </form>
               
         </div>
       </div>
    </div>
 </div>

@endsection