@extends('user.layout.contributor')
@section('SiteTitle','Benchmark || Riskory')
@section('content')
<div class="pl-0 col-12 col-md-9 py-3 pr-0 pr-md-5">
    <div class="pl-0 col-12 col-sm-12 col-md-10 col-lg-7">
        <p class="bg-lblue font-eb font-18 py-2 px-5"><i><img src="{{asset('assets/images/Mask Group 16@2x.png')}}" class="align-bottom" width="35px"></i>&nbsp;&nbsp;Benchmarked by {{$ben->user->name}} 
        </p>
    </div>
    <div class="container">
        <div class="row px-0 px-md-2 px-lg-5 mx-0 mx-md-2 mx-lg-5 pt-2">
            <div class="col-12 bg-lgray br-20 mt-3 px-0 pt-4">
                <div class="col-12 my-3">
                    <li class="nav-link">
                        <img src="@if($ben->user->avatar == 'images/avatars/default.png')
                        https://ui-avatars.com/api/?background=random&name={{ str_replace(' ','+' ,$ben->user->name) }}
                        @else
                        {{asset('userAvat/'.$ben->user->avatar)}}
                        @endif
                        "  class="rounded-circle shadow avatar-img-lg bg-white align-top">
                        <div class="d-inline-block pt-1 pl-2">
                            <p class="p-style mb-0">Benchmarked by: <a href="{{route('visit.profile',$ben->user)}}" class="color-r">{{$ben->user->name}}</a></p>
                            <p class="p-style  font-14 mb-0"><span class="color-r">{{$ben->created_at}}</span></p>
                        </div>
                    </li>
                
           
                    
                    
                </div>
                {{-- <div class="col-6 my-3 d-flex justify-content-center">
                    <div class="bg-lblue p-2 badge color-r box-shadow"><h4>{{$ben->benchmark}}</h4></div>
                </div> --}}
                <div class="col-12  mx-auto">
                    <label class="px-3 py-1 my-3 bg-white font-eb box-shadow">Risk Control Number <span class="color-r">#00{{$ben->rc->id}}</span></label>
                    <br>
                    <label class="px-3 py-1 my-3 bg-white font-eb box-shadow">Result</label>
                    <p class="p-style px-3">This risk got {{ucfirst($ben->benchmark)}} by <a href="{{route('userProfile',$ben->user)}}" class="font-eb color-r">{{ucfirst($ben->user->name)}}</a>.</p>
                    
                    <label class="px-3 py-1 my-3 bg-white font-eb box-shadow">Description</label>
                    <p class="p-style px-3">{{ucfirst($ben->description)}}</p>

                    <label class="px-3 py-1 my-3 bg-white font-eb box-shadow">Reason</label>
                    <p class="p-style px-3">{{ucfirst($ben->reason)}}</p>

                    <label class="px-3 py-1 my-3 bg-white font-eb box-shadow">Response</label>
                    <p class="p-style px-3">{{ucfirst($ben->response)}}</p>

                    <label class="px-3 py-1 my-3 bg-white font-eb box-shadow">Benchmarked on</label>
                    <p class="p-style px-3">{{ucfirst($ben->created_at)}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

