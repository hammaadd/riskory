<div class="d-inline-block align-bottom" id="like--button">
    @if (!($rc->likedBy(auth()->user())))
        <a class="box-shadow" role="button" onclick="parent.location='{{route('rc.like',$rc)}}'" href="javascript:void(0);" data-toggle="tooltip" data-placement="bottom" title="Like">
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
