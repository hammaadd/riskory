@extends('user.layout.visitor')
@section('SiteTitle','About us || Riskory')
@section('content')
<main role="main" class="inner cover pb-5 pb-sm-5">
	<!-- <div class="d-none"> -->
        <div class="container-fluid">
            <div class="row">
            	<div class="pl-0 col-12 col-md-9 pt-4 pr-0 pr-md-5">
                    <div class="pl-0 col-12 col-sm-10 col-md-7 col-lg-5">
                        <p class="bg-lblue font-eb font-18 py-2 px-2 px-md-5 rounded-right-xl"><i><img src="//s.svgbox.net/social.svg?fill=E90000&amp;ic=myspace" class="align-bottom" width="35px"></i>&nbsp;&nbsp;{{$con->heading}}</p>
                    </div>
            	</div>

                <div class="col-12 pt-5 px-0">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-md-8">
                                <div class="bg-lgray br-7 mt-3 box-shadow">
                                    <div class="col-12 px-0">
                                        <div class="row">
                                            <div class="col-12 px-0">
                                                <span class="br-tl-20 bg-white font-16 font-eb color-r px-3 py-1">About us</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mx-auto my-3 pb-4">
                                        <div class="p-style mb-4">{!!$con->content!!}</div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12 col-md-4"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- </div>

    <div class="container">
        <div class="text-center">
        <h1 class="font-eb color-r">{{$con->heading}}</h1>
        <p class="p-style">{!!$con->content!!}</p>
        </div>
    </div> -->
</main>
@endsection