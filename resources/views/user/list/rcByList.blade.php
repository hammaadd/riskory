@extends('user.layout.contributor')
@section('SiteTitle','Risk controls by list || Riskory')
@section('content')
<div class="px-0 col-12 col-md-9 py-2">
    <div class="row pt-4 mx-0">
        <div class="pl-0 col-12 col-sm-auto">
            <p class="bg-lblue font-eb font-18 py-2 px-5 mb-0 rounded-right-xl shadow-sm"><i><img src="{{asset('assets/images/Mask Group 10@2x.png')}}" class="align-bottom" width="35px"></i>&nbsp;&nbsp;Listed risk controls</p>
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
        @if($data->count()<1)
        <div class="col-12 bg-lgray br-7 border-0 box-shadow my-4 py-1 px-4 p-md-5">
            <h6 class="lead">No risk control added in this list</h6>
        </div>
        @endif
        @include('user.sections.rcByList')
        {{-- Riskcontrol ends here --}}
        
    </div>
</div>
@include('user.sections.ratingModal')

@endsection
@section('script')
<script>
    $(document).ready(function(){
    });
</script>
@endsection