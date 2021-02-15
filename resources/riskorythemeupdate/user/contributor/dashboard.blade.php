@extends('user.layout.contributor')
@section('SiteTitle','Dashboard || Riskory')
@section('content')

        <div class="pl-0 col-12 col-md-9 py-5 pr-0 pr-md-3 pr-lg-5">
          
            <!-- Browse By Industry Secion -->
            <div class="pl-0 row mb-5">
                <div class="col-sm-auto col-12">
                    <span class="bg-lblue font-eb font-18 py-3 px-2 px-md-5 rounded-right-xl shadow-sm"><img src="assets/images/Mask-Group-55.svg" class="align-bottom" width="35px">&nbsp;&nbsp;Browse By Industry</span>
                </div>
                <div class="col-sm-auto col-12 mt-3 mt-sm-0 text-muted">
                    <small><i class="fas fa-info-circle pr-2"></i><span >Based on <a target="_blank" href="https://en.wikipedia.org/wiki/Global_Industry_Classification_Standard">Global Industry Classification Standard</a></span></small>
                </div>
                <div class="col-sm-auto col-12 mt-3 mt-sm-0 ml-auto">
                    <button class="btn bg-red text-light br-7 font-12 text-capitalize font-weight-bold" title="View All Risk Controls" onclick="return parent.location='{{route('rc.all')}}';">All risk controls</button>
                </div>
            </div>
            <div class="row pl-3 pl-md-5">
                @foreach($industries as $ind)
                    <div class="col-12 col-sm-6 col-md-4 px-4 mb-3">
                        <div class="div-hover">
                            <p class="p-style mb-0 d-inline mr-3"><a href="{{route('byControl',['control'=>$ind,'type'=>$ind->type])}}">{{$ind->name}}</a> ({{$ind->rccontrols->whereNotIn('rc.status',['P','R'])->count()}})</p>

                            @if (!($ind->followedBy(auth()->user())))
                                <button class="btn-follow btn-follow-2" onclick="parent.location='{{route('control.follow',$ind->id)}}'">Follow</button>
                            @else
                                <form class="d-inline" action="{{route('control.unfollow',$ind->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-follow bg-dgray btn-follow-2" type="submit">Unfollow</button>
                                </form> 
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="ml-5 my-2">
                <a href="{{route('seeMore','industries')}}" class="btn bg-red text-white br-7 font-16 text-capitalize font-weight-bold">More Industries</a>
            </div>
            <!-- Browse By Business Process Section -->
            <div class="pl-0 row my-5">
                <div class="col-sm-auto col-12">
                    <span class="bg-lblue font-eb font-18 py-3 px-2 px-md-5 rounded-right-xl shadow-sm"><img src="assets/images/Mask Group 56.svg" class="align-bottom" width="35px">&nbsp;&nbsp;Browse By Business Processes</span>
                </div>
                <div class="col-sm-auto col-12 mt-3 mt-sm-0 text-muted">
                    <small><i class="fas fa-info-circle pr-2"></i><span >Based on <a target="_blank" href="https://www.apqc.org/resource-library/resource-listing/apqc-process-classification-framework-pcf-cross-industry-excel-7">APQC Process Classification Framework (PCF)</a></span></small>
                </div>
            </div>
            
            <div class="row pl-3 pl-md-5">
                @foreach($bprocesses as $bp)
                    <div class="col-12 col-sm-6 col-md-4 px-4 mb-3">
                        <div class="div-hover">
                            <p class="p-style mb-0 d-inline mr-3"><a href="{{route('byControl',['control'=>$bp,'type'=>$bp->type])}}">{{$bp->name}}</a> ({{$bp->rccontrols->whereNotIn('rc.status',['P','R'])->count()}})</p>

                            @if (!($bp->followedBy(auth()->user())))
                                <button class="btn-follow btn-follow-2" onclick="parent.location='{{route('control.follow',$bp->id)}}'">Follow</button>
                            @else
                                <form class="d-inline" action="{{route('control.unfollow',$bp->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-follow bg-dgray btn-follow-2" type="submit">Unfollow</button>
                                </form> 
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="ml-5 my-2">
                <a href="{{route('seeMore','bprocesses')}}" class="btn bg-red text-white br-7 font-16 text-capitalize font-weight-bold">More Business Processes</a>
            </div>
            <!-- Browse By Framework Section -->
            <div class="pl-0 row my-5 ">
                <div class="col-sm-auto col-12">
                    <span class="bg-lblue font-eb font-18 py-3 px-2 px-md-5 rounded-right-xl shadow-sm"><img src="assets/images/Mask Group 57.svg" class="align-bottom" width="35px">&nbsp;&nbsp;Browse By Frameworks</span>
                </div>
                <div class="col-sm-auto col-12 mt-3 mt-sm-0 text-muted">
                    {{-- <small class="mt-5"><i class="fas fa-info-circle pr-2"></i><span >So this is disclaimer here</span></small> --}}
                </div>
            </div>
            
            <div class="row pl-3 pl-md-5">
                @foreach($bframeworks as $bf)
                    <div class="col-12 col-sm-6 col-md-4 px-4 mb-3">
                        <div class="div-hover">
                            <p class="p-style mb-0 d-inline mr-3"><a href="{{route('byControl',['control'=>$bf,'type'=>$bf->type])}}">{{$bf->name}}</a> ({{$bf->rccontrols->whereNotIn('rc.status',['P','R'])->count()}})</p>

                            @if (!($bf->followedBy(auth()->user())))
                                <button class="btn-follow btn-follow-2" onclick="parent.location='{{route('control.follow',$bf->id)}}'">Follow</button>
                            @else
                                <form class="d-inline" action="{{route('control.unfollow',$bf->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-follow bg-dgray btn-follow-2" type="submit">Unfollow</button>
                                </form> 
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="ml-5 my-2">
                <a href="{{route('seeMore','bframeworks')}}" class="btn bg-red text-white br-7 font-16 text-capitalize font-weight-bold">More Business Frameworks</a>
            </div>
            <!-- Browse By Tags Section -->
            <div class="pl-0 col-12 my-5">
                <div class="d-lg-inline">
                    <span class="bg-lblue font-eb font-18 py-3 px-2 px-md-5 rounded-right-xl shadow-sm"><img src="assets/images/Icon awesome-tags.png" class="align-bottom" width="35px">&nbsp;&nbsp;Browse By Tags</span>
                </div>
                <div class="d-lg-inline text-muted">
                    {{-- <small><i class="fas fa-info-circle pr-2"></i><span >So this is disclaimer here</span></small> --}}
                </div>
            </div>
            
            <div class="row pl-3 pl-md-5">
                @foreach($tags as $tg)
                    <div class="col-12 col-sm-6 col-md-4 px-4 mb-3">
                        <div class="div-hover">
                            <p class="p-style mb-0 d-inline mr-3"><a href="{{route('byTag',['tag'=>$tg])}}">{{$tg->name}}</a> ({{$tg->rctags->whereNotIn('rc.status',['P','R'])->count()}})</p>

                            @if (!($tg->followedBy(auth()->user())))
                                <button class="btn-follow btn-follow-2" onclick="parent.location='{{route('tag.follow',$tg->id)}}'">Follow</button>
                            @else
                                <form class="d-inline" action="{{route('tag.unfollow',$tg->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-follow bg-dgray btn-follow-2" type="submit">Unfollow</button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="ml-5 my-2">
                <a href="{{route('seeMore','tags')}}" class="btn bg-red text-white br-7 font-16 text-capitalize font-weight-bold">More Tags</a>
            </div>
        </div>
        

@endsection