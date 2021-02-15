@extends('user.layout.contributor')
@section('SiteTitle','Edit profile || Riskory')
@section('content')
<div class="pl-0 col-12 col-md-9 py-5 pr-0 pr-md-5">

    <div class="row pt-4 mx-0 mb-3">
        <div class="pl-0 col-12 col-sm-auto">
            <p class="bg-lblue font-eb font-18 py-2 px-5 mb-0 rounded-right-xl shadow-sm"><i><img src="https://s.svgbox.net/hero-outline.svg?ic=pencil-alt&fill=E90000" class="align-bottom" width="35px"></i>&nbsp;&nbsp;Edit User Profile</p>
        </div>
    </div>

    <div class="container">
        <div class="row px-0 px-md-2 px-lg-5 mx-0 mx-md-2 mx-lg-5 pt-4">
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
    </div>
</div>
@endsection