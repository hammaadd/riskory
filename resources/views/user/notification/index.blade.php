@extends('user.layout.contributor')
@section('SiteTitle','Notifications || Riskory')
@section('content')
<div class="col-12 col-md-9 px-md-0 py-5">

    <div class="sect--title pl-3 pl-md-5">
        <div class="row mb-4 mb-xl-5">
            <div class="col-lg-auto col-12 px-0 pr-lg-3 sect--title__col">
                <p class="bg-lblue font-eb d-sm-inline-block font-18 ml-md-3 py-2 pl-3 pl-md-5 pr-5 mb-0 rounded-right-xl shadow-sm"><i class="fas fa-bell color-r"></i>&nbsp;&nbsp;New Notifications</p>
            </div>
        </div>
    </div>

    <div class="row px-xl-5 mx-0 mx-md-5 pt-3">
        <div class="col-12 px-0 mb-4">
            <a href="{{route('mark.all.read')}}" class="float-left font-eb font-16 color-r px-4 py-1 border-1 br-7 noti-btn">Mark all as read</a>
            <a href="{{route('all.read.notifications')}}" class="float-right font-eb font-16 color-r bg-transparent px-4 py-1 border-1 br-7 noti-btn">Old notifications</a>
        </div>
        <div class="col-12 bg-lgray br-7 border-0 box-shadow mb-4 p-3">
            @foreach($user->unreadNotifications as $not)
                @if($not->data['type']=='follower')
                @php
                    $follower = App\Models\User::find($not->data['follower_id']);
                @endphp
                <div class="py-2 py-md-0 text-left clearfix">
                    <div class="float-left noti-left">
                        <img src="
                        @if($follower->avatar == 'images/avatars/default.png') 
                        https://ui-avatars.com/api/?background=random&name={{ str_replace(' ','+' ,$follower->name) }} 
                        @else 
                        {{asset('userAvat/'.$follower->avatar)}} 
                        @endif
                        " class="rounded-circle shadow avatar-img-lg not-avt">
                        <div class="d-inline-block pt-1 pl-0 pl-md-2">
                            <p class="font-eb mt-2 font-16 color-b noti-text"><a href="{{route('visit.profile',$follower)}}" class="color-r">{{$follower->name}}</a> Followed You </p>
                        </div>
                    </div>
                    <span class="float-right noti-right">
                        @if($follower->followedBy(Auth::user()))
                            <form class="d-inline-block" action="{{route('user.unfollow',$follower)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn bg-red text-light br-7 font-12 text-capitalize font-weight-bold mr-4 btn-hover mt-2 notBtn" type="submit">Unfollow</button>
                            </form> 
                        @else
                            <button class="btn bg-red text-light br-7 font-12 text-capitalize font-weight-bold mr-4 btn-hover mt-2 notBtn" onclick="parent.location='{{route('follow.user',$follower)}}'">Follow Back</button>
                        @endif
                        {{-- <button class="btn bg-red text-light br-7 font-12 text-capitalize font-weight-bold mr-4 btn-hover mt-2">Follow Back</button> --}}
                        <div class="d-inline-block float-md-right mt-3">
                          <a class="color-dg" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-h"></i>
                          </a>
    
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="{{route('mark.notification.read',$not->id)}}">Mark as read</a>
                            <a class="dropdown-item" href="{{route('delete.notification',$not->id)}}">Delete</a>
                          </div>
                        </div>
                    </span>
                </div>
                <hr>
                @endif
                @if($not->data['type']=='liked')
                @php
                    $likedBy = App\Models\User::find($not->data['liked_id']);
                    $rc = App\Models\RiskControl::find($not->data['rc_id']);

                @endphp
                <div class="py-2 py-md-0 text-left clearfix">
                    <div class="float-left noti-left">
                        <img src="@if($likedBy->avatar == 'images/avatars/default.png') https://ui-avatars.com/api/?background=random&name={{ str_replace(' ','+' ,$likedBy->name) }} @else {{asset('userAvat/'.$likedBy->avatar)}} @endif" class="rounded-circle shadow avatar-img-lg not-avt">
                        <div class="d-inline-block pt-1 pl-0 pl-md-2">
                            <p class="font-eb mt-2 font-16 color-b noti-text"><a href="{{route('visit.profile',$likedBy)}}" class="color-r">{{$likedBy->name}}</a> Liked your <a href="{{route('rc.view',$rc->id)}}" class="color-r">risk control</a>  </p>
                        </div>
                    </div>
                    <span class="float-right noti-right">
                        
                        <div class="d-inline-block float-md-right mt-3">
                          <a class="color-dg" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-h"></i>
                          </a>
    
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="{{route('mark.notification.read',$not->id)}}">Mark as read</a>
                            <a class="dropdown-item" href="{{route('delete.notification',$not->id)}}">Delete</a>
                          </div>
                        </div>
                    </span>
                </div>
                <hr>
                @endif
            @endforeach
            
            
            
        </div>
    </div>
</div>

@endsection