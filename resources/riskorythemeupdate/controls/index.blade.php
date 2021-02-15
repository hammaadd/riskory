@extends('layouts.adminApp')

@section('pageHeading')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{URL::route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">{{Str::ucfirst($prop->plural)}}</li>
    </ol>
  </nav>
@endsection

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data table of all {{$prop->plural}}. <a class="btn btn-outline-success" href="{{route('control.create',['type'=>$prop->type])}}">Add {{$prop->singular}} <i class="fas fa-plus"></i></a></h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped" id="controlTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Sr #</th>
              <th>Name of {{$prop->singular}}</th>
              <th>Parent</th>
              <th>Status</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
    @if($data)
        @foreach($data as $dat)
            <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$dat->name}}</td>
            @if(!empty($dat->parent_id))
            <td><a href="#" class="badge badge-info">{{$dat->parent->name}}</a></td>
            @else
            <td><a href="#" class="badge badge-danger">None</a></td>
            @endif
            
            @if($dat->status==1)
            <td><span class="badge badge-pill badge-success">Active</span></td>
            @elseif($dat->status==0)
            <td><span class="badge badge-pill badge-danger">Inactive</span></td>
            @endif
              <td class="text-center">
            <form action="{{route('control.destroy',['type'=>$prop->type,'id'=>$dat->id])}}" method="POST">
              <a class="btn btn-outline-primary btn-sm" href="{{route('control.show',['type'=>$prop->type,'id'=>$dat->id])}}" title="view"><i class="fas fa-eye"></i></a>
              <a class="btn btn-outline-warning btn-sm" href="{{route('control.edit',['type'=>$prop->type,'id'=>$dat->id])}}" title="edit"><i class="fas fa-pen"></i></a>
              
                @csrf
                @method('DELETE')
                
              <button class="btn btn-outline-danger btn-sm" title="delete" type="submit" onclick="return confirm('Do you really want to delete this {{$prop->singular}}?')"><i class="fas fa-trash"></i></button>
            </form>
            </td>
            </tr>
        @endforeach
    @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('#controlTable').DataTable();
  });

</script>

@endsection