<div class="col-12">
    <div class="row">
        @foreach($childs as $dat)
        <div class="col-12 col-sm-6 col-md-4 px-4 mb-3">
            
                <div class="div-hover">
                    <p class="p-style mb-0 d-inline mr-3"><a href="{{route('byControlPublic',['control'=>$dat,'type'=>$dat->type])}}">{{$dat->name}}</a> ({{$dat->rccontrols->whereNotIn('rc.status',['P','R'])->count()}})</p>
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
    
    