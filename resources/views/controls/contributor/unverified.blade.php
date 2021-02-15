@extends('layouts.adminApp')

@section('pageHeading')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{URL::route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Unverified users</li>
    </ol>
  </nav>
@endsection

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Datatable of unverified users.</h6>
    {{-- <a class="btn btn-outline-warning btn-sm" href="#">Deactive users</a>
    <a class="btn btn-outline-success btn-sm" href="#">Active users</a>
    <a class="btn btn-outline-danger btn-sm" href="#">Suspended users</a> --}}
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped" id="contributorTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Sr #</th>
              <th>Profile</th>
              
              
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
    @if($contributors)
        @foreach($contributors as $con)
            <tr>
            <td>{{$loop->iteration}}</td>
            <td class="">
              <div class="row">
                <div class="col-12">
                  <img src="
                    @if($con->avatar == 'images/avatars/default.png')
                    https://ui-avatars.com/api/?background=random&name={{ str_replace(' ','+' ,$con->name) }}
                    @else
                    {{asset('userAvat/'.$con->avatar)}}
                    @endif
                " alt="" class="rounded-circle img-fluid img-thumbnail" style="max-width: 30px; height:30px;">{{$con->name}}
                  <p><span><strong>Email: </strong></span>{{$con->email}}</p>
                  <p><span><strong>Registered on: </strong></span>{{$con->created_at}}</p>
                </div>
              </div>
              
              
            </td>
            <td>
            <div class="text-center">
              <a href="{{route('contributor.view',$con->id)}}" class="btn btn-outline-info btn-sm" title="View"><i class="fas fa-eye"></i></a>
                <button href="#" class="btn btn-outline-danger btn-sm" title="Delete" disabled><i class="fas fa-trash"></i></button>
                <button class="btn btn-outline-secondary btn-sm settingsBtn" title="User settings" data-id="{{$con->id}}"><i class="fas fa-cog"></i></button>
            </div>
            <form action="{{route('change.status.user',$con)}}" method="POST">
              @csrf
              @method('PUT')
                <div class="row mt-2">
                  
                  <div class="col-10">
                    <select class="form-control" name="status">
                      <option value="D" @if($con->status=='D') selected @endif>Deactive</option>
                      <option value="A" @if($con->status=='A') selected @endif>Active</option>
                      <option value="S" @if($con->status=='S') selected @endif>Suspend</option>
                    </select>
                  </div>
                  <div class="col-2 ">
                    <button class="btn btn-outline-success" type="submit"><i class="fas fa-arrow-right"></i></button>
                  </div>
                 
               
                </div>
                <hr>
                <div class="row mt-2 d-flex justify-content-center">
                    <a class="btn btn-success btn-sm" href="{{route('verify.contributor',$con)}}" title="Verify user email">Verify email</a>
                </div>
              </form>
                
                {{-- <a href="#" class="btn btn-outline-warning btn-sm" title="Update"><i class="fas fa-pen"></i></a> --}}
            </td>
            </tr>
        @endforeach
    @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div id="modalHere">

  </div>

@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('#contributorTable').DataTable();
  });

  $('.settingsBtn').on('click',function(){
      id = $(this).attr('data-id');
      _token = $('input[name="_token"]').val();
      $('#modalHere').html('');
      $.ajax({
        url:"{{route('fetch.contributor.settings')}}",
        method:"POST",
        data:{_token:_token,id:id},
        success:function(data){
          $('#modalHere').html(data);
          $('#settingsModal').modal('show');
        }

      });
     });

     function updateStatus(){
      user = $('input[name="user_id"]').val();
      rc_status = $('select[name="rc_status"]').val();
      $.ajax({
        url:"{{route('user.status.update')}}",
        method:"GET",
        data:{user:user,rc_status:rc_status},
        success:function(data){
          toastr[data.type](data.message);
          $('#settingsModal').modal('hide');
          
        }
      });
     }

</script>

@endsection