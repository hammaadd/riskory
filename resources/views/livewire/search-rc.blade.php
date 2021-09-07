<div class="col-lg-4 pt-4 pt-lg-2 text-center position-relative ">
  <form action="{{route('advance.search.results')}}" method="GET" autocomplete="off">
    <input autocomplete="false" name="hidden" type="text" style="display:none;">
    <div class="input-group search-bar">

      <input type="text" name="search" class="form-control" placeholder="Search Here" aria-label="Search Here" aria-describedby="basic-addon2">
      {{-- <input type="text" wire:model.debounce.400ms="search" name="search" class="form-control" placeholder="Search Here" aria-label="Search Here" aria-describedby="basic-addon2"> --}}
      <div class="input-group-append">
        <button class="btn-search" type="submit"><i class="fas fa-search"></i></button>
      </div>

    </div>
    <div>
    <a href="{{route('advanced.search')}}" class="float-right d-inline-block"><span class="color-r">Advanced Search <i class="fas fa-cog"></i></span></a>
    </div>
    {{-- <a href="{{route('advanced.search')}}" class="float-right"><small class="color-r">Advanced Search <i class="fas fa-cog"></i></small></a> --}}
  </form>
{{-- </div> --}}
{{-- <div class="row position-absolute search-dropdown style-2 scrollbar shadow br-7" id="search---dropdown">
    @if(isset($rcs) || isset($controls))
    <div class="col-12 mt-2 ">
        @if(isset($rcs))
        @if($rcs->count() > 0)
            <p class="font-18 font-bold float-left d-inline-block">Risk Controls</p>
        @endif
        @endif
        <a href="{{route('advanced.search')}}" class="float-right d-inline-block"><span class="color-r">Advanced Search <i class="fas fa-cog"></i></span></a>
    </div>
    @endif
  <div class="mx-1 w-100" >
    <div wire:loading.inline>
        <img src="{{asset('loaders/svg-loaders/oval.svg')}}" class="my-2" width="40" height="40">
        Loading....
    </div>
    @if(isset($rcs))
    @if($rcs->count() > 0)

      @foreach($rcs as $rc)
      <a href="{{route('rc.view',$rc->id)}}" class="text-left d-block text-decoration-none search--anchor br-7 p-1 my-1 color-r">
       {{$rc->title}}
      </a>

      @endforeach
    @endif
    @endif

  </div>
  @if(isset($tags))
  <div class="mx-1 mt-2 w-100">
    @if($tags->count() > 0)
        <p class="font-18 font-bold">Tags</p>
        @foreach($tags as $tg)
        <button class="btn bg-white color-r box-shadow br-7 font-14 px-2 text-capitalize mb-2 btn-hover" onclick="return parent.location='{{route('byTag',['tag'=>$tg])}}'" title="{{$tg->name}}">{{Str::limit($tg->name,30)}}</button>
        @endforeach
    @elseif(!($tags->count() > 0) && !($rcs->count() > 0))
        
    @endif
  </div>
  @endif
  @if(isset($controls))
    <div class="mx-1 mt-2 w-100">
      @if($controls->count() > 0)
          <p class="font-18 font-bold">Categories</p>
          @foreach($controls as $cont)
          <button class="btn bg-white color-r box-shadow br-7 font-14 px-2 text-capitalize mb-2 btn-hover" onclick="return parent.location='{{route('byControl',['control'=>$cont,'type'=>$cont->type])}}'" title="{{$cont->name}}">{{Str::limit($cont->name,30)}}</button>
          @endforeach
      @elseif(!($controls->count() > 0) && !($rcs->count() > 0))
          <p  class="font-18 font-bold">No results to show for "{{$search}}"</p>
      @endif
    </div>
  @endif

</div> --}}

