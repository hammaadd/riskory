<div class="d-inline-block align-bottom">
    @if (!($rc->likedBy(auth()->user())))
        <a class="box-shadow" role="button" href="javascript:void(0)" onclick="parent.location='{{route('rc.like',$rc)}}'" data-toggle="tooltip" data-placement="bottom" title="Like">
            <i class="far fa-thumbs-up"></i>
            <span class="font-eb">{{$rc->likes->count()}}</span>
        </a>
    @else
        <form action="{{route('rc.unlike',$rc)}}" name="unlike" method="POST">
            @csrf
            @method('DELETE')
            <button class="box-shadow" role="button" type="submit" data-toggle="tooltip" data-placement="bottom" title="Unlike">
                <i class="fas fa-thumbs-up"></i>
                <span class="font-eb">{{$rc->likes->count()}}</span>
            </button>
        </form>
    @endif
</div>

<div class="d-inline-block align-bottom">
    @if (!($rc->dislikedBy(auth()->user())))
        <a class="box-shadow" role="button" onclick="parent.location='{{route('rc.dislike',$rc)}}'" href="javascript:void(0);" data-toggle="tooltip" data-placement="bottom" title="Dislike">
            <i class="far fa-thumbs-down"></i>
            <span class="font-eb">{{$rc->dislikes->count()}}</span>
        </a>
    @else
        <form action="{{route('rc.undislike',$rc)}}" name="undislike" method="POST">
            @csrf
            @method('DELETE')
            <button class="box-shadow" role="button" type="submit" data-toggle="tooltip" data-placement="bottom" title="Undislike">
                <i class="fas fa-thumbs-down"></i>
                <span class="font-eb">{{$rc->dislikes->count()}}</span>
            </button>
        </form>
    @endif
</div>
<div class="d-inline-block align-bottom">
    @if (!($rc->bookmarkedBy(auth()->user())))
        <a class="box-shadow" role="button" onclick="parent.location='{{route('rc.bookmark',$rc)}}'" href="javascript:void(0);" data-toggle="tooltip" data-placement="bottom" title="Bookmark">
            <i class="far fa-bookmark"></i>
            <span class="font-eb">{{$rc->bookmarks->count()}}</span>
        </a>
    @else
        <form action="{{route('rc.unbookmark',$rc)}}" name="unbookmark{{$rc->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="box-shadow" role="button" type="submit" data-toggle="tooltip" data-placement="bottom" title="Unmark">
                <i class="fas fa-bookmark"></i>
                <span class="font-eb">{{$rc->bookmarks->count()}}</span>
            </button>
        </form>
    @endif
</div>

