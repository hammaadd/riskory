@if($likes)
@foreach($likes as $l)
<?php $rc = $l->rcs;?>
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
                        <button class="bg-red color-w font-14 border-0 br-15 p-2 font-eb" role="button" onclick="parent.location='{{route('add.benchmark',$rc)}}'">Add Benchmark</button>
                    <p class="font-e font-14 text-underl pt-3"><a href="{{route('rc.view',$rc->id)}}" class="color-r">Click for more Info</a></p>
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

{!! $likes->links() !!}
@endif