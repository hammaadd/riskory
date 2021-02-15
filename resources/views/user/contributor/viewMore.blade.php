@extends('user.layout.contributor')
@section('SiteTitle','Dashboard || Riskory')
@section('content')
<div class="pl-0 col-12 col-md-9 py-5 pr-0 pr-md-3 pr-lg-5">
    <!-- Browse By Industry Secion -->
    <div class="row mx-0 mb-4">
        <div class="pl-0 col-12 col-sm-auto">
            <p class="bg-lblue font-eb font-18 py-2 px-5 rounded-right-xl shadow-sm"><i><img src="{{asset($icon)}}" class="align-bottom" width="35px"></i>&nbsp;&nbsp;Browse By {{$name}}</p>
        </div>
    </div>
 
        @livewire('categories',['data'=>$data,'req'=>$req,'page'=>1,'perPage'=>15])
</div>
@endsection