@extends('layouts.adminApp')

@section('pageHeading')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{URL::route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Contact submissions</li>
    </ol>
  </nav>
@endsection

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data table of all submissions.</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped" id="contactTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Sr #</th>
              <th>Name</th>
              <th>Email</th>
              <th>Type</th>
              <th>Message</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
    @if($contact)
        @foreach($contact as $con)
            <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$con->name}}</td>
            <td><a href="#" class="badge badge-info">{{$con->email}}</a></td>
            <td>{{$con->type}}</td>
            <td>
              <a class="btn btn-outline-primary btn-sm" data-toggle="collapse" href="#multiCollapseExample{{$loop->iteration}}" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Read More ..</a>
            <div class="collapse multi-collapse my-3" id="multiCollapseExample{{$loop->iteration}}">
                <div class="card card-body">
                  {{$con->message}}
                </div>
              </div>
              </td>           
            <td class="text-center">
            <form action="{{route('contact.destroy',$con->id)}}" method="POST">
                @csrf
                @method('DELETE')
                
              <button class="btn btn-outline-danger btn-sm" title="delete" type="submit" onclick="return confirm('Do you really want to delete this contact?')"><i class="fas fa-trash"></i></button>
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
    $('#contactTable').DataTable();
  });

</script>

@endsection