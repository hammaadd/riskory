@extends('layouts.adminApp')

@section('pageHeading')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{URL::route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Business processes</li>
    </ol>
  </nav>
@endsection

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data table of all business processes. <a class="btn btn-outline-success" href="{{route('bprocess.create')}}">Add business process <i class="fas fa-plus"></i></a></h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped" id="bprocessTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Sr #</th>
              <th>Name Of B Process</th>
              <th>Parent</th>
              <th>Status</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
    @if($bprocesses)
        @foreach($bprocesses as $bp)
            <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$bp->name}}</td>
            @if(!empty($bp->parent_id))
            <td><a href="#" class="badge badge-info">{{$bp->parent->name}}</a></td>
            @else
            <td><a href="#" class="badge badge-danger">None</a></td>
            @endif
            
            @if($bp->status==1)
            <td><span class="badge badge-pill badge-success">Active</span></td>
            @elseif($bp->status==0)
            <td><span class="badge badge-pill badge-danger">Inactive</span></td>
            @endif
              <td class="text-center">
            <form action="{{route('bprocess.destroy',$bp->id)}}" method="POST">
              <a class="btn btn-outline-primary btn-sm" href="{{route('bprocess.show',$bp->id)}}" title="view"><i class="fas fa-eye"></i></a>
              <a class="btn btn-outline-warning btn-sm" href="{{route('bprocess.edit',$bp->id)}}" title="edit"><i class="fas fa-pen"></i></a>
              
                @csrf
                @method('DELETE')
                
              <button class="btn btn-outline-danger btn-sm" title="delete" type="submit" onclick="return confirm('Do you really want to delete this business process?')"><i class="fas fa-trash"></i></button>
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
    $('#bprocessTable').DataTable();
  });

</script>

@endsection