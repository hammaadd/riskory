<div class="row ">
   <div class="col-12 bg-white px-1 px-md-5 py-3 br-7 my-3">
    <form action="#" method="GET" autocomplete="off">
        <input autocomplete="false" name="hidden" type="text" style="display:none;">
        <div class="input-group search-bar">
          
           
          <input type="text" wire:model.debounce.500ms="search" name="search" class="form-control" placeholder="Search People Here" aria-label="Search People Here" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn-search" type="button"><i class="fas fa-search"></i></button>
          </div>
        
        </div>
      </form>
   </div>

   <div class="col-12 bg-white px-1 px-md-5 py-3 br-7 my-3">
       <div wire:loading>
        <p class="lead">"Finding....."</p>
       </div>

        @if($users)
        @php
        $i=0;
        @endphp         
        @foreach($users as $fols)
                <div class="row 
                        @if($i%2 == 0)
                        bg-dgray
                        @else
                        bg-white
                        @endif
                        px-1 px-md-5 pt-3 pt-md-4 br-7 my-3">
                        <div class="col-12 col-md-6 text-center text-md-left float-md-left">
                            <img src="@if($fols->avatar == 'images/avatars/default.png')
                            https://ui-avatars.com/api/?background=random&name={{ str_replace(' ','+' ,$fols->name) }}
                            @else
                            {{asset('userAvat/'.$fols->avatar)}}
                            @endif
                            "  class="rounded-circle shadow avatar-img-lg bg-white align-top">
                            <div class="d-inline-block pt-1 pl-2">
                                <p class="p-style mb-0 font-eb font-18"><a href="{{route('visit.profile',$fols)}}" class="color-b">{{$fols->name}}</a></p>
                                <p class="p-style font-eb color-r font-14 mb-0">{{$fols->rcs->count()}} risks</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 text-center text-md-right mt-4 mt-md-0 float-md-right">
                            <div class="d-inline-block mx-3">
                                <span title="Likes" class="font-eb color-r font-24"><i class="far fa-thumbs-up"></i></span>
                                <p class="p-style font-eb text-center">{{$fols->likes->count()}}</p>
                            </div>
                            <div class="d-inline-block mx-3">
                                <span title="Dislikes" class="font-eb color-r font-24"><i class="far fa-thumbs-down"></i></span>
                                <p class="p-style font-eb text-center">{{$fols->dislikes->count()}}</p>
                            </div>
                            <div class="d-inline-block mx-3">
                                <span title="Bookmarks" class="font-eb color-r font-24"><i class="far fa-bookmark"></i></span>
                                <p class="p-style font-eb text-center">{{$fols->bookmarks->count()}}</p>
                            </div>
                        </div>
                    </div>
            @php
                $i++;
            @endphp
            @endforeach
            @else
                <p class="lead">"No search results to show type in the search bar to find people"</p>
            @endif
   </div>
</div>
