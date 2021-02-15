@extends('layouts.adminApp')

@section('pageHeading')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{URL::route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Content Management</li>
    </ol>
  </nav>
@endsection

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data table of all contents.</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped" id="contentTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Sr #</th>
              <th>Key</th>
              <th>Heading</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
    @if($contents)
        @foreach($contents as $con)
            <tr>
            <td>{{$loop->iteration}}</td>
            <td><a href="#" class="badge badge-info">{{$con->key}}</a></td>
            <td>{{$con->heading}}</td>
           
           
              <td class="text-center">
              <a class="btn btn-outline-warning btn-sm" href="{{route('content.edit',$con->id)}}" title="edit"><i class="fas fa-pen"></i></a>
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
    $('#contentTable').DataTable();
  });

</script>

@endsection