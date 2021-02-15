<div class="col-lg-4 pt-4 pt-lg-2 text-center position-relative ">
  <form action="{{route('search.rcs')}}" method="GET" autocomplete="off">
    <input autocomplete="false" name="hidden" type="text" style="display:none;">
    <div class="input-group search-bar">
      
       
      <input type="text" wire:model.debounce.500ms="search" name="search" class="form-control" placeholder="Search Here" aria-label="Search Here" aria-describedby="basic-addon2">
      <div class="input-group-append">
        <button class="btn-search" type="submit"><i class="fas fa-search"></i></button>
      </div>
    
    </div>
  </form>

<div class="row position-absolute search-dropdown style-2 scrollbar shadow">
  <div class="col-12 mx-0 border-right">
    <div class="list-group w-100 list-group-flush">
      @foreach($rcs as $rc)
      <a href="{{route('rc.view',$rc->id)}}" class="list-group-item list-group-item-action text-left mt-1">
        <img src="{{$rc->user->avatar}}" alt="">  
        <h5>{{$rc->title}} </h5>
          {{-- <p >{{Str::words($rc->description,5)}}</p>
          <small><span class="badge  badge-secondary">{{views($rc)->count()}} Views</span>  <span class="badge badge-secondary">{{$rc->likes->count()}} Likes </span> <span class="badge badge-secondary">Posted on: {{$rc->created_at}}</span></small> --}}
      </a>
              
      {{-- <a href="#" class="list-group-item list-group-item-action"></a> --}}
      @endforeach
      
      
    </div>
  </div>
</div>
