@extends('layouts.adminApp')

@section('pageHeading')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{URL::route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{URL::route('adminProfile')}}">Profile</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit</li>
    </ol>
  </nav>
@endsection
@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-md-6">
     <div class="card shadow">
         <div class="card-header text-center">
         <span class="text-center">Update admin profile</span>
         </div>
         <div class="card-body">
         <form method="POST" action="{{URL::route('updateAdminProfile')}}">
            @csrf
                <div class="form-row">
                    <div class="col">
                        <label for="fname">Firstname</label>
                    <input type="text" class="form-control shadow-sm" placeholder="First name" name="fname" value="{{$user->fname}}">
                    </div>
                    <div class="col">
                        <label for="lname">Last name</label>
                      <input type="text" class="form-control shadow-sm" placeholder="Last name" name="lname" value="{{$user->lname}}">
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label for="username">Username</label>
                  <input type="text" class="form-control shadow-sm" id="username" name="username" value="{{$user->name}}" required>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label for="dob">Date of birth</label>
                      <input type="date" class="form-control shadow-sm" placeholder="Date of Birth" id="dob" name="dob" value="{{$user->dob}}">
                    </div>
                    <div class="col">
                        <label for="dob">Gender</label>
                      <select name="gender" id="gender" class="form-control shadow-sm">
                          <option value="Male" 
                        @if($user->gender == 'Male')
                            selected
                        @endif
                            >Male</option>
                          <option value="Female"
                          @if($user->gender == 'Female')
                          selected
                      @endif
                          >Female</option>
                          <option value="Other"
                          @if($user->gender == 'Other')
                          selected
                      @endif
                          >Other</option>
                      </select>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label for="country">Country</label>
                    <select name="country" id="country" class="form-control shadow-sm">
                        @foreach($countries as $country)
                    <option value="{{$country->id}}"  
                @if($country->id == $user->country->id)
                selected
                @endif
                        >{{$country->country}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="float-right btn btn-outline-secondary shadow-sm">Update</button>
              </form>
               
         </div>
       </div>
    </div>
 </div>

@endsection