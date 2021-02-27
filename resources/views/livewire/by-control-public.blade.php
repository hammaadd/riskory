<div class="col-12">
    <div class="row">
        @foreach($childs as $dat)
        <div class="col-12 col-sm-6 col-lg-4 mb-2">
            <div class="div-hover">
                <p class="p-style mb-0 d-inline mr-3"><a href="{{route('byControlPublic',['control'=>$dat,'type'=>$dat->type])}}" data-toggle="tooltip" data-placement="top" title="{{$dat->name}}">{{Str::limit($dat->name,25)}}</a> ({{$dat->rccontrols->whereNotIn('rc.status',['P','R'])->count()}})</p>
            </div>
        </div>
        @endforeach
        {{-- <a wire:click="load" href="#">Load more..</a> --}}
    </div>

    <div class="row">
        @if($childs->hasMorePages())
        <livewire:load-more-categories-public :page="$page" :perPage="$perPage" :control="$control" />
        @endif
    </div>
</div>

