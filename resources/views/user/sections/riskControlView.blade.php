<div class="col-12 bg-lgray br-7 border-0 box-shadow mb-4 rcreveal">
    <div class="row">
        {{-- Delete option for riskcontrol --}}
        @if($rc->user_id == Auth::id())
        <span class="ml-0 float-left">


        </span>

        @endif
        <span class="br-tr-7 bg-red text-white font-14 font-e px-3 py-1 ml-auto no-hover">
            @if($rc->status == 'U')
                <span>Under Discussion</span>
            @elseif($rc->status == 'P')
                <span>Pending</span>
            @elseif($rc->status == 'A')
                <span>Approved</span>
            @elseif($rc->status == 'R')
                <span>Rejected</span>
            @elseif($rc->status == 'O')
                <span>Our next bigthing</span>
            @endif
        </span>

    </div>

    <div class="row">
        <div class="col-12 col-sm-10 mb-2">

            <h5 class="rc-title mb-0">
                <a href="{{route('rc.view',$rc->id)}}" class="color-cc">{{$rc->title}}</a>
            </h5>
        </div>
        <div class="col-12 col-sm-6">
            <a href="{{route('visit.profile',$rc->user->slug)}}">
                <img src="@if($rc->user->avatar == 'images/avatars/default.png') https://ui-avatars.com/api/?background=random&name={{ str_replace(' ','+' ,$rc->user->name) }} @else {{asset('userAvat/'.$rc->user->avatar)}} @endif" class="rounded-circle shadow avatar-img">
            </a>
            <div class="d-inline-block pt-2 pl-2">
                <p class="p-style mb-0 font-14"><small class="font-14">Posted by: </small><a href="{{route('visit.profile',$rc->user->slug)}}" class="font-eb color-cc">{{$rc->user->name}}</a></p>
            </div>
        </div>
        <div class="col-12 col-sm-6 text-sm-right">
            <div class="rc-rating d-inline-block my-2" onclick="doRating({{$rc->id}})" id="showRating{{$rc->id}}">
                @include('user.sections.showRating')
            </div>
            <button class="btn bg-white color-r box-shadow br-7 font-12 ml-3 px-2 text-capitalize font-weight-bold btn-benchmark" onclick="parent.location='{{route('add.benchmark',$rc)}}'" data-toggle="tooltip" data-placement="top" title="Do benchmark">Add Benchmark</button>
        </div>
        <div class="col-12 my-2">
            <p class="p-style mb-0 font-16 text-black-50">{{strip_tags(Str::words($rc->objective,30))}} <a class="btn--readMore" href="{{route('rc.view',$rc->id)}}">Read more.</a></p>
        </div>
        <div class="col-12">
            <div class="row align-items-lg-end">
                <div class="col-12 col-lg-8 order-lg-2">
                    <div class="modal-icon mb-3 mb-lg-0 text-lg-right">
                        <div class="d-inline-block align-bottom">
                            <a class="box-shadow" href="#listModal" data-toggle="modal" id="listModalBtn{{$rc->id}}" data-rc="{{$rc->id}}" onclick="callModal(this.id)">
                                <i class="fas fa-list-ul"></i>
                                <span class="font-eb">{{Auth::user()->rlists->count()}}</span>
                            </a>
                        </div>
                        @include('user.inc.rcactions')
                        <div class="d-inline-block align-bottom">
                            <a class="box-shadow" href="javascript:void(0);" title="Views">
                                <i class="fas fa-eye"></i>
                                <span class="font-eb">{{views($rc)->count()}}</span>
                            </a>
                        </div>
                        <div class="d-inline-block align-bottom">
                            <div class="rc--share">
                                <a class="box-shadow" href="javascript:void(0);" title="Share">
                                    <i class="fas fa-share-alt"></i>
                                    <span class="font-eb">Share</span>
                                </a>
                    @php
                        $url = route('rc.view',$rc->id);
                        $rc_title = $rc->title;
                        $shareable = \App\Models\Shareable::where('type','twitter')->first();
                        $hashtags = json_decode($shareable->hashtags);
                        $people = json_decode($shareable->people);
                        $content = $shareable->content;
                        $content = str_replace("**RC_TITLE**",$rc->title,$content);
                        $content = str_replace("**RC_URL**",$url,$content);
                        $content = urlencode($content);

                        $string = 'https://twitter.com/intent/tweet?text=';
                        $string.=$content;
                        if($hashtags != null && count($hashtags) > 0 ){
                            $string.='&hashtags=';
                            $string.=implode(',',$hashtags);
                        }
                        if($people != null && count($people) > 0 ){
                            $string.='&related=';
                            $string.=implode(',',$people);
                        }

                    @endphp
                                <ul class="rc--share-menu">
                                    <li><a href="https://www.facebook.com/sharer/sharer.php?display=page&u={{route('rc.view',$rc->id)}}" target="_blank" class="box-shadow"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="{{$string}}" target="_blank" class="box-shadow"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="https://wa.me/?text={{route('rc.view',$rc->id)}}" target="_blank" class="box-shadow"><i class="fab fa-whatsapp"></i></a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-lg-4 pl-0 order-lg-1">
                 @if($rc->user->id == Auth::id())
                    <button class="btn-risk-edit delete-button d-inline" data-toggle="tooltip" data-placement="bottom" title="Delete risk control" data-rc="{{$rc->id}}">Delete <i class="fas fa-trash"></i></button>
                    <button class="btn-risk-edit d-inline" onclick="parent.location='{{route('rc.edit',$rc)}}'" data-toggle="tooltip" data-placement="bottom" title="Edit risk control">Edit</button>
                @endif
                    <div class="rc-date bg-red text-white font-14 px-3 py-1 d-inline-block br-bl-7 no-hover mt-1">Posted on: {{$rc->created_at->toDateString()}}</div>
                   

                </div>
            </div>
        </div>
    </div>
</div>

