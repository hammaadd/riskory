@extends('user.layout.contributor')
@section('SiteTitle','Dashboard || Riskory')
@section('content')
<div class="pl-0 col-12 col-md-9 py-5 pr-0 pr-md-3 pr-lg-5">
    <!-- Browse By Industry Secion -->
    <div class="sect--title pl-3 pl-md-5">
        <div class="row mb-4">
            <div class="col-sm-auto col-12 px-0 pr-md-3 sect--title__col">
                <p class="bg-lblue font-eb d-sm-inline-block font-18 ml-3 py-2 pl-4 pl-md-5 pr-5 mb-0 rounded-right-xl shadow-sm"><i><img src="{{asset($icon)}}" class="align-bottom" width="35px"></i>&nbsp;&nbsp;Browse By {{$name}}</p>
            </div>
        </div>
    </div>

    @livewire('categories',['data'=>$data,'req'=>$req,'page'=>1,'perPage'=>16])

    {{-- <div class="row">
        
            <div class="col-12 col-sm-6 col-lg-6 px-3 mb-2">
                <div class="div-hover">
                    <p class="p-style mb-0 d-inline mr-3"><a href="#collapseExample" data-toggle="collapse"><i class="fas fa-caret-down"></i>  </a><a href="#" data-toggle="tooltip" title="">Checking the category</a></p>

                   
                        <button class="btn-follow btn-follow-2">Follow</button>
                   
                  
                </div>
                <div class="collapse" id="collapseExample">

                </div>
            </div>
           
        </div> --}}
</div>
@endsection