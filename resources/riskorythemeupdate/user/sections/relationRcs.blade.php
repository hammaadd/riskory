@if($bookmarks)
@foreach($bookmarks as $b)
<?php $rc = $b->rcs;?>
<div class="row p-1 p-md-4">
    <div class="round col-2 col-sm-1">
    <input type="checkbox" name="selected[]" id="check{{$rc->id}}" value="{{$rc->id}}" data-title="{{$rc->title}}" onclick="listRelation(this.id)"/>
        <label for="check{{$rc->id}}"></label>
     </div>
     <div class="col-10 col-sm-11 bg-lgray br-20 border-0 box-shadow pl-0 pr-1 pr-md-4">
         <div class="row ml-0">
             <p class="br-tl-20 bg-white font-16 font-eb color-r px-3 py-1">{{views($rc)->count()}} views</p>
             <div class="pt-1 pl-3">
                 <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
             </div>
         </div>
         <div class="row px-md-4 px-1">
             <div class="col-12 col-md-5">
                 <p class="font-eb font-18 color-b mb-0">{{$rc->title}}</p>
                 <p class="font-e font-14 text-underl"><a href="{{route('rc.view',$rc->slug)}}" class="color-r" target="_blank">Click for more Info</a></p>
             </div>
             <div class="col-12 col-md-7">
                 <div class="modal-icon">
                    <div class="d-inline-block">
                        <a href="#listModal" data-toggle="modal"><i class="fas fa-list-ul"></i></a>
                        <p class="p-style font-eb text-center">8</p>
                    </div>
                    <div class="d-inline-block">
                        @if (!($rc->likedBy(auth()->user())))
                            <a role="button" href="javascript:void(0);"><i class="far fa-thumbs-up"></i></a>
                        @else
                           <button class="bg-dark" role="button"><i class="fas fa-thumbs-up"></i></button>
                            
                        @endif
                                <p class="p-style font-eb text-center">{{$rc->likes->count()}}</p>
                                
                            </div>
                            <div class="d-inline-block">
                        @if (!($rc->dislikedBy(auth()->user())))
                            <a role="button" href="javascript:void(0);"><i class="far fa-thumbs-down"></i></a>
                        @else
                          
                                <button class="bg-dark" role="button"><i class="fas fa-thumbs-down"></i></button>
                            
                        @endif
                                <p class="p-style font-eb text-center">{{$rc->dislikes->count()}}</p>
                                
                                
                            </div>
                            <div class="d-inline-block">
                            
                        @if (!($rc->bookmarkedBy(auth()->user())))
                            <a role="button"  href="javascript:void(0);"><i class="far fa-bookmark"></i></a>
                        @else
                           
                                <button class="bg-dark" role="button"><i class="fas fa-bookmark"></i></button>
                            
                        @endif
                                <p class="p-style font-eb text-center">{{$rc->bookmarks->count()}}</p>
                            </div>
                </div>
             </div>
         </div>
     </div>
</div>

@endforeach
{!! $bookmarks->links() !!}
@endif