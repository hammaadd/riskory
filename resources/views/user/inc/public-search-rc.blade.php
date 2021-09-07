 <div class="col-lg-4 pt-4 pt-lg-2 text-center position-relative ">
 <form action="{{route('public.advance.search.results')}}" method="GET" autocomplete="off">
    <input autocomplete="false" name="hidden" type="text" style="display:none;">
    <div class="input-group search-bar">

      <input type="text" name="search" class="form-control" placeholder="Search Here" aria-label="Search Here" aria-describedby="basic-addon2" value="@if(isset($_GET['search'])){{$_GET['search']}}@endif">
      {{-- <input type="text" wire:model.debounce.400ms="search" name="search" class="form-control" placeholder="Search Here" aria-label="Search Here" aria-describedby="basic-addon2"> --}}
      <div class="input-group-append">
        <button class="btn-search" type="submit"><i class="fas fa-search"></i></button>
      </div>

    </div>
    <div>
    <a href="{{route('public.advanced.search')}}" class="float-right d-inline-block"><span class="color-r">Advanced Search <i class="fas fa-cog"></i></span></a>
    </div>
    {{-- <a href="{{route('advanced.search')}}" class="float-right"><small class="color-r">Advanced Search <i class="fas fa-cog"></i></small></a> --}}
  </form>