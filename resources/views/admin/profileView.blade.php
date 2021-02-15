@extends('layouts.adminApp')

@section('pageHeading')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{URL::route('admin')}}">Dashboard</a></li>
      <li class="breadcrumb-item active">Profile</li>
    </ol>
  </nav>
@endsection
@section('content')
    <div class="row d-flex justify-content-center">
       <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header">
            </span> Account settings<span> <button disabled class="btn btn-outline-primary float-right btn-sm shadow-sm" >Edit account <i class="fas fa-cog "></i></button>
            </div>
            <div class="card-body">
                <ul class="list-group">
                <li class="list-group-item"><strong>Username: </strong> {{$user->name}}</li>
                    <li class="list-group-item"><strong>Email: </strong> {{$user->email}}</li>
                <li class="list-group-item"><strong>Password: </strong> <a href="{{URL::route('editAdminPassword')}}">Change password</a></li>
                    
                    
                  </ul>
            </div>
          </div>
       </div>
    </div>

    <div class="row d-flex justify-content-center mt-3">
        <div class="col-md-6">
         <div class="card shadow">
             <div class="card-header">
             </span>Profile settings<span> 
             <a href="{{URL::route('admin.edit.avatar')}}" class="btn btn-outline-success btn-sm shadow-sm float-right mx-2">Update avatar <i class="fas fa-user-circle"></i></a>
               <a class="btn btn-outline-primary float-right btn-sm shadow-sm" href="{{ URL::route('editAdminProfile')}}">Edit profile <i class="fas fa-user"></i></a>
              
             </div>
             <div class="card-body">
                 <ul class="list-group">
                     <li class="list-group-item"><strong>Username: </strong>{{$user->name}}</li>
                     <li class="list-group-item"><strong>Firstname: </strong>{{$user->fname}}</li>
                     <li class="list-group-item"><strong>Lastname: </strong>{{$user->lname}}</li>
                     <li class="list-group-item"><strong>Joined at: </strong> {{$user->joined_at}}</li>
                     <li class="list-group-item"><strong>DOB: </strong> {{$user->dob}}</li>
                 <li class="list-group-item"><strong>Country: </strong> {{$user->country->country}}</li>
                 <li class="list-group-item"><strong>Gender: </strong>{{$user->gender}}</li>
                     
                   </ul>
             </div>
           </div>
        </div>
     </div>
@endsection

