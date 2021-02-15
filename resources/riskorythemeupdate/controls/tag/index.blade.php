@extends('layouts.adminApp')

@section('pageHeading')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{URL::route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Tags</li>
    </ol>
  </nav>
@endsection

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data table of all tags. <a class="btn btn-outline-success" href="{{route('tag.create')}}">Add tag <i class="fas fa-plus"></i></a></h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped" id="tagsTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Sr #</th>
              <th>Name of tag</th>
              <th>Created By</th>
              <th>Status</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
    @if($tags)
        @foreach($tags as $tg)
            <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$tg->name}}</td>
            <td><a href="#" class="badge badge-info">{{$tg->user->name}}</a></td>

            @if($tg->status==1)
            <td><span class="badge badge-pill badge-success">Active</span></td>
            @elseif($tg->status==0)
            <td><span class="badge badge-pill badge-danger">Inactive</span></td>
            @endif
              <td class="text-center">
            <form action="{{route('tag.destroy',$tg->id)}}" method="POST">
              <a class="btn btn-outline-primary btn-sm" href="{{route('tag.show',$tg->id)}}" title="view"><i class="fas fa-eye"></i></a>
              <a class="btn btn-outline-warning btn-sm" href="{{route('tag.edit',$tg->id)}}" title="edit"><i class="fas fa-pen"></i></a>
              
                @csrf
                @method('DELETE')
                
              <button class="btn btn-outline-danger btn-sm" title="delete" type="submit" onclick="return confirm('Do you really want to delete this tag?')"><i class="fas fa-trash"></i></button>
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
    $('#tagsTable').DataTable();
  });

</script>

@endsection