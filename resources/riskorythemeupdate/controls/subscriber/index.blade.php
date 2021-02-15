@extends('layouts.adminApp')

@section('pageHeading')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{URL::route('admin')}}">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Suscribers</li>
    </ol>
  </nav>
@endsection
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data table of all subscribers.</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped" id="subscriberTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Sr #</th>
              <th>Email</th>
              <th>Received On</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
@if($subs)
    @foreach($subs as $sub)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$sub->email}}</td>
                <td>{{$sub->created_at}}</td>
                <td class="d-flex justify-content-center">
                    <form action="{{route('destroy.subscriber',$sub)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" title="Delete subscriber"><i class="fas fa-trash"></i></button>
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
    $('#subscriberTable').DataTable();
  });

</script>

@endsection