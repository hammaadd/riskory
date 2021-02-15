                    <!-- Browse By Industry Secion -->
                    <div class="row">
                        <div class="pl-0 col-12 col-sm-10 col-md-7 col-lg-5">
                            <p class="bg-lblue font-eb font-18 py-2 px-2 px-md-5 rounded-right-xl shadow-sm"><i><img src="{{asset('assets/images/Mask-Group-55.svg')}}" class="align-bottom" width="35px"></i>&nbsp;&nbsp;Industry</p>
                        </div>
                    </div>
                   
                    <div class="row pl-3 pl-md-5">
                    @if($controls->where('control.type','=','industry')->count()<1)
                    <div class="col-12 text-center">
                        <h3 class="lead font-24 mt-5">Not following industries.</h3>
                    </div>
                    @endif
                    @foreach($controls as $con)
                    <?php $ind = $con->control;?>
                    @if($ind->type == 'industry')
                        
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
                   
                    <!-- Browse By Business Process Section -->
                    <div class="row">
                        <div class="pl-0 col-12 col-sm-10 col-md-7 col-lg-5 mt-5">
                            <p class="bg-lblue font-eb font-18 py-2 px-2 px-md-5 rounded-right-xl shadow-sm"><i><img src="{{asset('assets/images/Mask Group 56.svg')}}" class="align-bottom" width="35px"></i>&nbsp;&nbsp;Business Process</p>
                        </div>
                    </div>
                    <div class="row pl-3 pl-md-5">
                    @if($controls->where('control.type','=','bprocess')->count()<1)
                    <div class="col-12 text-center">
                        <h3 class="lead font-24 mt-5">Not following any business processes.</h3>
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
                    <div class="row">
                        <div class="pl-0 col-12 col-sm-10 col-md-7 col-lg-5 mt-5">
                            <p class="bg-lblue font-eb font-18 py-2 px-2 px-md-5 rounded-right-xl shadow-sm"><i><img src="{{asset('assets/images/Mask Group 57.svg')}}" class="align-bottom" width="35px"></i>&nbsp;&nbsp;Framework</p>
                        </div>
                    </div>
                    <div class="row pl-3 pl-md-5">
                        @if($controls->where('control.type','=','bframework')->count()<1)
                        <div class="col-12 text-center">
                            <h3 class="lead font-24 mt-5">Not following any business framework.</h3>
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
                    <div class="row">
                        <div class="pl-0 col-12 col-sm-10 col-md-7 col-lg-5 mt-5">
                            <p class="bg-lblue font-eb font-18 py-2 px-2 px-md-5 rounded-right-xl shadow-sm"><i><img src="{{asset('assets/images/Icon awesome-tags.png')}}" class="align-bottom" width="35px"></i>&nbsp;&nbsp;Tags</p>
                        </div>
                    </div>
                    <div class="row pl-3 pl-md-5">
                        @if($tags->count()<1)
                        <div class="col-12 text-center">
                            <h3 class="lead font-24 mt-5">Not following any tag.</h3>
                        </div>
                        @endif
                        @foreach($tags as $tag)
                        <?php $tg = $tag->tag; ?>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 px-4 mb-3">
                                <div class="div-hover">
                                    <p class="p-style mb-0 d-inline mr-3"><a href="{{route('byTag',['tag'=>$tg])}}">{{$tg->name}}</a> ({{$tg->followers->count()}})</p>

                                    @if (!($tg->followedBy(auth()->user())))
                                        <button class="btn-follow btn-follow-2" onclick="parent.location='{{route('tag.follow',$tg->id)}}'">Follow</button>
                                    @else
                                        <form action="{{route('tag.unfollow',$tg->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn-follow bg-dgray btn-follow-2" type="submit">Unfollow</button>
                                        </form> 
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>