@extends('user.layout.contributor')
@section('SiteTitle','Search Results || Riskory')
@section('select2')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

@endsection
@section('content')
<div class="col-12 col-md-9 px-md-0 py-5">

    <div class="sect--title pl-sm-3 px-md-5">
        <div class="row mb-3 mb-xl-3 align-items-sm-center">
            <div class="col-sm-auto col-12 px-0 pr-lg-3 sect--title__col">
                <p class="bg-lblue font-eb d-sm-inline-block font-18 ml-3 ml-sm-0 ml-md-3 py-2 pl-3 pl-md-5 pr-5 mb-0 rounded-right-xl shadow-sm"><i><img src="{{asset('assets/images/Mask Group 10@2x.png')}}" class="align-bottom" width="35px"></i>&nbsp;&nbsp;Search results</p>
            </div>
            {{-- <div class="col-sm-auto col-12 ml-sm-auto">
                <div class="topbar-icon text-center text-md-right mt-3 mt-sm-0">
                    @include('user.sections.filters')
                </div>
            </div> --}}
        </div>
    </div>

        <div class="row px-xl-5 mx-0 mx-md-5 mb-2">

            <div class="col-12">
                {{-- <p class="lead">Narrow your search results by..</p> --}}
                <a onclick="$('#advanced-search-fields').toggle()" href="javascript:void(0)"><p class="lead">Show Advanced Search Fields.</p></a>
            </div>
            <div class="col-12 bg-lgray br-7 mt-2 mb-2 px-0 box-shadow" id="advanced-search-fields" style="display:none;">
                <form action="{{route('advance.search.results')}}" method="GET" class="create-risk-form risk-form" >
                    <fieldset class="form-group">
                        <div class="row mx-0">
                            <div class="col-12 col-md-12 col-xl-12 my-2">
                                <label class="font-eb font-14 mb-1">Search</label>
                                <input class="form-control p-4 br-7 box-shadow border-0 font-14 font-e color-dg" name="search" placeholder="Enter query here." value="@if(isset($_GET['search'])){{$_GET['search']}}@endif">
                            </div>
                            <div class="col-12 col-md-6 col-xl-6 my-2">
                                <label class="font-eb font-14 mb-1">Industry</label>
                                <select class="js-example-basic-multiple form-control p-4 br-7 box-shadow border-0 font-14 font-e color-dg" name="industry[]" multiple>
                                    <option></option>
                                    @if(isset($controls))
                                    @foreach($controls as $con)
                                        @if($con->type=='industry')
                                        <option value="{{$con->id}}" @if(isset($_GET['industry'])) @if(in_array($con->id,$_GET['industry'])) selected @endif @endif><strong>{{$con->name}} ({{$con->rccontrols_count}})</strong> </option>
                                        @endif
                                    @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="col-12 col-md-6 col-xl-6 my-2">
                                <label class="font-eb font-14 mb-1">Business framework</label>
                                <select class="js-example-basic-multiple form-control p-4 br-7 box-shadow border-0 font-14 font-e color-dg" name="framework[]" multiple>
                                    <option></option>
                                    @if(isset($controls))
                                    @foreach($controls as $con)
                                        @if($con->type=='bframework')
                                        <option value="{{$con->id}}" @if(isset($_GET['framework'])) @if(in_array($con->id,$_GET['framework'])) selected @endif @endif><strong>{{$con->name}} ({{$con->rccontrols_count}})</strong> </option>
                                        @endif
                                    @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="col-12 col-md-6 col-xl-6 my-2">
                                <label class="font-eb font-14 mb-1">Business process</label>
                                <select class="js-example-basic-multiple form-control p-4 br-7 box-shadow border-0 font-14 font-e color-dg" name="process[]" multiple>
                                    <option></option>
                                    @if(isset($controls))
                                    @foreach($controls as $con)
                                        @if($con->type=='bprocess')
                                        <option value="{{$con->id}}" @if(isset($_GET['process'])) @if(in_array($con->id,$_GET['process'])) selected @endif @endif><strong>{{$con->name}} ({{$con->rccontrols_count}})</strong> </option>
                                        @endif
                                    @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="col-12 col-md-6 col-xl-6 my-2">
                                <label class="font-eb font-14 mb-1">Tag</label>
                                <select class="js-example-basic-multiple form-control p-4 br-7 box-shadow border-0 font-14 font-e color-dg" name="tag[]" multiple>
                                    <option></option>
                                    @if(isset($tags))
                                    @foreach($tags as $tag)
                                        <option value="{{$tag->id}}" @if(isset($_GET['tag'])) @if(in_array($tag->id,$_GET['tag'])) selected @endif @endif><strong>{{$tag->name}} ({{$tag->rctags_count}})</strong> </option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="col-12 col-md-6 col-xl-6 my-2">
                                <label class="font-eb font-14 mb-1">User</label>
                                <select class="js-example-basic-multiple form-control p-4 br-7 box-shadow border-0 font-14 font-e color-dg" name="user[]" multiple>
                                    <option></option>
                                    @if(isset($users))
                                    @forelse($users as $user)
                                        <option value="{{$user->id}}" @if(isset($_GET['user'])) @if(in_array($user->id,$_GET['user'])) selected @endif @endif>{{$user->name}}</option>
                                    @empty

                                    @endforelse
                                    @endif
                                </select>
                            </div>

                            <div class="col-12 col-md-6 col-xl-6 my-2 d-flex flex-row align-items-end justify-content-end">
                                <a href="{{route('advanced.search')}}" class="btn border-1 color-r br-7 font-12 text-capitalize font-weight-bold mx-1" >Reset <i class="fas fa-reset"></i></a>
                                <button class="btn bg-red text-light br-7 font-12 text-capitalize font-weight-bold mx-1"><i class="fas fa-search"></i> Search</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>


        </div>



    <div class="row px-xl-5 mx-0 mx-md-5">
        {{-- Riskcontrol starts here --}}
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
        $('.js-example-basic-multiple').select2();
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




