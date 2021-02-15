@extends('layouts.adminApp')

@section('pageHeading')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{URL::route('admin')}}">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Feedbacks</li>
    </ol>
  </nav>
@endsection
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data table of all feedbacks.</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped" id="feedbackTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Sr #</th>
              <th>From</th>
              <th>Type</th>
              <th>Feedback</th>
            </tr>
          </thead>
          <tbody>
@if($feedback)
    @foreach($feedback as $feed)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$feed->user_id}}</td>
                <td><span class="badge badge-primary">{{$feed->type}}</span></td>
                <td>
                   {{$feed->feedback}} 
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
    $('#feedbackTable').DataTable();
  });

</script>

@endsection