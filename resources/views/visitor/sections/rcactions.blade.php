<div class="d-inline-block align-bottom">
    @if(auth()->user())
        @if (!($rc->likedBy(auth()->user())))
            <a class="box-shadow" role="button" onclick="parent.location='{{route('rc.like',$rc)}}'" href="javascript:void(0);" title="Likes">
                <i class="far fa-thumbs-up"></i>
                <span class="font-eb">{{$rc->likes->count()}}</span>
            </a>
        @else
            <form action="{{route('rc.unlike',$rc)}}" name="unlike" method="POST">
                @csrf
                @method('DELETE')
                <button class="box-shadow" role="button" type="submit" title="Unlike">
                    <i class="fas fa-thumbs-up"></i>
                    <span class="font-eb">{{$rc->likes->count()}}</span>
                </button>
            </form>
        @endif
    @else
        <a class="box-shadow" role="button" onclick="parent.location='{{route('rc.like',$rc)}}'" href="javascript:void(0);" title="Likes">
            <i class="far fa-thumbs-up"></i>
            <span class="font-eb">{{$rc->likes->count()}}</span>
        </a>   
    @endif
</div>

<div class="d-inline-block align-bottom">
    @if(auth()->user())
        @if (!($rc->dislikedBy(auth()->user())))
            <a class="box-shadow" role="button" onclick="parent.location='{{route('rc.dislike',$rc)}}'" href="javascript:void(0);" title="Dislikes">
                <i class="far fa-thumbs-down"></i>
                <span class="font-eb">{{$rc->dislikes->count()}}</span>
            </a>
        @else
            <form action="{{route('rc.undislike',$rc)}}" name="undislike" method="POST">
                @csrf
                @method('DELETE')
                <button class="box-shadow" role="button" type="submit">
                    <i class="fas fa-thumbs-down"></i>
                    <span class="font-eb">{{$rc->dislikes->count()}}</span>
                </button>
            </form>
        @endif
    @else
        <a class="box-shadow" role="button" onclick="parent.location='{{route('rc.dislike',$rc)}}'" href="javascript:void(0);" title="Dislikes">
            <i class="far fa-thumbs-down"></i>
            <span class="font-eb">{{$rc->dislikes->count()}}</span>
        </a>   
    @endif
</div>
<div class="d-inline-block align-bottom">
    @if(auth()->user())
        @if (!($rc->bookmarkedBy(auth()->user())))
            <a class="box-shadow" role="button" onclick="parent.location='{{route('rc.bookmark',$rc)}}'" href="javascript:void(0);" title="Bookmarks">
                <i class="far fa-bookmark"></i>
                <span class="font-eb">{{$rc->bookmarks->count()}}</span>
            </a>
        @else
            <form action="{{route('rc.unbookmark',$rc)}}" name="unbookmark{{$rc->id}}" method="POST" title="Unmark">
                @csrf
                @method('DELETE')
                <button class="box-shadow" role="button" type="submit">
                    <i class="fas fa-bookmark"></i>
                    <span class="font-eb">{{$rc->bookmarks->count()}}</span>
                </button>
            </form>
        @endif
    @else
        <a class="box-shadow" role="button" onclick="parent.location='{{route('rc.bookmark',$rc)}}'" href="javascript:void(0);" title="Bookmarks">
            <i class="far fa-bookmark"></i>
            <span class="font-eb">{{$rc->bookmarks->count()}}</span>
        </a>
    @endif
</div>

