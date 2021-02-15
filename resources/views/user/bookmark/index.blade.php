@extends('user.layout.contributor')
@section('SiteTitle','Bookmarks || Riskory')
@section('content')
<div class="px-0 col-12 col-md-9 py-2">
    <div class="row pt-4 mx-0">
        <div class="pl-0 col-12 col-sm-auto">
            <p class="bg-lblue font-eb font-18 py-2 px-5 rounded-right-xl shadow-sm"><i><img src="{{asset('assets/images/Mask Group 10@2x.png')}}" class="align-bottom" width="35px"></i>&nbsp;&nbsp;Bookmarked Risk Controls</p>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-12 col-12 text-right px-4">
            {{-- <div class="input-group search-bar py-1 ml-0 ml-md-0">
              <input type="text" class="form-control" placeholder="Search through the category" aria-label="Search Risks Here" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn-search bgb-lgray color-dg" type="button"><i class="fas fa-search"></i></button>
              </div>
            </div> --}}
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 col-12">
            {{-- <div class="topbar-icon text-center text-md-right mt-3 mt-md-0">
              <a href="#" class="text-center mx-2 my-1 bg-lblue color-r"><i class="fas fa-sort-amount-up-alt"></i></a>
              <a href="#" class="text-center mx-2 my-1"><i class="fas fa-sort-amount-down"></i></a>
              <a href="#" class="text-center mx-2 my-1"><i class="fas fa-filter"></i></a>
            </div> --}}
        </div>
    </div>
    <div class="row px-2 px-md-5 mx-0 mx-md-5 pt-3">
        {{-- Risk control starts here --}}
        @if($rcs)
            @foreach($rcs as $b)
            <?php $rc = $b->rcs;?>
                @include('user.sections.riskControlView')
            {{-- <div class="col-12 bg-lgray br-20 border-0 box-shadow mt-4 mb-4">
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
                <div class="row px-md-4 px-1 pt-2">
                    <div class="col-12">
                    <p class="font-eb font-18 color-b mb-0">{{$rc->title}}</p>
                    <p class="p-style">{{$rc->obj_summary}}</p>
                    </div>
                </div>
                <div class="px-md-4 px-1 pt-2">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-6 col-lg-3 px-0">
                                <button class="bg-red color-w font-14 border-0 br-15 p-2 font-eb" onclick="parent.location='{{route('add.benchmark',$rc)}}'">Add Benchmark</button>
                            <p class="font-e font-14 text-underl pt-3"><a href="{{route('rc.show',$rc->slug)}}" class="color-r">Click for more Info</a></p>
                            </div>
                            <div class="col-6 col-lg-4 pb-4 pb-lg-0 px-0" onclick="doRating({{$rc->id}})" id="showRating{{$rc->id}}">
                                @include('user.sections.showRating')
                               
                                    
                            </div>
                            <div class="col-12 col-lg-5 px-0">
                                <div class="modal-icon text-center float-lg-right">
                                    <div class="d-inline-block">
                                        <a href="#listModal" data-toggle="modal" id="listModalBtn{{$rc->id}}" data-rc="{{$rc->id}}" onclick="callModal(this.id)"><i class="fas fa-list-ul"></i></a>
                                        <p class="p-style font-eb text-center">{{Auth::user()->rlists->count()}}</p>
                                    </div>
                                    @include('user.inc.rcactions')
                                </div>
                                <!-- Modal -->
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        @endforeach
        @include('user.sections.listModal')
      
    @endif
        {{-- Riskcontrol ends here --}}
    </div>
</div>
@include('user.sections.ratingModal')

@endsection




