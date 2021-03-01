@extends('user.layout.contributor')
@section('SiteTitle','Bookmarks || Riskory')
@section('content')
<div class="col-12 col-md-9 px-md-0 py-5">

    <div class="sect--title pl-3 pl-md-5">
        <div class="row mb-4 mb-xl-5 align-items-lg-center">
            <div class="col-lg-auto col-12 px-0 pr-lg-3 sect--title__col">
                <p class="bg-lblue font-eb d-sm-inline-block font-18 ml-md-3 py-2 pl-3 pl-md-5 pr-5 mb-0 rounded-right-xl shadow-sm"><i><img src="{{asset('assets/images/Mask Group 10@2x.png')}}" class="align-bottom" width="35px"></i>&nbsp;&nbsp;Bookmarked Risk Controls</p>
            </div>
            {{-- <div class="col-lg-auto col-12 text-muted">
                <div class="input-group search-bar py-1 ml-0 ml-md-0">
                    <input type="text" class="form-control" placeholder="Search through the category" aria-label="Search Risks Here" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn-search bgb-lgray color-dg" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-xl-auto col-12 mb-3 mb-xl-0 ml-xl-auto text-right">
                <div class="topbar-icon text-center text-md-right mt-3 mt-md-0">
                    <a href="#" class="text-center mx-2 my-1 bg-lblue color-r"><i class="fas fa-sort-amount-up-alt"></i></a>
                    <a href="#" class="text-center mx-2 my-1"><i class="fas fa-sort-amount-down"></i></a>
                    <a href="#" class="text-center mx-2 my-1"><i class="fas fa-filter"></i></a>
                </div>
            </div> --}}
        </div>
    </div>

    <div class="row px-xl-5 mx-0 mx-md-5 pt-3">
        {{-- Risk control starts here --}}
    @if($rcs->count() > 0)
            @foreach($rcs as $b)
            <?php $rc = $b->rcs;?>
                @include('user.sections.riskControlView')
            @endforeach
        @include('user.sections.listModal')
        @include('user.sections.rcDeleteModal')
    @else
    <p class="lead">No bookmark to show. You can add any risk control in bookmarks.</p>
    @endif
        {{-- Riskcontrol ends here --}}
    </div>
</div>
@include('user.sections.ratingModal')

@endsection




