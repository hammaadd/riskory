@extends('layouts.adminApp')

@section('pageHeading')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{URL::route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Riskcontrols</li>
    </ol>
  </nav>
@endsection

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data table of pending riskcontrols.</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover table-borderless" id="rctable" width="100%" cellspacing="0">
          <thead>
            <tr>
              {{-- <th>Sr #</th> --}}
              <th>Riskcontrol</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
@foreach($rcs as $rc)
            <tr >
            {{-- <td>{{$loop->iteration}}</td> --}}
            <td>
        <div class="card shadow" id="rc{{$rc->id}}">
          <div class="card-body">
            <div class="row">
                <div class="col-12"><h4><strong>Title:</strong> {{$rc->title}}</h4></div>
                
            </div>
            <div class="col-12"><p><strong>Objective Summary: </strong>{{$rc->obj_summary}}</p></div>
            <div class="col-12">
                
                <?php $conts = $rc->controls->where('type','industry');?>
                @if($conts)
                <small><strong>Industries</strong></small><br>
                    @foreach($conts as $con)
                    <span class="badge badge-primary">{{$con->control->name}}</span>
                    @endforeach
                @endif
            </div>
            <div class="col-12">
                
                <?php $conts = $rc->controls->where('type','bframework');?>
                @if($conts)
                <small><strong>Business frameworks</strong></small><br>
                    @foreach($conts as $con)
                    <span class="badge badge-primary">{{$con->control->name}}</span>
                    @endforeach
                @endif
            </div>
            <div class="col-12">
                
                <?php $conts = $rc->controls->where('type','bprocess');?>
                @if($conts)
                <small><strong>Business processs</strong></small><br>
                    @foreach($conts as $con)
                    <span class="badge badge-primary">{{$con->control->name}}</span>
                    @endforeach
                @endif
            </div>
            <hr>
            <div class="col-12">
              <span class="badge badge-success">{{views($rc)->count()}} Views</span>
              <a class="badge badge-secondary" href="{{route('contributor.view',$rc->user->id)}}">Created by: {{$rc->user->name}}</a>
              <span class="badge badge-secondary">Posted on: {{$rc->created_at}}</span>
              <span class="badge badge-danger"> Status:{{$rc->status}}</span>
              <span class="badge badge-secondary">Last updated at: {{$rc->updated_at}}</span>
            </div>
          </div>
        </div>
            </td>
            <td>
              <form action="{{route('update.rc.status',$rc)}}" method="POST">
                @csrf
                @method('PUT')
                <label for="status">Update Status</label>
               
                    <select name="status" id="" class="form-control">
                      <option value="U" class="text-success">Under discussion</option>
                      <option value="A" class="text-success">Approved</option>
                      <option value="R" class="text-danger">Rejected</option>
                      <option value="O" class="text-dark">Our next big thing</option>
                      <option value="P" selected class="text-warning">Pending</option>
                    </select>
                
                    <button type="submit" class="btn btn-block btn-secondary mt-1 btn-sm"  >Update Status <i class="fas fa-pen"></i></button>
                 
                
              </form>
            </td>
            </tr>

@endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('#rctable').DataTable();

  });

</script>

@endsection