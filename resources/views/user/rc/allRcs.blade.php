@extends('user.layout.contributor')
@section('SiteTitle','Risk controls feed || Riskory')

@section('content')
<div class="col-12 col-md-9 px-md-0 py-5">

    <div class="sect--title pl-sm-3 px-md-5">
        <div class="row mb-4 mb-xl-5 align-items-sm-center">
            <div class="col-sm-auto col-12 px-0 pr-lg-3 sect--title__col">
                <p class="bg-lblue font-eb d-sm-inline-block font-18 ml-3 ml-sm-0 ml-md-3 py-2 pl-3 pl-md-5 pr-5 mb-0 rounded-right-xl shadow-sm"><i><img src="assets/images/Mask Group 10@2x.png" class="align-bottom" width="35px"></i>&nbsp;&nbsp;All Risk Controls</p>
            </div>
            <div class="col-sm-auto col-12 ml-sm-auto">
                <div class="topbar-icon text-center text-md-right mt-3 mt-sm-0">
                    @include('user.sections.filters')
                </div>
            </div>
        </div>
    </div>


    <div class="row px-xl-5 mx-0 mx-md-5">
        <div class="col-12 px-0">
            <div class="">
                @php
                    $ok=0;
                @endphp
                <form action="{{route('rc.all')}}" method="GET" id="rcs_entries">
                    <label>Show <select name="rcs" id="entries" class="custom-select" style="width:auto !important;">
                        <option value="10" @if(isset($_GET['rcs'])) @if($_GET['rcs']==10) @php $ok = 1; @endphp selected @endif @endif>10</option>
                        <option value="15" @if(isset($_GET['rcs'])) @if($_GET['rcs']==15) @php $ok = 1; @endphp selected @endif @endif>15</option>
                        <option value="20" @if(isset($_GET['rcs'])) @if($_GET['rcs']==20) @php $ok = 1; @endphp selected @endif @endif>20</option>
                        <option value="50" @if(isset($_GET['rcs'])) @if($_GET['rcs']==50) @php $ok = 1; @endphp selected @endif @endif>50</option>
                        <option value="100" @if(isset($_GET['rcs'])) @if($_GET['rcs']==100) @php $ok = 1; @endphp selected @endif @endif>100</option>
                        @if($ok==0)
                            @if(!isset($_GET['rcs']))
                                <option value="10" selected>10</option>
                            @elseif(filter_var($_GET['rcs'], FILTER_VALIDATE_INT) !== FALSE))
                                <option value="<?=$_GET['rcs']?>" selected><?=$_GET['rcs']?></option>
                            @endif
                        @endif
                    </select> Entries</label>
                </form>
            </div>
        </div>
    </div>
    <div class="row px-xl-5 mx-0 mx-md-5">
        {{-- Risk control starts here --}}
        @include('user.sections.riskcontrols')
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

    $('#entries').on('change', function (){
        $('#rcs_entries').submit();
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




