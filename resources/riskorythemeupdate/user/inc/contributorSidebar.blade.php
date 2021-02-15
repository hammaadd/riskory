@section('contributorSidebar')
<div class="col-12 col-md-3 py-4 box-shadow-sidebar">
    <div class="pl-lg-5 pr-lg-4 pt-3 border-1 text-center">
    <a href="http://skiller.com/" target="_blank"><img src="{{asset('assets/images/logo2.png')}}" class="mb-4"></a>
        <p class="p-style"><a href="http://skiller.com/" target="_blank" class="color-r text-underl">Visit the best employment platform here ..</a></p>
    </div>
  

    <p class="font-eb font-18 pt-3"><i class="fas fa-tags fa-rotate-90"></i>&nbsp;&nbsp;&nbsp; Most Opened Tags</p>
    <div class="row pl-2">
        @php
        $tags = App\Models\Tag::orderByUniqueViews()->limit(5)->get() 

        @endphp
        @foreach($tags as $tg)
        <div class="btn-group">
        <button class="bg-lgray border-0 color-b box-shadow py-2 px-3 font-16 mx-1 my-1 br-7" type="button" id="dropdownMenuButton{{$tg->id}}"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$tg->name}} <i class="fas fa-caret-down"></i></button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{$tg->id}}">
            <a class="dropdown-item" href="javascript:void(0)"><span>Views ({{views($tg)->count()}})</span></a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="javascript:void(0)"><span>Followers ({{$tg->followers->count()}})</span></a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{route('byTag',['tag'=>$tg])}}">Visit</a>
          </div>
        </div>
        @endforeach
        
        <button class="bg-lgray border-0 color-b box-shadow py-2 px-3 font-16 mx-1 my-1 br-7" onclick="parent.location='{{route('seeMore','tags')}}'">More ..</button>
    </div>
    <p class="font-eb font-18 pt-3"><i class="fas fa-tags fa-rotate-90"></i>&nbsp;&nbsp;&nbsp; People To Follow</p>
    <ul class="pl-0">
        @php 
            $users = App\Models\User::with('rcs')->withCount('rcs')->orderBy('rcs_count','DESC')->limit(3)->get();
           
        @endphp
    @foreach($users as $us)
        <li class="nav-link px-0">
            <img src="@if($us->avatar == 'images/avatars/default.png')
            https://ui-avatars.com/api/?background=random&name={{ str_replace(' ','+' ,$us->name) }}
            @else
            {{asset('userAvat/'.$us->avatar)}}
            @endif
            "  class="rounded-circle shadow avatar-img-lg bg-white align-top">
            <div class="d-inline-block pt-1 pl-2">
                <p class="p-style mb-0"><a href="{{route('visit.profile',$us)}}" class="color-b">{{$us->name}}</a></p>
                <p class="p-style color-r font-14 mb-0">{{$us->rcs_count}} new risks</p>
            </div>
        </li>
    @endforeach
        
    </ul>
    {{-- <p class="p-style text-underl pl-5 ml-5"><a href="#" class="color-b">More ..</a></p> --}}
</div>