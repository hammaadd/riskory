<div class="col-lg-4 pt-4 pt-lg-2 text-center position-relative ">
  <form action="{{route('search.rcs')}}" method="GET" autocomplete="off">
    <input autocomplete="false" name="hidden" type="text" style="display:none;">
    <div class="input-group search-bar">


      <input type="text" wire:model.debounce.400ms="search" name="search" class="form-control" placeholder="Search Here" aria-label="Search Here" aria-describedby="basic-addon2">
      <div class="input-group-append">
        <button class="btn-search" type="submit"><i class="fas fa-search"></i></button>
      </div>

    </div>
  </form>

<div class="row position-absolute search-dropdown style-2 scrollbar shadow br-7">
  <div class="mx-1 w-100" >
    <div wire:loading.inline>
        <img src="{{asset('loaders/svg-loaders/oval.svg')}}" class="my-2" width="40" height="40">
        Loading....
    </div>
    @if(isset($rcs))
    @if($rcs->count() > 0)
    <p class="font-18 font-bold">Risk Controls</p>
      @foreach($rcs as $rc)
      <a href="{{route('rc.view',$rc->id)}}" class="text-left d-block text-decoration-none search--anchor br-7 p-1 my-1 color-r">
       {{$rc->title}}
      </a>

      {{-- <a href="#" class="list-group-item list-group-item-action"></a> --}}
      @endforeach
    @endif
    @endif

  </div>
  @if(isset($controls))

  <div class="mx-1 mt-2 w-100">
    @if($controls->count() > 0)
        <p class="font-18 font-bold">Categories</p>
        @foreach($controls as $cont)
        <button class="btn bg-white color-r box-shadow br-7 font-14 px-2 text-capitalize mb-2 btn-hover" onclick="return parent.location='{{route('byControl',['control'=>$cont,'type'=>$cont->type])}}'">{{$cont->name}}</button>
        @endforeach
    @elseif(!($controls->count() > 0) && !($rcs->count() > 0))
        <p  class="font-18 font-bold">No results to show for "{{$search}}"</p>
    @endif
  </div>


  @endif
</div>
