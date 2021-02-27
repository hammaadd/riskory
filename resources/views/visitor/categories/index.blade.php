@extends('user.layout.visitor')
@section('SiteTitle','Categories || Riskory')
@section('content')
<style>
    html,body {
        min-height: 100%;
        height: 100%;
    }
    .cover-container {
        height: 100%;
    }
    </style>
    <main role="main" class="py-2">
        <div class="pl-0 col-12 col-md-12 py-5 pr-0 pr-md-3 pr-lg-5">

            <!-- Browse By Industry Secion -->
            <div class="sect--title pl-3 pl-md-5">
                <div class="row mb-4 mb-xl-5 align-items-md-center">
                    <div class="col-md-auto col-12 mb-3 mb-md-0 ml-md-auto order-md-3 text-right">
                        <button class="btn bg-red text-light br-7 font-12 text-capitalize font-weight-bold" title="View All Risk Controls" onclick="return parent.location='{{route('rc.all.public')}}';">All risk controls</button>
                    </div>
                    <div class="col-md-auto col-12 px-0 pr-md-3 order-md-1 sect--title__col">
                        <p class="bg-lblue font-eb d-sm-inline-block font-18 ml-3 py-2 pl-4 pl-md-5 pr-5 mb-0 rounded-right-xl shadow-sm"><img src="assets/images/Mask-Group-55.svg" class="align-bottom" width="35px">&nbsp;&nbsp;Browse By Industry</p>
                    </div>
                    <div class="col-md-auto col-12 text-muted order-md-2">
                        <small class="d-block py-3 px-2"><i class="fas fa-info-circle pr-2"></i><span >Based on <a target="_blank" href="https://en.wikipedia.org/wiki/Global_Industry_Classification_Standard">Global Industry Classification Standard</a></span></small>
                    </div>
                </div>
            </div>

            <div class="row pl-3 pl-md-5">
                @foreach($industries as $ind)
                    <div class="col-12 col-sm-6 col-md-4 px-4 mb-2">
                        <div class="div-hover">
                            <p class="p-style mb-0 d-inline mr-3"><a href="{{route('byControlPublic',['control'=>$ind,'type'=>$ind->type])}}">{{$ind->name}}</a> ({{$ind->rccontrols->whereNotIn('rc.status',['P','R'])->count()}})</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="ml-4 ml-md-5 my-2">
                <a href="{{route('publicSeeMore','industries')}}" class="btn bg-red text-light br-7 font-12 text-capitalize font-weight-bold">More Industries</a>
            </div>

            <div class="sect--title pl-3 pl-md-5">
                <div class="row my-4 my-xl-5 align-items-md-center">
                    <div class="col-md-auto col-12 px-0 pr-md-3 order-xl-1 sect--title__col">
                        <p class="bg-lblue font-eb d-sm-inline-block font-18 ml-3 py-2 pl-4 pl-md-5 pr-5 mb-0 rounded-right-xl shadow-sm"><img src="assets/images/Mask Group 56.svg" class="align-bottom" width="35px">&nbsp;&nbsp;Browse By Business Processes</p>
                    </div>
                    <div class="col-md-auto col-12 text-muted order-xl-2">
                        <small class="d-block py-3 px-2"><i class="fas fa-info-circle pr-2"></i><span >Based on <a target="_blank" href="https://www.apqc.org/resource-library/resource-listing/apqc-process-classification-framework-pcf-cross-industry-excel-7">APQC Process Classification Framework (PCF)</a></span></small>
                    </div>
                </div>
            </div>

            <div class="row pl-3 pl-md-5">
                @foreach($bprocesses as $bp)
                    <div class="col-12 col-sm-6 col-md-4 px-4 mb-2">
                        <div class="div-hover">
                            <p class="p-style mb-0 d-inline mr-3"><a href="{{route('byControlPublic',['control'=>$bp,'type'=>$bp->type])}}">{{$bp->name}}</a> ({{$bp->rccontrols->whereNotIn('rc.status',['P','R'])->count()}})</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="ml-4 ml-md-5 my-2">
                <a href="{{route('publicSeeMore','bprocesses')}}" class="btn bg-red text-light br-7 font-12 text-capitalize font-weight-bold">More Business Processes</a>
            </div>
            <!-- Browse By Framework Section -->
            <div class="sect--title pl-3 pl-md-5">
                <div class="row my-4 my-xl-5 align-items-md-center">
                    <div class="col-md-auto col-12 px-0 pr-md-3 order-xl-1 sect--title__col">
                        <p class="bg-lblue font-eb d-sm-inline-block font-18 ml-3 py-2 pl-4 pl-md-5 pr-5 mb-0 rounded-right-xl shadow-sm"><img src="assets/images/Mask Group 57.svg" class="align-bottom" width="35px">&nbsp;&nbsp;Browse By Frameworks</p>
                    </div>
                    {{-- <div class="col-md-auto col-12 text-muted order-xl-2">
                        <small class="d-block py-3 px-2"><i class="fas fa-info-circle pr-2"></i><span >So this is disclaimer here</span></small>
                    </div> --}}
                </div>
            </div>

            <div class="row pl-3 pl-md-5">
                @foreach($bframeworks as $bf)
                    <div class="col-12 col-sm-6 col-md-4 px-4 mb-2">
                        <div class="div-hover">
                            <p class="p-style mb-0 d-inline mr-3"><a href="{{route('byControlPublic',['control'=>$bf,'type'=>$bf->type])}}">{{$bf->name}}</a> ({{$bf->rccontrols->whereNotIn('rc.status',['P','R'])->count()}})</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="ml-4 ml-md-5 my-2">
                <a href="{{route('publicSeeMore','bframeworks')}}" class="btn bg-red text-light br-7 font-12 text-capitalize font-weight-bold">More Business Frameworks</a>
            </div>

        </div>
    </main>
@endsection
