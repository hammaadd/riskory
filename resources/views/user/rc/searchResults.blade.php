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
    {{-- @php
    $noLinks = 1;
    @endphp --}}
    <div class="row px-xl-5 mx-0 mx-md-5 mb-4">
        @if(isset($tags))
           <div class="col-12">
            <div class="row">
                @foreach($tags as $tg)
                <div class="col-12 col-sm-6 col-lg-6 mb-3">
                    {{-- <div class="row align-items-center bg-lgray box-shadow py-2"> --}}
                        <div class="div-hover">
                            <p class="p-style mb-0 d-inline mr-2"><a href="{{route('byTag',['tag'=>$tg])}}" data-toggle="tooltip" data-placement="top" title="{{$tg->name}}">{{Str::limit($tg->name,30)}}</a> ({{$tg->rctags->whereNotIn('rc.status',['P','R'])->count()}})</p>

                            @if (!($tg->followedBy(auth()->user())))
                                <button class="btn-follow btn-follow-2" onclick="parent.location='{{route('tag.follow',$tg->id)}}'">Follow</button>
                            @else
                                <form class="d-inline" action="{{route('tag.unfollow',$tg->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-follow bg-dgray btn-follow-2" type="submit">Unfollow</button>
                                </form>
                            @endif
                        </div>
                </div>
                @endforeach
                {{-- <a wire:click="load" href="#">Load more..</a> --}}
            </div>
        </div>
        @endif
    </div>
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
@include('user.sections.rcDeleteModal')
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
        $('#'+order_next).addClass('color-r');
        $('input[name="order"]').val(order_next);

    }

</script>
@endsection
@section('reveal')
<script src="{{asset('js/scrollreveal.min.js')}}"></script>
@endsection




