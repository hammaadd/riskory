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

    @livewire('categories',['data'=>$data,'req'=>$req,'page'=>1,'perPage'=>15])
</div>
@endsection