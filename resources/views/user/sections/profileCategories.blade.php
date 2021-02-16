<!-- Browse By Industry Secion -->
<div class="sect--title pl-md-5">
    <div class="row mb-3">
        <div class="col-lg-auto col-12 px-0 pr-lg-3 sect--title__col">
            <p class="bg-lblue font-eb d-sm-inline-block font-18 py-2 pl-4 pl-md-5 pr-5 mb-0 rounded-right-xl shadow-sm"><img src="{{asset('assets/images/Mask-Group-55.svg')}}" class="align-bottom ml-3" width="35px">&nbsp;&nbsp;Industry</p>
        </div>
    </div>
</div>

<div class="row pl-3 pl-md-5 pb-4">
    @if($controls->where('control.type','=','industry')->count()<1)
        <div class="col-12">
            <h3 class="lead font-24 font-weight-bold">Not following industries.</h3>
        </div>
    @endif
    @foreach($controls as $con)
    <?php $ind = $con->control;?>
    @if($ind->type == 'industry')
    <div class="col-12 col-sm-6 col-lg-4 mb-3">
        <div class="div-hover">
            <p class="p-style mb-0 d-inline mr-3"><a href="{{route('byControl',['control'=>$ind,'type'=>$ind->type])}}">{{$ind->name}}</a> ({{$ind->followers->count()}})</p>

            @if (!($ind->followedBy(auth()->user())))
                <button class="btn-follow btn-follow-2" onclick="parent.location='{{route('control.follow',$ind->id)}}'">Follow</button>
            @else
                <form class="d-inline" action="{{route('control.unfollow',$ind->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn-follow bg-dgray btn-follow-2" type="submit">Unfollow</button>
                </form>
            @endif
        </div>
    </div>
    @endif
    @endforeach
</div>

<!-- Browse By Business Process Section -->
<div class="sect--title pl-md-5">
    <div class="row mb-3">
        <div class="col-lg-auto col-12 px-0 pr-lg-3 sect--title__col">
            <p class="bg-lblue font-eb d-sm-inline-block font-18 py-2 pl-4 pl-md-5 pr-5 mb-0 rounded-right-xl shadow-sm"><img src="{{asset('assets/images/Mask Group 56.svg')}}" class="align-bottom ml-3" width="35px">&nbsp;&nbsp;Business Process</p>
        </div>
    </div>
</div>

<div class="row pl-3 pl-md-5 pb-4">
    @if($controls->where('control.type','=','bprocess')->count()<1)
        <div class="col-12">
            <h3 class="lead font-24 font-weight-bold">Not following any business processes.</h3>
        </div>
    @endif
    @foreach($controls as $con)
    <?php $ind = $con->control;?>
    @if($ind->type == 'bprocess')
    
    <div class="col-12 col-md-6 col-lg-4 px-4 pb-3 d-flex">
        <div class="row align-items-center bg-lgray box-shadow py-2 w-100">
            <div class="col-2">
                <i class="fas fa-tag fa-rotate-90"></i>
            </div>
            <div class="col-6 pl-0">
                <p class="p-style mb-0"><a href="{{route('byControl',['control'=>$ind,'type'=>$ind->type])}}">{{$ind->name}}</a> ({{$ind->followers->count()}})</p>
            </div>
            <div class="col-4">
                @if (!($ind->followedBy(auth()->user())))
                    <button class="btn-follow" onclick="parent.location='{{route('control.follow',$ind->id)}}'">Follow</button>
                @else
            <form action="{{route('control.unfollow',$ind->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn-follow bg-dgray" type="submit">Unfollow</button>
            </form> 
                @endif
            </div>
        </div>
    </div>
    @endif
    @endforeach
</div>

<!-- Browse By Framework Section -->
<div class="sect--title pl-md-5">
    <div class="row mb-3">
        <div class="col-lg-auto col-12 px-0 pr-lg-3 sect--title__col">
            <p class="bg-lblue font-eb d-sm-inline-block font-18 py-2 pl-4 pl-md-5 pr-5 mb-0 rounded-right-xl shadow-sm"><img src="{{asset('assets/images/Mask Group 57.svg')}}" class="align-bottom ml-3" width="35px">&nbsp;&nbsp;Framework</p>
        </div>
    </div>
</div>

<div class="row pl-3 pl-md-5 pb-4">
    @if($controls->where('control.type','=','bframework')->count()<1)
    <div class="col-12">
        <h3 class="lead font-24 font-weight-bold">Not following any business framework.</h3>
    </div>
    @endif
    @foreach($controls as $con)
    <?php $ind = $con->control;?>
    @if($ind->type == 'bframework')
        
        <div class="col-12 col-md-6 col-lg-4 px-4 pb-3 d-flex">
            <div class="row align-items-center bg-lgray box-shadow py-2 w-100">
                <div class="col-2">
                    <i class="fas fa-tag fa-rotate-90"></i>
                </div>
                <div class="col-6 pl-0">
                    <p class="p-style mb-0"><a href="{{route('byControl',['control'=>$ind,'type'=>$ind->type])}}">{{$ind->name}}</a> ({{$ind->followers->count()}})</p>
                </div>
                <div class="col-4">
                    @if (!($ind->followedBy(auth()->user())))
                        <button class="btn-follow" onclick="parent.location='{{route('control.follow',$ind->id)}}'">Follow</button>
                    @else
                <form action="{{route('control.unfollow',$ind->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn-follow bg-dgray" type="submit">Unfollow</button>
                </form> 
                    @endif
                </div>
            </div>
        </div>
    @endif
    @endforeach
</div>

<!-- Browse By Tags Section -->
<div class="sect--title pl-md-5">
    <div class="row mb-3">
        <div class="col-lg-auto col-12 px-0 pr-lg-3 sect--title__col">
            <p class="bg-lblue font-eb d-sm-inline-block font-18 py-2 pl-4 pl-md-5 pr-5 mb-0 rounded-right-xl shadow-sm"><img src="{{asset('assets/images/Icon awesome-tags.png')}}" class="align-bottom ml-3" width="35px">&nbsp;&nbsp;Tags</p>
        </div>
    </div>
</div>

<div class="row pl-3 pl-md-5 pb-4">
    @if($tags->count()<1)
    <div class="col-12">
        <h3 class="lead font-24 font-weight-bold">Not following any tag.</h3>
    </div>
    @endif
    @foreach($tags as $tag)
    <?php $tg = $tag->tag; ?>
    <div class="col-12 col-sm-6 col-lg-4 mb-3">
        <div class="div-hover">
            <p class="p-style mb-0 d-inline mr-3"><a href="{{route('byTag',['tag'=>$tg])}}">{{$tg->name}}</a> ({{$tg->followers->count()}})</p>

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
    </div>
    @endforeach
</div>