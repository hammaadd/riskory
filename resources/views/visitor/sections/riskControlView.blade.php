<div class="col-12 bg-lgray br-7 border-0 box-shadow mt-4 mb-4 rcreveal">
    <div class="row">
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
            <a href="{{route('visit.profile',$rc->user)}}">
                <img src="@if($rc->user->avatar == 'images/avatars/default.png') https://ui-avatars.com/api/?background=random&name={{ str_replace(' ','+' ,$rc->user->name) }} @else {{asset('userAvat/'.$rc->user->avatar)}} @endif" class="rounded-circle shadow avatar-img">
            </a>
            <div class="d-inline-block pt-2 pl-2">
                <p class="p-style mb-0 font-14"><small class="font-14">Posted by: </small><a href="{{route('visit.profile',$rc->user)}}" class="font-eb color-cc">{{$rc->user->name}}</a></p>
            </div>
        </div>
        <div class="col-12 col-sm-6 text-sm-right">
            <div class="rc-rating d-inline-block pr-3" onclick="doRating({{$rc->id}})" id="showRating{{$rc->id}}">
                @include('user.sections.showRating')
            </div>
            <button class="btn bg-white color-r box-shadow br-7 font-12 px-2 text-capitalize font-weight-bold btn-benchmark" onclick="parent.location='{{route('add.benchmark',$rc)}}'">Add Benchmark</button>
        </div>
        <div class="col-12 my-2">
            <p class="p-style mb-0 font-16 text-black-50">{{Str::words($rc->objective,30)}} <a class="btn--readMore" href="{{route('rc.view',$rc->id)}}">Read more.</a></p>
        </div>
        <div class="col-12">
            <div class="row align-items-sm-end">
                <div class="col-12 col-sm-8 order-sm-2">
                    <div class="modal-icon text-center text-sm-right">
                        {{-- <div class="d-inline-block align-bottom">
                            <a class="box-shadow" href="#listModal" data-toggle="modal" id="listModalBtn{{$rc->id}}" data-rc="{{$rc->id}}" onclick="callModal(this.id)">
                                <i class="fas fa-list-ul"></i>
                                <span class="font-eb">{{Auth::user()->rlists->count()}}</span>
                            </a>
                        </div> --}}
                        @include('visitor.sections.rcactions')
                        <div class="d-inline-block align-bottom">
                            <div class="rc--share">
                                <a class="box-shadow" href="javascript:void(0);">
                                    <i class="fas fa-share-alt"></i>
                                    <span class="font-eb">Share</span>
                                </a>

                                <ul class="rc--share-menu">
                                    <li><a href="https://www.facebook.com/sharer/sharer.php?display=page&u={{route('rc.view',$rc->id)}}" target="_blank" class="box-shadow"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="https://twitter.com/intent/tweet?text={{$rc->title}}&amp;url={{route('rc.view',$rc->id)}}" target="_blank" class="box-shadow"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="https://wa.me/?text={{route('rc.view',$rc->id)}}" target="_blank" class="box-shadow"><i class="fab fa-whatsapp"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="d-inline-block align-bottom">
                            <a class="box-shadow" href="javascript:void(0);">
                                <i class="fas fa-eye"></i>
                                <span class="font-eb">{{views($rc)->count()}}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-4 pl-0 order-sm-1">
                    <div class="rc-date bg-red text-white font-14 px-3 py-1 d-inline-block br-bl-7 no-hover">Posted on: {{$rc->created_at}}</div>
                </div>
            </div>
        </div>
    </div>
</div>