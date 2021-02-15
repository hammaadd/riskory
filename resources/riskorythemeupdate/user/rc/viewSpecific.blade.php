@extends('user.layout.contributor')
@section('SiteTitle','View Risk Control || Riskory')
@section('content')
<div class="pl-0 col-12 col-md-9 py-5 pr-0 pr-md-5">
    <!-- Browse By Industry Secion -->

    <div class="row pt-4 mx-0 align-items-center">
        <div class="pl-0 col-12 col-sm-auto">
            <p class="bg-lblue font-eb font-18 py-2 px-5 rounded-right-xl shadow-sm"><i><img src="{{asset('assets/images/Mask Group 10@2x.png')}}" class="align-bottom" width="35px"></i>&nbsp;&nbsp;Risk Control # <span class="color-r">{{$rc->id}}</span> Detail @if($rc->user_id==Auth::id())
                <button class="btn-risk-edit" onclick="parent.location='{{route('rc.edit',$rc)}}'">Edit</button>
            @endif</p>
        </div>
    </div>

    <div class="row pl-1 pl-md-5 mx-0 mx-md-5 pt-5">
        <div class="col-12 pb-3">
            <div class="d-flex justify-content-center">
                {{-- <a id="riskDefinition" href="#collapseDefinition" class="btn bg-white color-r border-1 mx-2 box-shadow br-7 font-16 px-4 text-capitalize btn-benchmark quick--link">Definition</a> --}}
                <a id="riskProcedure" href="#collapseProcedure" class="btn bg-white color-r border-1 mx-2 box-shadow br-7 font-16 px-4 text-capitalize btn-benchmark quick--link">Procedure</a>
                {{-- <a id="riskRelations" href="#collapseRelations" class="btn bg-white color-r border-1 mx-2 box-shadow br-7 font-16 px-4 text-capitalize btn-benchmark quick--link">Relations</a> --}}
                <a id="riskBenchmarks" href="#collapseBenchmarks" class="btn bg-white color-r border-1 mx-2 box-shadow br-7 font-16 px-4 text-capitalize btn-benchmark quick--link">Benchmarks</a>
                <a id="riskComments" href="#collapseComments" class="btn bg-white color-r border-1 mx-2 box-shadow br-7 font-16 px-4 text-capitalize btn-benchmark quick--link">Comments</a>
            </div>
        </div>


        <div class="col-12 bg-lgray br-7 box-shadow mb-4">
            <div class="row mb-2">
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
            
            <div class="row mx-0 mb-4">
                <div class="col-12 col-sm-4">
                    <div class="rc---user bg-white br-7 p-3 box-shadow border-1">
                        <a href="{{route('visit.profile',$rc->user)}}" class="d-inline-block align-middle text-decoration-none">
                            <img src="@if($rc->user->avatar == 'images/avatars/default.png') https://ui-avatars.com/api/?background=random&name={{ str_replace(' ','+' ,$rc->user->name) }} @else {{asset('userAvat/'.$rc->user->avatar)}} @endif" class="rounded-circle shadow avatar-img-xl">
                        </a>
                        <div class="d-inline-block align-middle pl-2">
                            <p class="p-style mb-0">
                                <a href="{{route('visit.profile',$rc->user)}}" class="font-eb color-b">{{$rc->user->name}}</a>
                            </p>
                            <p class="p-style color-r font-14 mb-0">12 Riskcontrols</p>
                            <p class="p-style color-r font-14 mb-0">13 Followers</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-8 align-self-end text-right">
                    <button class="bg-red color-w font-14 border-0 br-7 p-2 font-eb btn-benchmark mr-3 d-inline-block mb-1" onclick="parent.location='{{route('add.benchmark',$rc)}}'">Add Benchmark</button>

                    <div class="modal-icon modal-icon-2 d-inline-block align-bottom">
                        <div class="d-inline-block align-bottom">
                            <a class="box-shadow" href="#listModal" data-toggle="modal" id="listModalBtn{{$rc->id}}" data-rc="{{$rc->id}}" onclick="callModal(this.id)">
                                <i class="fas fa-list-ul"></i>
                                <span class="font-eb">{{Auth::user()->rlists->count()}}</span>
                            </a>
                        </div>
                        @include('user.inc.rcactions')
                        <div class="d-inline-block align-bottom">
                            <div class="rc--share">
                                <a class="box-shadow" href="javascript:void(0);">
                                    <i class="fas fa-share-alt"></i>
                                    <span class="font-eb">0</span>
                                </a>

                                <ul class="rc--share-menu">
                                    <li><a href="#" class="box-shadow"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="box-shadow"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" class="box-shadow"><i class="fab fa-instagram"></i></a></li>
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
            </div>

            <div class="row mx-0 mb-3">
                <div class="col-12">
                    <h3 class="rc--title font-22 mb-2">{{$rc->title}}</h3>
                    <div class="d-inline-block mr-2" onclick="doRating({{$rc->id}})" id="showRating{{$rc->id}}">
                        @include('user.sections.showRating')
                    </div>
                    <small class="font-14">Posted on: {{$rc->created_at}}</small>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 px-0 mb-3">
                    <div class="d-inline-block rc-sec-title font-18 font-eb">Objective</div>
                </div>

                <div class="col-12">
                    <div class="px-3">
                        <p class="p-style font-16">{!!nl2br($rc->objective)!!}</p>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 px-0 mb-3">
                    <div class="d-inline-block rc-sec-title font-18 font-eb">Description</div>
                </div>

                <div class="col-12">
                    <div class="px-3">
                        <p class="p-style font-16">{!!nl2br($rc->description)!!}</p>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 px-0 mb-3">
                    <div class="d-inline-block rc-sec-title font-18 font-eb">Frequency</div>
                </div>

                <div class="col-12">
                    <div class="px-3">
                        <p class="p-style font-16">{{$rc->frequency}}</p>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 px-0 mb-3">
                    <div class="d-inline-block rc-sec-title font-18 font-eb">Industry</div>
                </div>

                <div class="col-12">
                    <div class="px-3">
                        <div>
                            <?php $industries = $rc->controls->where('type','industry');?>
                            @if($industries)
                                @foreach($industries as $ind)
                                    <button class="btn bg-white color-r box-shadow br-7 font-14 px-2 text-capitalize mb-2 btn-hover" onclick="return parent.location='{{route('byControl',['control'=>$ind->control,'type'=>$ind->control->type])}}'">{{$ind->control->name}}</button>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 px-0 mb-3">
                    <div class="d-inline-block rc-sec-title font-18 font-eb">Business Process</div>
                </div>

                <div class="col-12">
                    <div class="px-3">
                        <div>
                            <?php $bprocesses = $rc->controls->where('type','bprocess');?>
                            @if($bprocesses)
                                @foreach($bprocesses as $bp)
                                    <button class="btn bg-white color-r box-shadow br-7 font-14 px-2 text-capitalize mb-2 btn-hover" onclick="return parent.location='{{route('byControl',['control'=>$bp->control,'type'=>$bp->control->type])}}'">{{$bp->control->name}}</button>
                                @endforeach 
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 px-0 mb-3">
                    <div class="d-inline-block rc-sec-title font-18 font-eb">Framework</div>
                </div>

                <div class="col-12">
                    <div class="px-3">
                        <div>
                            <?php $bframeworks = $rc->controls->where('type','bframework');?>
                            @if($bframeworks)
                                @foreach($bframeworks as $bf)
                                    <button class="btn bg-white color-r box-shadow br-7 font-14 px-2 text-capitalize mb-2 btn-hover" onclick="return parent.location='{{route('byControl',['control'=>$bf->control,'type'=>$bf->control->type])}}'">{{$bf->control->name}}</button>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 px-0 mb-3">
                    <div class="d-inline-block rc-sec-title font-18 font-eb">Tags</div>
                </div>

                <div class="col-12">
                    <div class="px-3">
                        <div>
                            @if($rc->tags)
                                @foreach($rc->tags as $tag)
                                    <button class="btn bg-white color-r box-shadow br-7 font-14 px-2 text-capitalize mb-2 btn-hover" onclick="return parent.location='{{route('byTag',['tag'=>$tag->tag])}}'"><i class="fas fa-tag fa-rotate-90"></i> {{$tag->tag->name}}</button>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 px-0 mb-3">
                    <div class="d-inline-block rc-sec-title font-18 font-eb">Business Impact</div>
                </div>

                <div class="col-12">
                    <div class="px-3">
                        <p class="p-style font-16">{{$rc->business_impact}}</p>
                    </div>
                </div>
            </div>

            {{-- 
            <div class="row mb-3">
                <div class="col-12 px-0 mb-3">
                    <div class="d-inline-block rc-sec-title font-18 font-eb">Recommendations</div>
                </div>

                <div class="col-12">
                    <div class="px-3">
                        <p class="p-style">{{$rc->recommendation}}</p>
                    </div>
                </div>
            </div>
            --}}
        </div>


        <div class="col-12 bg-lgray br-7 box-shadow mb-4 p-4">
            <div class="accordion" id="riskAccordion">
                <div class="card" id="riskProcedure">
                    <div class="card-header p-0" id="headingProcedure">
                        <h2 class="mb-0">
                            <button class="btn btn-block font-eb color-b text-left py-2 px-3 font-14 collapsed" type="button" data-toggle="collapse" data-target="#collapseProcedure" aria-expanded="false" aria-controls="collapseProcedure"><i class="more-less fas fa-plus"></i> Risk Control Procedure</button>
                        </h2>
                    </div>
                    <div id="collapseProcedure" class="collapse" aria-labelledby="headingProcedure" data-parent="#riskAccordion">
                        <div class="card-body">
                            <label class="px-3 py-1 my-3 bg-white font-eb">Testing Steps</label>
                            @if($rc->testingsteps)
                                <ol class="p-style font-14">
                                    @foreach($rc->testingsteps as $tstep)
                                        <li>{!!nl2br($tstep->step)!!}</li>    
                                    @endforeach
                                </ol>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- <div class="card" id="riskRelations">
                    <div class="card-header p-0" id="headingRelations">
                        <h2 class="mb-0">
                            <button class="btn btn-block font-eb color-b text-left py-2 px-3 font-14 collapsed" type="button" data-toggle="collapse" data-target="#collapseRelations" aria-expanded="false" aria-controls="collapseRelations"><i class="more-less fas fa-plus"></i> Risk Control Relations</button>
                        </h2>
                    </div>
                    <div id="collapseRelations" class="collapse" aria-labelledby="headingRelations" data-parent="#riskAccordion">
                        <div class="card-body">
                            <div>
                                @if($rc->relations)
                                    @foreach($rc->relations as $rel)
                                        @php $rcrel = $rel->relation; @endphp
                                        <div class="col-12 bg-lgray br-20 border-0 box-shadow pl-0 pr-1 pr-md-4 my-3">
                                            <div class="row ml-0">
                                                <p class="br-tl-20 bg-white font-16 font-eb color-r px-3 py-1">{{views($rcrel)->count()}} views</p>
                                                <div class=" pb-4 pb-lg-1 px-2" onclick="doRating({{$rcrel->id}})" id="showRating{{$rcrel->id}}">
                                                    @for($i=1;$i<=5;$i++)
                                                        <span class="fa @if($rcrel->ratings->avg('rating')> $i-1 && $rcrel->ratings->avg('rating') < $i) fa-star-half-alt @else fa-star @endif @if($i<=$rcrel->ratings->avg('rating')) checked @endif do-rating"></span>
                                                    @endfor
                                                </div>
                                            </div>
                                            <div class="row px-md-4 px-1">
                                                <div class="col-12 col-md-5">
                                                    <p class="font-eb font-18 color-b mb-0">{{$rcrel->title}}</p>
                                                    <p class="font-e font-14 text-underl"><a href="{{route('rc.view',$rcrel->slug)}}" target="_blank" class="color-r">Click for more Info</a></p>
                                                </div>
                                                <div class="col-12 col-md-7">
                                                    <div class="modal-icon">
                                                        <div class="d-inline-block">
                                                            <a href="#listModal" data-toggle="modal" id="listModalBtn{{$rcrel->id}}" data-rc="{{$rcrel->id}}" onclick="callModal(this.id)"><i class="fas fa-list-ul"></i></a>
                                                            <p class="p-style font-eb text-center">{{Auth::user()->rlists->count()}}</p>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            @if (!($rcrel->likedBy(auth()->user())))
                                                                <a role="button" href="javascript:void(0);"><i class="far fa-thumbs-up"></i></a>
                                                            @else
                                                                <button class="bg-dark" role="button"><i class="fas fa-thumbs-up"></i></button>
                                                            @endif
                                                            <p class="p-style font-eb text-center">{{$rcrel->likes->count()}}</p>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            @if (!($rcrel->dislikedBy(auth()->user())))
                                                                <a role="button" href="javascript:void(0);"><i class="far fa-thumbs-down"></i></a>
                                                            @else
                                                                <button class="bg-dark" role="button"><i class="fas fa-thumbs-down"></i></button>
                                                            @endif
                                                            <p class="p-style font-eb text-center">{{$rcrel->dislikes->count()}}</p>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            @if (!($rcrel->bookmarkedBy(auth()->user())))
                                                                <a role="button"  href="javascript:void(0);"><i class="far fa-bookmark"></i></a>
                                                            @else
                                                                <button class="bg-dark" role="button"><i class="fas fa-bookmark"></i></button>
                                                            @endif
                                                            <p class="p-style font-eb text-center">{{$rcrel->bookmarks->count()}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div> --}}

                <div class="card" id="riskBenchmarks">
                    <div class="card-header p-0" id="headingBenchmarks">
                        <h2 class="mb-0">
                            <button class="btn btn-block font-eb color-b text-left py-2 px-3 font-14 collapsed" type="button" data-toggle="collapse" data-target="#collapseBenchmarks" aria-expanded="false" aria-controls="collapseBenchmarks"><i class="more-less fas fa-plus"></i> Risk Control Benchmarks</button>
                        </h2>
                    </div>
                    <div id="collapseBenchmarks" class="collapse" aria-labelledby="headingBenchmarks" data-parent="#riskAccordion">
                        <div class="card-body">
                            <div>
                                @if($rc->benchmarks)
                                    @foreach($rc->benchmarks as $ben)
                                        <div class="col-12 bg-lgray br-20 border-0 box-shadow p-4 my-3">
                                            <img src="@if($ben->user->avatar == 'images/avatars/default.png') https://ui-avatars.com/api/?background=random&name={{ str_replace(' ','+' ,$ben->user->name) }} @else {{asset('userAvat/'.$ben->user->avatar)}} @endif" class="rounded-circle shadow avatar-img">

                                            <div class="d-inline-block pt-1 pl-2">
                                                <p class="p-style mb-0"><a href="#" class="font-eb color-b">{{$ben->user->name}}</a></p>
                                                <p class="p-style font-14 mb-0">This risk got <a href="{{route('view.benchmark',$ben)}}" class="font-eb color-r">{{ucfirst($ben->benchmark)}}</a> by {{ucfirst($ben->user->name)}}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card" id="riskComments">
                    <div class="card-header p-0" id="headingComments">
                        <h2 class="mb-0">
                            <button class="btn btn-block font-eb color-b text-left py-2 px-3 font-14 collapsed" type="button" data-toggle="collapse" data-target="#collapseComments" aria-expanded="false" aria-controls="collapseComments"><i class="more-less fas fa-plus"></i> Comments</button>
                        </h2>
                    </div>
                    <div id="collapseComments" class="collapse" aria-labelledby="headingComments" data-parent="#riskAccordion">
                        <div class="card-body">
                            <div class="bg-lgray br-7 p-4 mx-1 mx-md-5 comment-section">
                                <form action="{{route('create.comment',$rc)}}" method="POST">
                                    @csrf
                                    <div class="input-group">
                                        <input type="text" name="comment" class="form-control" placeholder="Feel Free to Write Your Comment" aria-label="Recipient's username" aria-describedby="basic-addon2" >
                                        <div class="input-group-append">
                                            <button class="btn box-shadow px-4" type="submit">Send</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="mx-1 mx-md-5 comment-section" id="allComments">
                                @if($rc->comments)
                                    @foreach($rc->comments as $com)
                                        <div class="row py-4">
                                            <div class="py-2 col-10">
                                                <img src="@if($com->user->avatar == 'images/avatars/default.png') https://ui-avatars.com/api/?background=random&name={{ str_replace(' ','+' ,$com->user->name) }} @else {{asset('userAvat/'.$com->user->avatar)}} @endif" class="rounded-circle shadow avatar-img">

                                                <div class="d-inline-block pt-1 pl-2">
                                                    <p class="p-style mb-0"><a href="{{route('visit.profile',$com->user)}}" class="font-eb color-b">{{$com->user->name}}</a> </p>
                                                    <p class="p-style font-14 mb-0">{{$com->comment}}</p>
                                                    <div><small>{{$com->created_at}}</small></div>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                @if($com->user->id == Auth::id())
                                                    <form action="{{route('comment.delete',['comment'=>$com,'rc'=>$rc])}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <small><button class="btn badge badge-danger badge-pill float-right d-inline-block" role="button" type="submit">Delete</button></small>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                                {{-- <p class="px-4 py-3"><span class="border-1 br-20 font-12 p-2 font-eb box-shadow color-r">+6</span>&nbsp;&nbsp;&nbsp;<a href="#" class="font-eb color-r text-underl font-12">Click to see all comments</a></p> --}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @include('user.sections.listModal')
        </div>

    </div>

</div>

@include('user.sections.ratingModal')
@endsection
@section('script')
<script type="text/javascript">
    $('#riskDefinition').click(function(e) {
        $('#collapseDefinition').collapse('show');        
    });
    $('#riskProcedure').click(function(e) {
        $('#collapseProcedure').collapse('show');        
    });
    $('#riskRelations').click(function(e) {
        $('#collapseRelations').collapse('show');        
    });
    $('#riskBenchmarks').click(function(e) {
        $('#collapseBenchmarks').collapse('show');        
    });
    $('#riskComments').click(function(e) {
        $('#collapseComments').collapse('show');        
    });

function toggleIcon(e) {
    $(e.target)
    .prev(".card-header")
    .find(".more-less")
    .toggleClass("fa-plus fa-minus");
}
$(".accordion").on("hidden.bs.collapse", toggleIcon);
$(".accordion").on("shown.bs.collapse", toggleIcon);

</script>    
@endsection
