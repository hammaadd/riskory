@extends('user.layout.contributor')
@section('SiteTitle','Edit profile || Riskory')
@section('content')
<div class="col-12 col-md-9 px-md-0 py-5">

    <div class="sect--title pl-sm-3 px-md-5">
        <div class="row mb-4 mb-xl-5 align-items-sm-center">
            <div class="col-sm-auto col-12 px-0 pr-lg-3 sect--title__col">
                <p class="bg-lblue font-eb d-sm-inline-block font-18 ml-3 ml-sm-0 ml-md-3 py-2 pl-3 pl-md-5 pr-5 mb-0 rounded-right-xl shadow-sm"><i><img src="https://s.svgbox.net/hero-outline.svg?ic=pencil-alt&fill=E90000" class="align-bottom" width="35px"></i>&nbsp;&nbsp;Edit User Profile</p>
            </div>
        </div>
    </div>

    <!-- <div class="container"> -->
        <div class="row px-xl-5 mx-0 mx-md-5 mb-4">
            <div class="col-12 bg-lgray br-7 mt-3 px-0 box-shadow">
                <div class="col-12 pt-5 pb-2">
                    <form id="msform" role="form" method="POST" action="{{route('updateProfile')}}" class="create-risk-form risk-form px-3">
                        @csrf
                        <fieldset id="firstfieldset" class="form-group">
                            <div class="mb-4">
                                <label class="font-eb font-14 mb-1">Username</label>
                                <input type="text" name="username" value="{{$user->name}}" class="form-control br-10 box-shadow border-0 font-14 font-e color-dg @error('username') is-invalid @enderror" placeholder="Enter the username to display everywhere" required>
                                {{-- <small id="title" class="form-text text-muted ml-3">Short descriptive of the Risk Control</small> --}}
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-4">
                                        <label class="font-eb font-14 mb-1">Firstname</label>
                                        <input type="text" name="fname" value="{{$user->fname}}" class="form-control br-10 box-shadow border-0 font-14 font-e color-dg @error('fname') is-invalid @enderror" placeholder="Your firstname" required>
                                        @error('fname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-4">
                                        <label class="font-eb font-14 mb-1">Lastname</label>
                                        <input type="text" name="lname" value="{{$user->lname}}" class="form-control br-10 box-shadow border-0 font-14 font-e color-dg @error('lname') is-invalid @enderror" placeholder="Your lastname" required>
                                        @error('lname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="font-eb font-14 mb-1">About</label>
                                <textarea name="about" id="about" class="form-control br-10 box-shadow border-0 font-14 font-e color-dg @error('about') is-invalid @enderror" cols="30" rows="5">{{$user->about}}</textarea>
                                @error('about')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-4">
                                        <label class="font-eb font-14 mb-1">Date of birth</label>
                                        <input type="date" name="dob" value="{{$user->dob}}" min='1899-01-01' max='2011-01-01' required class="form-control br-10 box-shadow border-0 font-14 font-e color-dg @error('dob') is-invalid @enderror" placeholder="Enter the username to display everywhere" required>

                                        @error('dob')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="mb-4">
                                        <label class="font-eb font-14 mb-1" for="country">Country</label>
                                        <select name="country" id="country" class="form-control br-10 box-shadow border-0 font-14 font-e color-dg">
                                            @foreach($countries as $cn)
                                                <option value="{{$cn->id}}" @if($cn->id == $user->country_id) selected @endif
                                                >{{$cn->country}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="font-eb font-14 mb-1">Gender</label>
                                <select name="gender" id="gender" class="form-control br-10 box-shadow border-0 font-14 font-e color-dg">
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
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-4 text-right">
                                <button type="button" onclick="return parent.location='{{route('userProfile')}}'" class="btn-cancel mr-4 py-2 px-5">Back</button>
                                <button type="submit" class="btn-create py-2 px-3">Update profile</button>
                            </div>
                        </fieldset>
                    </form> 
                </div>
            </div>
        </div>
    <!-- </div> -->
</div>
@endsection