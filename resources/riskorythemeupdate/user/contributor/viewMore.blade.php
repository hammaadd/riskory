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

        <div class="row pl-3 pl-md-5 pt-3">
            @foreach($data as $dat)
                <div class="col-12 col-sm-6 col-md-4 col-lg-4 px-4 mb-3">
                    <div class="div-hover">
                        <p class="p-style mb-0 d-inline mr-3"><a href="{{route('byControl',['control'=>$dat,'type'=>$dat->type])}}">{{$dat->name}}</a> ({{$dat->rccontrols->whereNotIn('rc.status',['P','R'])->count()}})</p>

                        @if (!($dat->followedBy(auth()->user())))
                            <button class="btn-follow btn-follow-2" onclick="parent.location='{{route('control.follow',$dat->id)}}'">Follow</button>
                        @else
                            <form class="d-inline" action="{{route('control.unfollow',$dat->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn-follow bg-dgray btn-follow-2" type="submit">Unfollow</button>
                            </form> 
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection