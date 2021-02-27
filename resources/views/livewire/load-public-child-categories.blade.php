{{-- Success is as dangerous as failure. --}}
<li><span class="@if($dat->children->count() > 0) category-caret @else category-star @endif div-hover @if($parent == $dat->id) caret-down @endif" wire:click="loadMore({{$dat->id}})">

    <p class="p-style mb-0 d-inline mr-3"><a href="{{route('byControlPublic',['control'=>$dat,'type'=>$dat->type])}}"> {{ $dat->name}} <small>({{$dat->rccontrols->whereNotIn('rc.status',['P','R'])->count()}})</a> </p>
    </small>
    {{-- @if (!($dat->followedBy(auth()->user())))
        <button class="btn-follow btn-follow-2 d-inline" onclick="parent.location='{{route('control.follow',$dat->id)}}'">Follow</button>
    @else
        <form class="d-inline" action="{{route('control.unfollow',$dat->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn-follow bg-dgray btn-follow-2" type="submit">Unfollow</button>
        </form>
    @endif --}}


</span>
@if($parent == $dat->id)
@if($dat->children->count() > 0)
<ul class="nested-tree my-2">

@foreach($dat->children as $child1)
<livewire:load-public-child-categories :dat='$child1'>
@endforeach

</ul>
@endif
@endif
@if($parent != $dat->id)
<div wire:loading.inline>
    <img src="{{asset('loaders/svg-loaders/oval.svg')}}" width="20" height="20">
</div>
@endif
</li>


