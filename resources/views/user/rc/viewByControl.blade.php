@extends('user.layout.contributor')
@section('SiteTitle','Risk controls categorized || Riskory')
@section('content')
<div class="col-12 col-md-9 px-md-0 py-5">

    <div class="sect--title pl-sm-3 px-md-5">
        <div class="row mb-4 mb-xl-5 align-items-sm-center">
            <div class="col-sm-auto col-12 px-0 pr-lg-3 sect--title__col">
                <p class="bg-lblue font-eb d-sm-inline-block font-18 ml-3 ml-sm-0 ml-md-3 py-2 pl-3 pl-md-5 pr-5 mb-0 rounded-right-xl shadow-sm"><i><img src="{{asset('assets/images/Mask Group 10@2x.png')}}" class="align-bottom" width="35px"></i>&nbsp;&nbsp;
                @if(isset($control))
                    {{$control->name}}
                @endif
                @if(isset($tag))
                    {{$tag->name}}
                @endif
                    Risk Controls</p>
            </div>
            <div class="col-sm-auto col-12 ml-sm-auto">
                <div class="topbar-icon text-center text-md-right mt-3 mt-sm-0">
                    @include('user.sections.filters')
                </div>
            </div>
        </div>
    </div>

    <div class="row px-xl-5 mx-0 mx-md-5 mb-4">
        @if(isset($control))
            @livewire('by-control',['control'=>$control,'page'=>1,'perPage'=>6])
        @endif
        @if(isset($tag))
            @livewire('by-tag',['tag'=>$tag,'page'=>1,'perPage'=>6])
        @endif
    </div>

    <div class="row px-xl-5 mx-0 mx-md-5">
         {{-- Risk control starts here --}}
    @if(isset($control))
        @if($rcs->count()<1)
            <h6 class="lead">No riskcontrols found for "{{$control->name}}" </h6>
        @endif
    @endif
    @if(isset($tag))
        @if($rcs->count()<1)
            <h6 class="lead">No riskcontrols found for "{{$tag->name}}" </h6>
        @endif
    @endif
     {{-- Risk control starts here --}}
     @include('user.sections.byControlRcs')
     {{-- Riskcontrol ends here --}}

        {{-- Riskcontrol ends here --}}
    </div>
</div>
@include('user.sections.ratingModal')
@include('user.sections.rcDeleteModal')
@endsection

@section('script')
<script>

$(document).ready(function(){
        ScrollReveal().reveal('.rcreveal',{interval:16, delay:100});
    });

    function toggleButtons(){
        order = $('input[name="order"]').val();
        if(order == 'ASC'){
            order_next = 'DESC';
        }else if(order == 'DESC'){
            order_next = 'ASC';
        }

        $('#'+order).removeClass('bg-lblue');
        $('#'+order).removeClass('color-r');
        $('#'+order_next).addClass('bg-lblue color-r');
        $('input[name="order"]').val(order_next);

    }
</script>
@endsection




