<div class="row">
    <div class="col-12">
        <div class="row pl-3 pl-md-5">
            @foreach($data as $dat)
                <div class="col-12 col-sm-6 col-lg-6 px-3 mb-2">
                    <div class="div-hover">
                        <p class="p-style mb-0 d-inline mr-3"><a href="{{route('byControl',['control'=>$dat,'type'=>$dat->type])}}" data-toggle="tooltip" title="{{$dat->name}}">{{Str::limit($dat->name,30)}}</a> ({{$dat->rccontrols->whereNotIn('rc.status',['P','R'])->count()}})</p>

                        @if (!($dat->followedBy(auth()->user())))
                            <button class="btn-follow btn-follow-2" onclick="parent.location='{{route('control.follow',$dat->id)}}'">Follow</button>
                        @else
                            <form class="d-inline" action="{{route('control.unfollow',$dat->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn-follow bg-dgray btn-follow-2" type="submit">Unfollow</button>
                            </form> 
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="col-12">
        @if($data->hasMorePages())
        <livewire:load-more-categories :page="$page" :perPage="$perPage" :req="$req" />
        @endif    
    </div>
</div>