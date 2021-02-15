@if($lists)
@php
$i=1;
@endphp
@foreach($lists as $ls)
<div class="row 
        @if($i%2==0)
        bg-white
        @else
        bg-white
        @endif px-1 px-md-5 py-3 py-md-4 br-7 my-3">
    <div class="col-9 col-md-9 text-left text-md-left float-md-left d-flex align-items-center justify-content-start">
        <img src="{{asset('assets/images/Mask Group 39@2x.png')}}" class="img-cicle d-inline-block align-top float-left" width="60px">
        <div class="d-inline-block pt-1 pl-2">
            {{-- <a type="button" href="javascript:void(0)" class="btn btn-lg btn-danger" data-toggle="popover" title="Description & actions" data-content="And here's some amazing content. It's very engaging. Right?"><i class="fas fa-caret-right"></i></a> --}}

            <p class="p-style mb-0 font-eb font-18"><a href="{{route('rcs.of.list',$ls)}}" class="color-b">{{$ls->name}} </a> <small><a href="javascript:void(0)" data-id="{{$ls->id}}" title="Delete list" data-toggle="modal" id="delListBtn" onclick="assignIdOfList({{$ls->id}})" data-target="#deleteModal">Delete</a></small></p>
            <small class="text-secondary">{{$ls->description}}</small>
            <p class="p-style font-eb color-r font-14 mb-0">{{$ls->listrcs->count()}} risks</p>
            <p><small>Created at: {{$ls->created_at}}</small></p>
        </div>
    </div>
    <input type="hidden" id="typeUrl" name="typeUrl" value="{{route('change.list.type')}}">
    <div class="col-3 col-md-3 text-center text-md-right mt-1 mt-md-0 float-md-right  d-flex align-items-center justify-content-end">
        <div class="d-inline-block mx-3 mt-2">
        @if($ls->type==0)
            <a href="javascript:void(0)" class="font-eb color-lg font-24" onclick="changeType({{$ls->id}},'public')" title="Private"><i class="fas fa-lock"></i></a>
            @elseif($ls->type==1)
            <a href="javascript:void(0)" class="font-eb color-lg font-24"  onclick="changeType({{$ls->id}},'private')" title="Public"><i class="fas fa-lock-open"></i></a>
            @endif
        </div>
    </div>
</div>

@php
$i++;
@endphp
@endforeach
{{-- Modal --}}


@endif