@extends('user.layout.contributor')
@section('SiteTitle','User network || Riskory')
@section('content')
<div class="pl-0 col-12 col-md-9 py-2 pr-0 pr-md-5">
    <div class="row pt-4 align-items-center pb-3">
        <div class="pl-0 col-12 col-sm-auto">
            <p class="bg-lblue font-eb font-18 py-2 px-5 mb-0 rounded-right-xl shadow-sm"><i><img src="@if($user->avatar == 'images/avatars/default.png') https://ui-avatars.com/api/?background=random&name={{ str_replace(' ','+' ,$user->name) }} @else {{asset('userAvat/'.$user->avatar)}} @endif" class="rounded-circle shadow avatar-img align-middle bg-white"></i>&nbsp;&nbsp;My Network</p>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-8 text-center text-md-right ml-auto">
            <div class="d-inline">
                <button class="btn bg-red text-light br-7 font-12 text-capitalize font-weight-bold" id="find_other" onclick="toggleNetwork(this.id)" >Search people</button>
            </div>
            <div class="btn-group btn-group-toggle btn-follower" data-toggle="buttons">
               
              <label class="btn btn-secondary active">
                <input type="radio" name="options" id="following" autocomplete="off" checked onclick="toggleNetwork(this.id)"> Following
              </label>
              <label class="btn btn-secondary">
                <input type="radio" name="options" id="follower" autocomplete="off" onclick="toggleNetwork(this.id)"> Followers
              </label>
            </div>
        </div>
    </div>
    <div class="row px-2 pl-md-5 mx-0 mx-md-5 pt-3">
        <div class="col-12 bg-lgray br-7 border-0 box-shadow mb-4 py-1 px-5 p-md-5" id="followingU">
            @if($user->userFollowing->count())
            @php
                $i = 1;
            @endphp
            @foreach($user->userFollowing as $fol)
                <div class="row 
                @if($i%2 == 0)
                bg-dgray
                @else
                bg-white
                @endif
                pt-3 pt-md-4 br-10 my-3">
                <div class="col-12 col-md-6 text-center text-md-left float-md-left">
                    <img src="@if($fol->user->avatar == 'images/avatars/default.png')
                    https://ui-avatars.com/api/?background=random&name={{ str_replace(' ','+' ,$fol->user->name) }}
                    @else
                    {{asset('userAvat/'.$fol->user->avatar)}}
                    @endif
                    "  class="rounded-circle shadow avatar-img-lg bg-white align-top">
                    <div class="d-inline-block pt-1 pl-2">
                        <p class="p-style mb-0 font-eb font-18"><a href="{{route('visit.profile',$fol->user)}}" class="color-b">{{$fol->user->name}}</a></p>
                        <p class="p-style font-eb color-r font-14 mb-0">{{$fol->user->rcs->count()}} new risks</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 text-center text-md-right mt-4 mt-md-0 float-md-right">
                    <div class="d-inline-block mr-3">
                        <span title="Likes" class="font-eb color-r font-24"><i class="far fa-thumbs-up"></i></span>
                        <p class="p-style font-eb text-center">{{$fol->user->likes->count()}}</p>
                    </div>
                    <div class="d-inline-block mx-3">
                        <span title="Dislikes" class="font-eb color-r font-24"><i class="far fa-thumbs-down"></i></span>
                        <p class="p-style font-eb text-center">{{$fol->user->dislikes->count()}}</p>
                    </div>
                    <div class="d-inline-block ml-3">
                        <span title="Bookmarks" class="font-eb color-r font-24"><i class="far fa-bookmark"></i></span>
                        <p class="p-style font-eb text-center">{{$fol->user->bookmarks->count()}}</p>
                    </div>
                </div>
            </div>
            @php
                $i++;
            @endphp
            @endforeach
            @endif
            
            
        </div>

        <div class="col-12 bg-lgray br-7 border-0 box-shadow mb-4 py-1 px-5 p-md-5" style="display:none;" id="followerU">    
        @if($user->userFollowers->count())
            @php
                $i = 1;
            @endphp
            @foreach($user->userFollowers as $fols)
                <div class="row 
                @if($i%2 == 0)
                bg-dgray
                @else
                bg-white
                @endif
                pt-3 pt-md-4 br-7 my-3">
                <div class="col-12 col-md-6 text-center text-md-left float-md-left">
                    <img src="@if($fols->follower->avatar == 'images/avatars/default.png')
                    https://ui-avatars.com/api/?background=random&name={{ str_replace(' ','+' ,$fols->follower->name) }}
                    @else
                    {{asset('userAvat/'.$fols->follower->avatar)}}
                    @endif
                    "  class="rounded-circle shadow avatar-img-lg bg-white align-top">
                    <div class="d-inline-block pt-1 pl-2">
                        <p class="p-style mb-0 font-eb font-18"><a href="{{route('visit.profile',$fols->follower)}}" class="color-b">{{$fols->follower->name}}</a></p>
                        <p class="p-style font-eb color-r font-14 mb-0">12 new risks</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 text-center text-md-right mt-4 mt-md-0 float-md-right">
                    <div class="d-inline-block mr-3">
                        <span title="Likes" class="font-eb color-r font-24"><i class="far fa-thumbs-up"></i></span>
                        <p class="p-style font-eb text-center">{{$fols->follower->likes->count()}}</p>
                    </div>
                    <div class="d-inline-block mx-3">
                        <span title="Dislikes" class="font-eb color-r font-24"><i class="far fa-thumbs-down"></i></span>
                        <p class="p-style font-eb text-center">{{$fols->follower->dislikes->count()}}</p>
                    </div>
                    <div class="d-inline-block ml-3">
                        <span title="Bookmarks" class="font-eb color-r font-24"><i class="far fa-bookmark"></i></span>
                        <p class="p-style font-eb text-center">{{$fols->follower->bookmarks->count()}}</p>
                    </div>
                </div>
            </div>
            @php
                $i++;
            @endphp
            @endforeach
            @endif
        </div>

        <div class="col-12 bg-lgray br-7 border-0 box-shadow mb-4 py-1 px-5 p-md-5" style="display:none;" id="findotherU">    
           
            @livewire('search-user')
            
        </div>



    </div>
</div>

@endsection

@section('script')
<script>
    function toggleNetwork(id){
        div = document.getElementById(id);
        
            if(id == 'following'){
                tab = document.getElementById('followerU');
                tabHide = document.getElementById('followingU');
                tabHide2 = document.getElementById('findotherU');
                tabHide.style.display = 'block';
                tab.style.display = 'none';
                tabHide2.style.display = 'none';
                
            }else if(id == 'follower'){
                tab = document.getElementById('followerU');
                tabHide = document.getElementById('followingU');
                tabHide2 = document.getElementById('findotherU');
                tabHide.style.display = 'none';
                tab.style.display = 'block';
                tabHide2.style.display = 'none';
            }else if(id =='find_other'){
                tab = document.getElementById('followerU');
                tabHide = document.getElementById('followingU');
                tabHide2 = document.getElementById('findotherU');
                tabHide.style.display = 'none';
                tab.style.display = 'none';
                tabHide2.style.display = 'block';
            }
        
    }
</script>
@endsection