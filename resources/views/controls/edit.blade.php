@extends('layouts.adminApp')

@section('pageHeading')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{URL::route('admin')}}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{route('control.index',['type'=>$prop->type])}}">{{ucfirst($prop->plural)}}</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit</li>
    </ol>
  </nav>
@endsection
@section('content')
<div class="row d-flex justify-content-center mb-4">
    <div class="col-md-8 col-sm-12 col-lg-6">
     <div class="card shadow border-left-warning">
         <div class="card-header text-center">
         <span class="text-center">Edit {{ucfirst($prop->singular)}} <i class="fas fa-{{$prop->icon}} text-warning"></i></span>
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
         <form method="POST" action="{{route('control.update',['type'=>$prop->type,'id'=>$data->id])}}">
            @csrf
            @method('PUT')
                
                <div class="form-group">
                    <label for="name">Name</label>
                <input type="text" class="form-control" placeholder="Name of {{$prop->singular}}" name="name" value="{{$data->name}}" required>
                </div>
                    
                <div class="form-group">
                    <label for="note">Note <small class="text-danger">(optional)</small></label>
                <textarea name="note" id="note" class="form-control" cols="30" rows="5">{{$data->note}}</textarea>
                  
                </div>
                
                <div class="form-group">
                    <label for="parent">Parent <small class="text-danger">(if any)</small></label>
                    <select name="parent_id" id="parent" class="form-control">
                        <option value="" @if(empty($data->id)) selected @endif>None</option>
                    @foreach($datas as $dat)
                        <option value="{{$dat->id}}" @if($data->parent_id==$dat->id) selected @endif>{{$dat->name}}</option>
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="0" @if($data->status==0) selected @endif>Inactive</option>
                        <option value="1" @if($data->status==1) selected @endif>Active</option>
                    </select>
                </div>


               
                <button type="submit" class="float-right btn btn-outline-warning shadow-sm">Update <i class="fas fa-pen"></i></button>
              </form>
               
         </div>
       </div>
    </div>
 </div>

@endsection