@extends('layouts.adminApp')

@section('pageHeading')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{URL::route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Business framework</li>
    </ol>
  </nav>
@endsection

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data table of all business frameworks. <a class="btn btn-outline-success" href="{{route('bframework.create')}}">Add business framework <i class="fas fa-plus"></i></a></h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped" id="bframeworkTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Sr #</th>
              <th>Name Of B Framework</th>
              <th>Parent</th>
              <th>Status</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
    @if($bframeworks)
        @foreach($bframeworks as $bf)
            <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$bf->name}}</td>
            @if(!empty($bf->parent_id))
            <td><a href="#" class="badge badge-info">{{$bf->parent->name}}</a></td>
            @else
            <td><a href="#" class="badge badge-danger">None</a></td>
            @endif
            
            @if($bf->status==1)
            <td><span class="badge badge-pill badge-success">Active</span></td>
            @elseif($bf->status==0)
            <td><span class="badge badge-pill badge-danger">Inactive</span></td>
            @endif
              <td class="text-center">
            <form action="{{route('bframework.destroy',$bf->id)}}" method="POST">
              <a class="btn btn-outline-primary btn-sm" href="{{route('bframework.show',$bf->id)}}" title="view"><i class="fas fa-eye"></i></a>
              <a class="btn btn-outline-warning btn-sm" href="{{route('bframework.edit',$bf->id)}}" title="edit"><i class="fas fa-pen"></i></a>
              
                @csrf
                @method('DELETE')
                
              <button class="btn btn-outline-danger btn-sm" title="delete" type="submit" onclick="return confirm('Do you really want to delete this business framework?')"><i class="fas fa-trash"></i></button>
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
    $('#bframeworkTable').DataTable();
  });

</script>

@endsection