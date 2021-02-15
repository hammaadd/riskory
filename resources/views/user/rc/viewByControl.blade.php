@extends('user.layout.contributor')
@section('SiteTitle','Risk controls categorized || Riskory')
@section('content')
<div class="px-0 col-12 col-md-9 py-2">
    <div class="row pt-4 mx-0">
        <div class="pl-0 col-12 col-sm-auto">
            
            <p class="bg-lblue font-eb font-18 py-2 px-5 rounded-right-xl shadow-sm"><i><img src="{{asset('assets/images/Mask Group 10@2x.png')}}" class="align-bottom" width="35px"></i>&nbsp;&nbsp;
                @if(isset($control))
                    {{$control->name}}
                @endif
                @if(isset($tag))
                    {{$tag->name}}
                @endif
                    Risk Controls</p>
        </div>
   
        <div class="col-lg-3 col-md-6 col-sm-12 col-12 ml-md-auto">
            <div class="topbar-icon text-center text-md-right mt-3 mt-md-0">
                @include('user.sections.filters')
            </div>
        </div>
    </div>
    <div class="row pt-4 mx-2">
        @if(isset($control))
            @livewire('by-control',['control'=>$control,'page'=>1,'perPage'=>6])  
        @endif 
        @if(isset($tag))
            @livewire('by-tag',['tag'=>$tag,'page'=>1,'perPage'=>6])  
        @endif 
    </div>
    
    <div class="row px-2 px-md-5 mx-0 mx-md-5 pt-5">
         {{-- Risk control starts here --}}
    @if(isset($control))
        @if($data->count()<1)
            <h6 class="lead">No riskcontrols found for "{{$control->name}}" </h6>
        @endif
    @endif
    @if(isset($tag))
        @if($data->count()<1)
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




