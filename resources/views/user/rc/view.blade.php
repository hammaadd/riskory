@extends('user.layout.contributor')
@section('SiteTitle','Create Risk Control || Riskory')
@section('select2')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endsection
@section('content')
<div class="pl-0 col-12 col-md-9 py-5 pr-0 pr-md-5">
    <!-- Browse By Industry Secion -->
    <div class="row pt-4">
        <div class="pl-0 col-12 col-sm-12 col-md-6 col-lg-4">
            <div class="">
            <p class="bg-lblue font-eb font-18 py-2 px-5"><i><img src="{{asset('assets/images/Mask Group 10@2x.png')}}" class="align-bottom" width="35px"></i>&nbsp;&nbsp;Risk Control Detail</p>
            </div>
        </div>
    </div>
    <div class="row pl-1 pl-md-5 mx-0 mx-md-5 pt-5">
        <div class="col-12 bg-lgray br-20 border-0 box-shadow mb-4">
            <div class="row">
                <div class="col-12 px-0">
                    <span class="br-tl-20 bg-white font-16 font-eb color-r px-3 py-1">{{views($rc)->count()}} views</span>
                    <span class="br-tr-20 bg-white font-16 font-e color-r px-3 py-1 float-right">
                        @if($rc->status == 'U')
                                    Under Discussion
                                @elseif($rc->status == 'P')
                                    Pending
                                @elseif($rc->status == 'A')
                                    Approved
                                @elseif($rc->status == 'R')
                                    Rejected
                                @elseif($rc->status == 'O')
                                    Our next bigthing
                                @endif
                    </span>
                </div>
            </div>
            <div class="px-md-4 px-1 pt-5">
                <div class="col-12">
                    <div class="pb-3">
                        <img src="@if($rc->user->avatar == 'images/avatars/default.png')
                        https://ui-avatars.com/api/?background=random&name={{ str_replace(' ','+' ,$rc->user->name) }}
                        @else
                        {{asset('userAvat/'.$rc->user->avatar)}}
                        @endif
                        " class="rounded-circle shadow avatar-img">
                        <div class="d-inline-block pt-1 pl-2">
                            <p class="p-style mb-0"><a href="{{route('visit.profile',$rc->user)}}" class="font-eb color-b">{{$rc->user->name}}</a> 
                                
                            </p>
                            <small>Posted on: {{$rc->created_at}}</small>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class=" pb-4 pb-lg-1 px-0" onclick="doRating({{$rc->id}})" id="showRating{{$rc->id}}">
                                @include('user.sections.showRating')
                               
                                    
                            </div>
                            <button class="bg-red color-w font-14 border-0 br-15 p-2 font-eb btn-benchmark" onclick="parent.location='{{route('add.benchmark',$rc)}}'">Add Benchmark</button>
                            <button class="btn-risk-edit" onclick="parent.location='{{route('rc.edit',$rc)}}'">Edit</button>
                        </div>
                        <div class="col-12 col-lg-6 pt-3 pt-md-0">
                            <div class="modal-icon float-left float-lg-right">
                                <div class="d-inline-block">
                                    <a href="#listModal" data-toggle="modal" id="listModalBtn{{$rc->id}}" data-rc="{{$rc->id}}" onclick="callModal(this.id)"><i class="fas fa-list-ul"></i></a>
                                    <p class="p-style font-eb text-center">{{Auth::user()->rlists->count()}}</p>
                                </div>
                                @include('user.inc.rcactions')
                            </div>
                        </div>
                    </div>
                <label class="px-3 py-1 my-3 bg-white font-eb">Risk Control Number <a href="#" class="color-r">#00{{$rc->id}}</a></label><br>
                    <label class="px-3 py-1 my-3 bg-white font-eb">Risk Control Title</label>
                    
                <p class="p-style">{{$rc->title}}</p>
                <label class="px-3 py-1 my-3 bg-white font-eb">Risk Control Objective</label>
                <p class="p-style">{!!nl2br($rc->objective)!!}</p>
                    <label class="px-3 py-1 my-3 bg-white font-eb">Risk Control Description</label>
                <p class="p-style">{!!nl2br($rc->description)!!}</p>
                    <label class="px-3 py-1 my-3 bg-white font-eb">Risk Control Frequency</label>
                <p class="p-style">{{$rc->frequency}}</p>
                    <label class="px-3 py-1 my-3 bg-white font-eb">Risk Control Industry</label>
                    <div>
                <?php $industries = $rc->controls->where('type','industry');?>
                @if($industries)
                    @foreach($industries as $ind)
                        <button class="border-0 bg-lblue font-e br-12 px-3 p-2 mx-1 my-2">{{$ind->control->name}}</button>
                    @endforeach
                @endif
                    </div>
                    <label class="px-3 py-1 my-3 bg-white font-eb">Risk Control Business Process</label>
                    <div>
                <?php $bprocesses = $rc->controls->where('type','bprocess');?>
                @if($bprocesses)
                    @foreach($bprocesses as $bp)
                        <button class="border-0 bg-lblue font-e br-12 px-3 p-2 mx-1 my-2">{{$bp->control->name}}</button>
                    @endforeach
                @endif
                    </div>
                    <label class="px-3 py-1 my-3 bg-white font-eb">Risk Control Framework</label>
                    <div>
                <?php $bframeworks = $rc->controls->where('type','bframework');?>
                @if($bframeworks)
                    @foreach($bframeworks as $bf)
                        <button class="border-0 bg-lblue font-e br-12 px-3 p-2 mx-1 my-2">{{$bf->control->name}}</button>
                    @endforeach
                @endif
                    </div>
                    <label class="px-3 py-1 my-3 bg-white font-eb">Risk Control Tags</label>
                    <div>
                @if($rc->tags)
                    @foreach($rc->tags as $tag)
                        <button class="border-0 bg-lblue font-e br-12 px-3 p-2 mx-1 my-2"><i class="fas fa-tag fa-rotate-90"></i> {{$tag->tag->name}}</button>
                    @endforeach
                @endif

                    </div>
                    <label class="px-3 py-1 my-3 bg-white font-eb">Testing Steps</label>
               
                @if($rc->testingsteps)
                <p class="p-style">
                    <ol>
                @foreach($rc->testingsteps as $tstep)
                   
                        <li>{!!nl2br($tstep->step)!!}</li>    
                        
                @endforeach
                    </ol>
                </p>
                @endif
                    <label class="px-3 py-1 my-3 bg-white font-eb">Business Impact</label>
                    <p class="p-style">
                        {!!nl2br($rc->business_impact)!!}
                    </p>

                    {{-- Relations commented --}}

                    {{-- <label class="px-3 py-1 my-3 bg-white font-eb">Recommendations</label>
                    <p class="p-style">
                        {{$rc->recommendation}}
                    </p> --}}
                    {{-- <label class="px-3 py-1 my-3 bg-white font-eb">Risk Control Relationship</label>
                    <div>
                        @if($rc->relations)
                        @foreach($rc->relations as $rel)
                        @php $rcrel = $rel->relation; @endphp
                        <div class="col-11 bg-lgray br-20 border-0 box-shadow pl-0 pr-1 pr-md-4 my-3">
                            <div class=" pb-4 pb-lg-1 px-0" onclick="doRating({{$rcrel->id}})" id="showRating{{$rc->id}}">
                                @for($i=1;$i<=5;$i++)
                                    <span class="fa @if($rcrel->ratings->avg('rating')> $i-1 && $rcrel->ratings->avg('rating') < $i) fa-star-half-alt @else fa-star @endif @if($i<=$rcrel->ratings->avg('rating')) checked @endif do-rating" >
                                                                            </span>
                                    @endfor
                                    
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
                    </div> --}}
                
                    <label class="px-3 py-1 my-3 bg-white font-eb">Risk Control Benchmark</label>
                    <div>
                        @if($rc->benchmarks)
                        @foreach($rc->benchmarks as $ben)
                        <div class="col-12 bg-lgray br-20 border-0 box-shadow p-4 my-3">
                            <img src="@if($ben->user->avatar == 'images/avatars/default.png')
                            https://ui-avatars.com/api/?background=random&name={{ str_replace(' ','+' ,$ben->user->name) }}
                            @else
                            {{asset('userAvat/'.$ben->user->avatar)}}
                            @endif
                            " class="rounded-circle shadow avatar-img">
                            <div class="d-inline-block pt-1 pl-2">
                                <p class="p-style mb-0"><a href="#" class="font-eb color-b">{{$ben->user->name}}</a></p>
                                <p class="p-style font-14 mb-0">This risk got <a href="#" class="font-eb color-r">{{ucfirst($ben->benchmark)}}</a> by {{ucfirst($ben->user->name)}}</p>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    
                    <hr>
                    <div class="bg-white br-20 p-4 mx-1 mx-md-5 comment-section">
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
                    <div class="p-4 mx-1 mx-md-5 comment-section" id="allComments">
                        @if($rc->comments)
                        @foreach($rc->comments as $com)
                        <div class="row">
                            <div class="py-2 col-10">
                                <img src="@if($com->user->avatar == 'images/avatars/default.png')
                                https://ui-avatars.com/api/?background=random&name={{ str_replace(' ','+' ,$com->user->name) }}
                                @else
                                {{asset('userAvat/'.$com->user->avatar)}}
                                @endif
                                " class="rounded-circle shadow avatar-img">
                                <div class="d-inline-block pt-1 pl-2">
                                    <p class="p-style mb-0"><a href="{{route('visit.profile',$com->user)}}" class="font-eb color-b">{{$com->user->name}}</a> 
                                        
                                    </p>
                                    
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
                    </div>
                </div>
                @include('user.sections.listModal')
            </div>
        </div>
    </div>
</div>
@include('user.sections.ratingModal')
@endsection
