<div class="col-lg-4 pt-4 pt-lg-2 text-center position-relative ">
  <form action="{{route('search.rcs')}}" method="GET">
    <div class="input-group search-bar">
      
       
      <input type="text" wire:model.debounce.500ms="search" name="search" class="form-control" placeholder="Search Risks Here" aria-label="Search Risks Here" aria-describedby="basic-addon2">
      <div class="input-group-append">
        <button class="btn-search" type="submit"><i class="fas fa-search"></i></button>
      </div>
    
    </div>
  </form>

<div class="row position-absolute search-dropdown style-2 scrollbar">
  <div class="col-8 mx-0">
    <div class="list-group w-100">
    
      @foreach($rcs as $rc)
      <a href="{{route('rc.view',$rc->id)}}" class="list-group-item list-group-item-action text-left">
          <h5>{{$rc->title}} </h5>
          <p >{{Str::words($rc->description,5)}}</p>
          <small><span class="badge  badge-secondary">{{views($rc)->count()}} Views</span>  <span class="badge badge-secondary">{{$rc->likes->count()}} Likes </span> <span class="badge badge-secondary">Posted on: {{$rc->created_at}}</span></small>
      </a>          
      {{-- <a href="#" class="list-group-item list-group-item-action"></a> --}}
      @endforeach
      
      
    </div>
  </div>
</div>
