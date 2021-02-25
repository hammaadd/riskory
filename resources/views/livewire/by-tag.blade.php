<div class="col-12">
    <div class="row">
        @foreach($childs as $tg)
        <div class="col-12 col-sm-6 col-lg-6 mb-3">
            {{-- <div class="row align-items-center bg-lgray box-shadow py-2"> --}}
                <div class="div-hover">
                    <p class="p-style mb-0 d-inline mr-2"><a href="{{route('byTag',['tag'=>$tg])}}" data-toggle="tooltip" data-placement="top" title="{{$tg->name}}">{{Str::limit($tg->name,30)}}</a> ({{$tg->followers->count()}})</p>

                    @if (!($tg->followedBy(auth()->user())))
                        <button class="btn-follow btn-follow-2" onclick="parent.location='{{route('tag.follow',$tg->id)}}'">Follow</button>
                    @else
                        <form class="d-inline" action="{{route('tag.unfollow',$tg->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn-follow bg-dgray btn-follow-2" type="submit">Unfollow</button>
                        </form>
                    @endif
                </div>

                {{-- <div class="col-2">
                    <i class="fas fa-tag fa-rotate-90"></i>
                </div>
                <div class="col-7 pl-0">
                    <p class="p-style mb-0"><a href="{{route('byControl',['control'=>$dat,'type'=>$dat->type])}}">{{$dat->name}}</a> ({{$dat->rccontrols->whereNotIn('rc.status',['P','R'])->count()}})</p>
                </div>
                <div class="col-3">
                    @if (!($dat->followedBy(auth()->user())))
                        <button class="btn-follow" onclick="parent.location='{{route('control.follow',$dat->id)}}'">Follow</button>
                    @else
                <form action="{{route('control.unfollow',$dat->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn-follow bg-dgray" type="submit">Unfollow</button>
                </form>
                    @endif
                </div> --}}
            {{-- </div> --}}
        </div>
        @endforeach
        {{-- <a wire:click="load" href="#">Load more..</a> --}}
    </div>

    <div class="row">
        @if($childs->hasMorePages())
        <livewire:load-more-tags :page="$page" :perPage="$perPage" :control="$tag" />
    @endif
    </div>
</div>

