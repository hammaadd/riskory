@extends('user.layout.contributor')
@section('SiteTitle','Risk controls feed || Riskory')

@section('content')
<div class="px-0 col-12 col-md-9 py-2">
    <div class="row pt-4 mx-0">
        <div class="pl-0 col-12 col-sm-auto">
            <p class="bg-lblue font-eb font-18 py-2 px-5 rounded-right-xl shadow-sm"><i><img src="{{asset('assets/images/Mask Group 10@2x.png')}}" class="align-bottom" width="35px"></i>&nbsp;&nbsp;All Risk Controls</p>
        </div>
   
        <div class="col-lg-3 col-md-6 col-sm-12 col-12 ml-auto">
            <div class="topbar-icon text-center text-md-right mt-3 mt-md-0">
                @include('user.sections.filters')
            </div>
        </div>
    </div>
    @php
    $noLinks = 1;
    @endphp
    @if(isset($search))
    <div class="row px-2 px-md-5 mx-0 mx-md-5 pt-3">
        <p class="lead">Search results for "{{$search}}"</p>
    </div>
    @endif
    <div class="row px-2 px-md-5 mx-0 mx-md-5 pt-3">
        {{-- Risk control starts here --}}
        @include('user.sections.riskcontrols')
        {{-- Riskcontrol ends here --}}
        
    </div>
</div>
@include('user.sections.ratingModal')

@endsection
@section('script')
<script>
    $(document).ready(function(){
        ScrollReveal().reveal('.rcreveal',{interval:16, delay:100});
        // $('input[name="search"]').val('');
        // window.livewire.emit('mount');
    });

    function toggleButtons(){
        order = $('input[name="order"]').val();
        if(order == 'ASC'){
            order_next = 'DESC';
        }else if(order == 'DESC'){
            order_next = 'ASC';
        }

        // $('#'+order).removeClass('bg-lblue');
        $('#'+order).removeClass('color-r');
        // $('#'+order_next).addClass('bg-lblue color-r');
        $('#'+order_next).addClass('color-r');
        $('input[name="order"]').val(order_next);

    }

</script>
@endsection
@section('reveal')
<script src="{{asset('js/scrollreveal.min.js')}}"></script>
@endsection




