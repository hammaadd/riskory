 <div class="pt-4 pt-lg-2 text-center position-relative advanced-search-form-wrapper">
 <form action="{{route('public.advance.search.results')}}" method="GET" autocomplete="off" class="advanced-search-form">
    <input autocomplete="false" name="hidden" type="text" style="display:none;">
    <div class="input-group search-bar">

      <input type="text" name="search" class="form-control" placeholder="Search Here" aria-label="Search Here" aria-describedby="basic-addon2" value="@if(isset($_GET['search'])){{$_GET['search']}}@endif">
      {{-- <input type="text" wire:model.debounce.400ms="search" name="search" class="form-control" placeholder="Search Here" aria-label="Search Here" aria-describedby="basic-addon2"> --}}
      <div class="input-group-append">
        <button class="btn-search" type="submit"><i class="fas fa-search"></i></button>
      </div>

    </div>
    <div class="advanced-search-btn">
    <a href="{{route('public.advanced.search')}}" class="float-lg-right d-inline-block"><span class="color-r">Advanced Search <i class="fas fa-cog"></i></span></a>
    </div>
    {{-- <a href="{{route('advanced.search')}}" class="float-right"><small class="color-r">Advanced Search <i class="fas fa-cog"></i></small></a> --}}
  </form>
