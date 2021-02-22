@extends('user.layout.contributor')
@section('SiteTitle','Dashboard || Riskory')
@section('content')

        <div class="col-12 col-md-9 py-5 pr-md-3 pr-lg-5">
          
            <!-- Browse By Industry Secion -->
            <div class="sect--title pl-md-5">
                <div class="row mb-4 mb-xl-5 align-items-lg-center">
                    <div class="col-xl-auto col-12 mb-3 mb-xl-0 ml-xl-auto order-xl-3 text-right">
                        <button class="btn bg-red text-light br-7 font-12 text-capitalize font-weight-bold" data-toggle="tooltip" title="View All Risk Controls" onclick="return parent.location='{{route('rc.all')}}';">All risk controls</button>
                    </div>
                    <div class="col-lg-auto col-12 px-0 pr-lg-3 order-xl-1 sect--title__col">
                        <p class="bg-lblue font-eb d-sm-inline-block font-18 py-2 pl-4 pl-md-5 pr-5 mb-0 rounded-right-xl shadow-sm"><img src="assets/images/Mask-Group-55.svg" class="align-bottom ml-3" width="35px">&nbsp;&nbsp;Browse By Industry</p>
                    </div>
                    <div class="col-lg-auto col-12 text-muted order-xl-2">
                        <small class="d-block py-3 px-2"><i class="fas fa-info-circle pr-2"></i><span >Based on <a target="_blank" href="https://en.wikipedia.org/wiki/Global_Industry_Classification_Standard">Global Industry Classification Standard</a></span></small>
                    </div>
                </div>
            </div>

            <div class="row pl-3 pl-md-5">
                @foreach($industries as $ind)
                    <div class="col-12 col-sm-6 col-lg-6 mb-2">
                        <div class="div-hover">
                            <p class="p-style mb-0 d-inline mr-3"><a href="{{route('byControl',['control'=>$ind,'type'=>$ind->type])}}" data-toggle="tooltip" title="{{$ind->name}}">{{Str::limit($ind->name,30)}}</a> ({{$ind->rccontrols->whereNotIn('rc.status',['P','R'])->count()}})</p>

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

            <div class="ml-4 ml-md-5 my-2">
                <a href="{{route('seeMore','industries')}}" class="btn bg-red text-white br-7 font-12 text-capitalize font-weight-bold" data-toggle="tooltip" title="Browse More Industries">More Industries</a>
            </div>
            
            <!-- Browse By Business Process Section -->
            <div class="sect--title pl-md-5">
                <div class="row my-4 my-xl-5 align-items-lg-center">
                    <div class="col-lg-auto col-12 px-0 pr-lg-3 sect--title__col">
                        <p class="bg-lblue font-eb d-sm-inline-block font-18 py-2 pl-4 pl-md-5 pr-5 mb-0 rounded-right-xl shadow-sm"><img src="assets/images/Mask Group 56.svg" class="align-bottom ml-3" width="35px">&nbsp;&nbsp;Browse By Business Processes</p>
                    </div>
                    <div class="col-lg-auto col-12 text-muted">
                        <small class="d-block py-3 px-2"><i class="fas fa-info-circle pr-2"></i><span >Based on <a target="_blank" href="https://www.apqc.org/resource-library/resource-listing/apqc-process-classification-framework-pcf-cross-industry-excel-7">APQC Process Classification Framework (PCF)</a></span></small>
                    </div>
                </div>
            </div>

            <div class="row pl-3 pl-md-5">
                @foreach($bprocesses as $bp)
                    <div class="col-12 col-sm-6 col-lg-6 mb-2">
                        <div class="div-hover">
                            <p class="p-style mb-0 d-inline mr-3"><a href="{{route('byControl',['control'=>$bp,'type'=>$bp->type])}}" data-toggle="tooltip" title="{{$bp->name}}">{{Str::limit($bp->name,30)}}</a> ({{$bp->rccontrols->whereNotIn('rc.status',['P','R'])->count()}})</p>

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
            <div class="ml-4 ml-md-5 my-2">
                <a href="{{route('seeMore','bprocesses')}}" class="btn bg-red text-white br-7 font-12 text-capitalize font-weight-bold" data-toggle="tooltip" title="Browse More Business Processes">More Business Processes</a>
            </div>
            <!-- Browse By Framework Section -->
            <div class="sect--title pl-md-5">
                <div class="row my-4 my-xl-5 align-items-lg-center">
                    <div class="col-lg-auto col-12 px-0 pr-lg-3 sect--title__col">
                        <p class="bg-lblue font-eb d-sm-inline-block font-18 py-2 pl-4 pl-md-5 pr-5 mb-0 rounded-right-xl shadow-sm"><img src="assets/images/Mask Group 57.svg" class="align-bottom ml-3" width="35px">&nbsp;&nbsp;Browse By Frameworks</p>
                    </div>
                    {{-- <div class="col-lg-auto col-12 text-muted">
                        <small class="d-block py-3 px-2"><i class="fas fa-info-circle pr-2"></i><span >So this is disclaimer here</span></small>
                    </div> --}}
                </div>
            </div>

            <div class="row pl-3 pl-md-5">
                @foreach($bframeworks as $bf)
                    <div class="col-12 col-sm-6 col-lg-6 mb-2">
                        <div class="div-hover">
                            <p class="p-style mb-0 d-inline mr-3"><a href="{{route('byControl',['control'=>$bf,'type'=>$bf->type])}}" data-toggle="tooltip" title="{{$bf->name}}">{{Str::limit($bf->name,30)}}</a> ({{$bf->rccontrols->whereNotIn('rc.status',['P','R'])->count()}})</p>

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
            <div class="ml-4 ml-md-5 my-2">
                <a href="{{route('seeMore','bframeworks')}}" class="btn bg-red text-white br-7 font-12 text-capitalize font-weight-bold" data-toggle="tooltip" title="Browse More Business Frameworks">More Business Frameworks</a>
            </div>
            <!-- Browse By Tags Section -->
            <div class="sect--title pl-md-5">
                <div class="row my-4 my-xl-5 align-items-lg-center">
                    <div class="col-lg-auto col-12 px-0 pr-lg-3 sect--title__col">
                        <p class="bg-lblue font-eb d-sm-inline-block font-18 py-2 pl-4 pl-md-5 pr-5 mb-0 rounded-right-xl shadow-sm"><img src="assets/images/Icon awesome-tags.png" class="align-bottom ml-3" width="35px">&nbsp;&nbsp;Browse By Tags</p>
                    </div>
                    {{-- <div class="col-lg-auto col-12 text-muted">
                        <small class="d-block py-3 px-2"><i class="fas fa-info-circle pr-2"></i><span >So this is disclaimer here</span></small>
                    </div> --}}
                </div>
            </div>
            
            <div class="row pl-3 pl-md-5">
                @foreach($tags as $tg)
                    <div class="col-12 col-sm-6 col-lg-6 mb-2">
                        <div class="div-hover">
                            <p class="p-style mb-0 d-inline mr-3"><a href="{{route('byTag',['tag'=>$tg])}}" data-toggle="tooltip" title="{{$tg->name}}">{{Str::limit($tg->name,30)}}</a> ({{$tg->rctags->whereNotIn('rc.status',['P','R'])->count()}})</p>

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
            <div class="ml-4 ml-md-5 my-2">
                <a href="{{route('seeMore','tags')}}" class="btn bg-red text-white br-7 font-12 text-capitalize font-weight-bold" data-toggle="tooltip" title="Browse More Tags">More Tags</a>
            </div>
        </div>
        

@endsection