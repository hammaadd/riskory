@extends('layouts.adminApp')

@section('pageHeading')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{URL::route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('contributor.index')}}">Contributors</a></li>
      <li class="breadcrumb-item active" aria-current="page">View</li>
    </ol>
  </nav>
@endsection
@section('content')
<div class="row d-flex justify-content-center mb-4">
  <div class="col-md-12 col-sm-12 col-lg-12">
    <div class="card shadow border-left-primary">
      <div class="card-header text-center">
        User information
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-3 d-flex align-items-center justify-content-center">
            
              <img src="
              @if($contributor->avatar == 'images/avatars/default.png')
              https://ui-avatars.com/api/?background=random&name={{ str_replace(' ','+' ,$contributor->name) }}
              @else
              {{asset('userAvat/'.$contributor->avatar)}}
              @endif
              " alt="" class="rounded-circle img-fluid img-thumbnail" style="width:30vh; max-width: 40vh; height:30vh; object-fit:contain;">
          </div>
          <div class="col-md-9">
            <table class="table table-hover w-100 table-bordered">
              <tbody>
                <tr>
                  <th>Username:</th>
                  <td>{{$contributor->name}}</td>
                  <th>Email:</th>
                  <td>{{$contributor->email}}</td>
                </tr>
                <tr>
                  <th>Joined:</th>
                  <td>{{$contributor->created_at}}</td>
                  <th>Roles: </th>
                  <td>@foreach($contributor->roles as $role)
                    {{$role->name}} || 
                @endforeach</td>
                </tr>
                <tr>
                  <th>Firstname:</th>
                  <td>{{$contributor->fname}}</td>
                  <th>Lastname:</th>
                  <td>{{$contributor->lname}}</td>
                </tr>
                <tr>
                  <th>Date of birth:</th>
                  <td>{{$contributor->dob}}</td>
                  <th>Gender:</th>
                  <td>{{$contributor->gender}}</td>
                  
                </tr>
                <tr >
                  <th colspan="2">Country:</th>
                  <td colspan="2">@if(isset($contributor->country->country)){{$contributor->country->country}}@endif</td>
                </tr>
                <tr>
                  <th>About:</th>
                  <td colspan="3">{{$contributor->about}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- Riskcontrols of user --}}

<div class="row d-flex justify-content-center mb-4" id="riskcontrols">
  <div class="col-md-12 col-sm-12 col-lg-12">
    <div class="card shadow border-left-primary">
      <div class="card-header text-center">
        Risk controls by user <small>Total ({{$contributor->rcs->count()}})</small>
      </div>
      <div class="card-body">
        @include('controls.contributor.incRc')
      </div>
    </div>
  </div>
</div>

<div class="row d-flex justify-content-center mb-4">
  <div class="col-md-3 col-sm-12 col-lg-3">
    <div class="card shadow border-left-primary">
      <div class="card-header text-center">
        Following
      </div>
      <div class="card-body">
        <h1 class="text-center">{{$contributor->userFollowing->count()}}</h1>
      </div>
    </div>
  </div>

  <div class="col-md-3 col-sm-12 col-lg-3">
    <div class="card shadow border-left-primary">
      <div class="card-header text-center">
        Followers
      </div>
      <div class="card-body">
        <h1 class="text-center">{{$contributor->userFollowers->count()}}</h1>
      </div>
    </div>
  </div>
  
  <div class="col-md-3 col-sm-12 col-lg-3">
    <div class="card shadow border-left-primary">
      <div class="card-header text-center">
        Likes
      </div>
      <div class="card-body">
        <h1 class="text-center">{{$contributor->likes->count()}}</h1>
      </div>
    </div>
  </div>

  <div class="col-md-3 col-sm-12 col-lg-3">
    <div class="card shadow border-left-primary">
      <div class="card-header text-center">
        Bookmarks
      </div>
      <div class="card-body">
        <h1 class="text-center">{{$contributor->bookmarks->count()}}</h1>
      </div>
    </div>
  </div>
</div>


<div class="row d-flex justify-content-center mb-4">
  <div class="col-md-3 col-sm-12 col-lg-3">
    <div class="card shadow border-left-primary">
      <div class="card-header text-center">
        Categories Following
      </div>
      <div class="card-body">
        <ul>
          @foreach($contributor->followControls as $con)
          <li>{{$con->control->name}} <small></small></li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>

  <div class="col-md-3 col-sm-12 col-lg-3">
    <div class="card shadow border-left-primary">
      <div class="card-header text-center">
        Tags Following
      </div>
      <div class="card-body">
        <ul>
          @foreach($contributor->followTags as $tg)
          <li>{{$tg->tag->name}} <small></small></li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
  
</div>







@endsection
@section('scripts')
<script>
  $(document).on('click', '.page-link', function(event){
        event.preventDefault(); 
        $(this).attr('href',$(this).attr('href')+'#riskcontrols');
        window.location = $(this).attr('href');
     });

    
</script>
@endsection