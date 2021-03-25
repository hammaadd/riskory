<div class="row px-xl-5 mx-0 mx-md-5 mb-5" >

    <div class="col-12"><p class="lead">Narrow your search results by..</p></div>
    <div class="col-12 bg-lgray br-7 mt-1 px-0 box-shadow">
        <form action="{{route('advance.search.results')}}" method="GET" class="create-risk-form risk-form" >
            <fieldset class="form-group">
                <div class="row mx-0">
                    <div class="col-12 col-md-6 col-xl-6 my-2" wire:ignore>
                        <label class="font-eb font-14 mb-1">Industry</label>
                        <select class="js-example-basic-multiple form-control p-4 br-7 box-shadow border-0 font-14 font-e color-dg" name="industry" multiple id="framework">
                            <option></option>
                            @if(isset($controls))
                            @foreach($controls as $con)
                                @if($con->type=='industry')
                                <option value="{{$con->id}}" @if(isset($_GET['industry'])) @if($_GET['industry'] == $con->id) selected @endif @endif><strong>{{$con->name}} ({{$con->rccontrols_count}})</strong> </option>
                                @endif
                            @endforeach
                            @endif
                        </select>

                    </div>



                    <div class="col-12 col-md-6 col-xl-6 my-2">
                        <label class="font-eb font-14 mb-1">Business framework</label>
                        <select class="js-example-basic-multiple form-control p-4 br-7 box-shadow border-0 font-14 font-e color-dg" name="framework" multiple="multiple" id="framework" data-type="framework" data-url="{{route('fetch.adv.data')}}">
                            <option></option>
                            @if(isset($controls))
                            @foreach($controls as $con)
                                @if($con->type=='bframework')
                                <option value="{{$con->id}}" @if(isset($_GET['framework'])) @if($_GET['framework'] == $con->id) selected @endif @endif><strong>{{$con->name}} ({{$con->rccontrols_count}})</strong> </option>
                                @endif
                            @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="col-12 col-md-6 col-xl-6 my-2">
                        <label class="font-eb font-14 mb-1">Business process</label>
                        <select class="js-example-basic-multiple form-control br-7 box-shadow border-0 font-14 font-e color-dg" name="process" multiple="multiple" id="process" data-url="{{route('fetch.adv.data')}}>
                            <option></option>
                            @if(isset($controls))
                            @foreach($controls as $con)
                                @if($con->type=='bprocess')
                                <option value="{{$con->id}}" @if(isset($_GET['process'])) @if($_GET['process'] == $con->id) selected @endif @endif><strong>{{$con->name}} ({{$con->rccontrols_count}})</strong> </option>
                                @endif
                            @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="col-12 col-md-6 col-xl-6 my-2">
                        <label class="font-eb font-14 mb-1">Tag</label>
                        <select class="js-example-basic-multiple form-control br-7 box-shadow border-0 font-14 font-e color-dg" name="tag" multiple="multiple">
                            <option></option>
                            @if(isset($tags))
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}" @if(isset($_GET['tag'])) @if($_GET['tag'] == $tag->id) selected @endif @endif><strong>{{$tag->name}} ({{$tag->rctags_count}})</strong> </option>
                            @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="col-12 col-md-6 col-xl-6 my-2">
                        <label class="font-eb font-14 mb-1">User</label>
                        <select class="js-example-basic-multiple form-control br-7 box-shadow border-0 font-14 font-e color-dg" name="user">
                            <option></option>
                            @if(isset($users))
                            @forelse($users as $user)
                                <option value="{{$user->id}}" @if(isset($_GET['user'])) @if($_GET['user'] == $user->id) selected @endif @endif>{{$user->name}}</option>
                            @empty

                            @endforelse
                            @endif
                        </select>
                    </div>

                    <div class="col-12 col-md-6 col-xl-6 my-2 d-flex flex-row align-items-end justify-content-end">
                        <a href="{{route('advanced.search')}}" class="btn border-1 color-r br-7 font-12 text-capitalize font-weight-bold mx-1" >Reset <i class="fas fa-reset"></i></a>
                        <button class="btn bg-red text-light br-7 font-12 text-capitalize font-weight-bold mx-1"><i class="fas fa-search"></i> Search</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>


</div>
