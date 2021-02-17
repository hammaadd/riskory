@extends('user.layout.visitor')
@section('SiteTitle','Risk controls || Riskory')
@section('content')
    <main role="main" class="py-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 py-5">
                    <div class="sect--title pl-3 pl-md-5">
                        <div class="row mb-4 align-items-md-center">
                            <div class="col-md-auto col-12 px-0 pr-md-3 sect--title__col">
                                <p class="bg-lblue font-eb d-sm-inline-block font-18 py-2 pl-4 pl-md-5 pr-5 mb-0 rounded-right-xl shadow-sm"><img src="{{asset('assets/images/Mask Group 10@2x.png')}}" class="align-bottom" width="35px">&nbsp;&nbsp;
                                @if(isset($control))
                                    {{$control->name}}
                                @endif
                                @if(isset($tag))
                                    {{$tag->name}}
                                @endif
                                    Risk Controls</p>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            @if(isset($control))
                                @livewire('by-control-public',['control'=>$control,'page'=>1,'perPage'=>6])  
                            @endif 
                            {{-- @if(isset($tag))
                                @livewire('by-tag',['tag'=>$tag,'page'=>1,'perPage'=>6])  
                            @endif  --}}
                        </div>

                        <div class="row">
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
                         @include('visitor.sections.byControlRcs')
                         {{-- Riskcontrol ends here --}}
                    
                            {{-- Riskcontrol ends here --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- @include('user.sections.ratingModal') --}}
    </main>


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