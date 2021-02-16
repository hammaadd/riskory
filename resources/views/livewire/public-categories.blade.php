<div class="row">
    <div class="col-12">
        <div class="row pl-3 pl-md-5 pt-3">
            @foreach($data as $dat)
                <div class="col-12 col-sm-6 col-lg-4 px-3 mb-3">
                    <div class="div-hover">
                        <p class="p-style mb-0 d-inline mr-3"><a href="{{route('byControlPublic',['control'=>$dat,'type'=>$dat->type])}}">{{$dat->name}}</a> ({{$dat->rccontrols->whereNotIn('rc.status',['P','R'])->count()}})</p>

                       
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="col-12 d-flex justify-content-center">
        <div  wire:loading>
           <img class="img-fluid" src="{{asset('assets/images/loader/loader1.gif')}}" alt="">
        </div>
    </div>
    <div class="col-12">
        @if($data->hasMorePages())
        <livewire:load-more-categories-public :page="$page" :perPage="$perPage" :req="$req" />
        @endif    
    </div>
</div>