@extends('user.layout.contributor')
@section('SiteTitle','Advanced search|| Riskory')
@section('select2')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

@endsection
@section('content')
<div class="col-12 col-md-9 px-md-0 py-5">

    <div class="sect--title pl-sm-3 px-md-5">
        <div class="row mb-4 mb-xl-3 align-items-sm-center">
            <div class="col-sm-auto col-12 px-0 pr-lg-3 sect--title__col">
                <p class="bg-lblue font-eb d-sm-inline-block font-18 ml-3 ml-sm-0 ml-md-3 py-2 pl-3 pl-md-5 pr-5 mb-0 rounded-right-xl shadow-sm"><i class="fas fa-search color-r"></i>&nbsp;&nbsp;Advanced Search</p>
            </div>
            <div class="col-sm-auto col-12 ml-sm-auto">
                <div class="topbar-icon text-center text-md-right mt-3 mt-sm-0">

                </div>
            </div>
        </div>
    </div>
    <form action="{{route('advance.search.results')}}" method="GET" >
    <div class="row px-xl-3 mx-0 mx-md-3">

        <div class="col-12"><p class="lead">Narrow your search results by..</p></div>

            <div class="col-12 col-md-6 col-xl-6 my-2">
                <label class="font-eb font-14 mb-1">Industry</label>
                <select class="js-example-basic-multiple form-control p-5 br-7 box-shadow border-0 font-16 font-e color-dg" name="industry">
                    <option></option>
                    @foreach($controls as $con)
                        @if($con->type=='industry')
                        <option value="{{$con->id}}"><strong>{{$con->name}} ({{$con->rccontrols_count}})</strong> </option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="col-12 col-md-6 col-xl-6 my-2">
                <label class="font-eb font-14 mb-1">Business framework</label>
                <select class="js-example-basic-multiple form-control p-5 br-7 box-shadow border-0 font-16 font-e color-dg" name="framework">
                    <option></option>
                    @foreach($controls as $con)
                        @if($con->type=='bframework')
                        <option value="{{$con->id}}"><strong>{{$con->name}} ({{$con->rccontrols_count}})</strong> </option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="col-12 col-md-6 col-xl-6 my-2">
                <label class="font-eb font-14 mb-1">Business process</label>
                <select class="js-example-basic-multiple form-control p-5 br-7 box-shadow border-0 font-16 font-e color-dg" name="process">
                    <option></option>
                    @foreach($controls as $con)
                        @if($con->type=='bprocess')
                        <option value="{{$con->id}}"><strong>{{$con->name}} ({{$con->rccontrols_count}})</strong> </option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="col-12 col-md-6 col-xl-6 my-2">
                <label class="font-eb font-14 mb-1">Tag</label>
                <select class="js-example-basic-multiple form-control p-5 br-7 box-shadow border-0 font-16 font-e color-dg" name="tag">
                    <option></option>
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}"><strong>{{$tag->name}} ({{$tag->rctags_count}})</strong> </option>
                    @endforeach
                </select>
            </div>

            <div class="col-12 col-md-6 col-xl-6 my-2">
                <label class="font-eb font-14 mb-1">User</label>
                <select class="js-example-basic-multiple form-control p-5 br-7 box-shadow border-0 font-16 font-e color-dg" name="user">
                    <option></option>
                    @forelse($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @empty

                    @endforelse
                </select>
            </div>

            <div class="col-12 col-md-6 col-xl-6 my-2 d-flex flex-column align-items-end justify-content-end">
                <button class="btn bg-red text-light br-7 font-12 text-capitalize font-weight-bold">Search <i class="fas fa-search"></i></button>
            </div>
            {{-- <div class="col-12 col-md-6 col-xl-6 my-2">
                <label class="font-eb font-14 mb-1">This exact word or phrase</label>
                <input type="text" name="title" value="" class="form-control br-7 box-shadow border-0 font-14 font-e color-dg "  required>

            </div> --}}





    </div>
</form>

</div>


@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });

</script>

@endsection
