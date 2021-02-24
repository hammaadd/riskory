{{-- Success is as dangerous as failure. --}}
    <li><span class="@if($dat->children->count() > 0) category-caret @endif div-hover @if($parent == $dat->id) caret-down @endif" wire:click="loadMore({{$dat->id}})">

        <p class="p-style mb-0 d-inline mr-3"><a href="{{route('byControl',['control'=>$dat,'type'=>$dat->type])}}"> {{ $dat->name}}</a> </p>

        @if (!($dat->followedBy(auth()->user())))
            <button class="btn-follow btn-follow-2 d-inline" onclick="parent.location='{{route('control.follow',$dat->id)}}'">Follow</button>
        @else
            <form class="d-inline" action="{{route('control.unfollow',$dat->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn-follow bg-dgray btn-follow-2" type="submit">Unfollow</button>
            </form>
        @endif


</span>
@if($parent == $dat->id)
 @if($dat->children->count() > 0)
 <ul class="nested-tree my-2">

    @foreach($dat->children as $child1)
    <livewire:load-child-categories :dat='$child1'>
    @endforeach

 </ul>
 @endif
@endif
</li>


