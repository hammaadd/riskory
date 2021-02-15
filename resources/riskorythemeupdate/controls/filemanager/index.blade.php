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
    <h6 class="m-0 font-weight-bold text-primary">File Manager</h6>
    </div>
    <div class="card-body">
        <div style="height: 600px;">
            <div id="fm"></div>
        </div>
    </div>
  </div>

@endsection

@section('scripts')


@endsection