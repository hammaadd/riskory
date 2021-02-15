@extends('layouts.adminApp')

@section('pageHeading')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{URL::route('admin')}}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{route('admin.allRiskControls')}}">Riskcontrols</a></li>
    <li class="breadcrumb-item active">View</li>
    </ol>
  </nav>
@endsection

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary d-inline-block">Risk control view</h6>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-5 d-flex flex-col justify-content-around align-items-center">
          <img src="
                    @if($rc->user->avatar == 'images/avatars/default.png')
                    https://ui-avatars.com/api/?background=random&name={{ str_replace(' ','+' ,$rc->user->name) }}
                    @else
                    {{asset('userAvat/'.$rc->user->avatar)}}
                    @endif
                " alt="" class="rounded-circle img-fluid img-thumbnail" style="max-width: 20vh; height:20vh; object-fit:contain;">
                <div>
                  <h6><strong>Posted By:</strong><small> <a href="{{route('contributor.view',$rc->user->id)}}" title="View user profile">{{$rc->user->name}}</a></small></h6>
                  <h6><strong>Posted On:</strong> {{$rc->created_at}}</h6>
                </div>
        </div>
       
        <div class="col-md-7">
          <table class="table table-bordered table-hover">
            <tbody> 
              <tr>
                <td><strong>Views: </strong>{{views($rc)->count()}}</td>
                <td><strong>Status: </strong>
                  @if($rc->status=='U')
                <span class="badge badge-success">Under discussion</span>
              @elseif($rc->status=='A')
                <span class="badge badge-success"> Approved</span>
              @elseif($rc->status=='R')
                <span class="badge badge-danger"> Rejected</span>
              @elseif($rc->status=='O')
                <span class="badge badge-dark"> Our next big thing</span>
              @elseif($rc->status=='P')
                <span class="badge badge-warning"> Pending</span>
              @endif
                </td>
              </tr>
              <tr>
                <td colspan="2">Last updated at: {{$rc->updated_at}}</td>
              </tr>
              <tr>
                <td colspan="2" >
                  <div class="d-flex flex-col justify-content-around">
                  <div title="Likes"><strong class="px-2">{{$rc->likes->count()}}</strong><i class="text-primary fas fa-thumbs-up"></i></div>
                  <div title="Dislikes"><strong class="px-2">{{$rc->dislikes->count()}}</strong><i class="text-danger fas fa-thumbs-down"></i></div>
                  <div title="Bookmarks"><strong class="px-2">{{$rc->bookmarks->count()}}</strong><i class="text-dark fas fa-bookmark"></i></div>
                  <div title="Rating"><strong class="px-2">{{$rc->ratings->avg('rating')}}</strong><i class="text-warning fas fa-star"></i></div>
                </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="col-md-6 col-12 d-flex flex-row align-content-center">
          {{-- Defination --}}

          <div class="row">
            <div class="col-12">
              <label><span class="badge badge-pill badge-primary">RC#</span></label>
              <h6>{{$rc->id}}</h6>
            </div>
            <div class="col-12">
              <label ><span class="badge badge-pill badge-primary">Title</span></label>
              <h6>{{$rc->title}}</h6>
            </div>
            <div class="col-12">
              <label ><span class="badge badge-pill badge-primary">Description</span></label>
              <h6>{{$rc->description}}</h6>
            </div>
            <div class="col-12">
              <label><span class="badge badge-pill badge-primary">Objective</span></label>
              <h6>{{$rc->objective}}</h6>
            </div>
            <div class="col-12">
              <label ><span class="badge badge-pill badge-primary">Frequency</span></label>
              <h6>{{$rc->frequency}}</h6>
            </div>
            <div class="col-12">
              <label><span class="badge badge-pill badge-primary">Industry</span></label>
              <h6>{{$rc->title}}</h6>
            </div>

            <div class="col-12">
              <label><span class="badge badge-pill badge-primary">Business impact</span></label>
              <h6>{{$rc->business_impact}}</h6>
            </div>

            <div class="col-12">
              <label><span class="badge badge-pill badge-primary">Recommendations</span></label>
              <h6>{{$rc->recommendation}}</h6>
            </div>

          </div>
        </div>

        {{-- Categories --}}
        <div class="col-md-6 col-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Industry</h5>
              @php
              $industries = $rc->controls->where('type','industry');
              @endphp
              @if($industries)
                @foreach($industries as $ind)
                  <span class="badge badge-secondary">{{$ind->control->name}}</span>
                @endforeach
              @endif
            </div>
          </div>

          <div class="card my-1">
            <div class="card-body">
              <h5 class="card-title">Business framework</h5>
              @php
              $bframeworks = $rc->controls->where('type','bframework');
              @endphp
              @if($bframeworks)
                @foreach($bframeworks as $bf)
                  <span class="badge badge-secondary">{{$bf->control->name}}</span>
                @endforeach
              @endif
            </div>
          </div>

          <div class="card my-1">
            <div class="card-body">
              <h5 class="card-title">Business process</h5>
              @php
              $bprocesses = $rc->controls->where('type','bprocess');
              @endphp
              @if($bprocesses)
                @foreach($bprocesses as $bp)
                  <span class="badge badge-secondary">{{$bp->control->name}}</span>
                @endforeach
              @endif
            </div>
          </div>

          <div class="card my-1">
            <div class="card-body">
              <h5 class="card-title">Tags</h5>
              @if($rc->tags)
                @foreach($rc->tags as $tag)
                <span class="badge badge-secondary">{{$tag->tag->name}}</span>
                @endforeach
              @endif
            </div>
          </div>


        </div>

        

      </div>

      {{-- Procedures --}}
      <hr>
      <div class="row">
        
        <div class="col-md-4">
          <h4 class="text-center">Procedures</h4>
          <div class="card">
            <div class="card-body card-scrollable">
              <ul class="list-group">
                <li class="list-group-item active">Steps</li>
                @if($rc->testingsteps)
                @foreach($rc->testingsteps as $tstep)
                <li class="list-group-item">{!!$tstep->step!!}</li>
                @endforeach
                @endif
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <h4 class="text-center">Comments</h4>
          <div class="card">
            <div class="card-body card-scrollable">
              @if($rc->comments)
              @foreach($rc->comments as $com)
              <div class="row">
                  <div class="py-2 col-10">
                      <img src="@if($com->user->avatar == 'images/avatars/default.png')
                      https://ui-avatars.com/api/?background=random&name={{ str_replace(' ','+' ,$com->user->name) }}
                      @else
                      {{asset('userAvat/'.$com->user->avatar)}}
                      @endif
                      " class="rounded-circle shadow avatar-img">
                      <div class="d-inline-block pt-1 pl-2">
                          <p class="p-style mb-0"><a href="{{route('contributor.view',$com->user)}}" class="font-eb color-b">{{$com->user->name}}</a> 
                              
                          </p>
                          
                          <p class="p-style font-14 mb-0">{{$com->comment}}</p>
                          <div><small>{{$com->created_at}}</small></div>
                      </div>
                  </div>
                  <div class="col-2">
                     
                  </div>
              </div>
              <hr>
              @endforeach
              @endif
            </div>
          </div>
        </div>
        {{-- Relations --}}

        <div class="col-md-4">
          <h4 class="text-center">Relations</h4>
          <div class="card">
            <div class="card-body card-scrollable">
            
              @if($rc->relations)
              @foreach($rc->relations as $rel)
              @php $rcrel = $rel->relation; @endphp
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title"><a href="{{route('admin.view.rc',$rcrel)}}">{{$rcrel->title}}</a></h5>
                      <p class="card-text">{{$rc->objective}}</p>
                      <div class="row">
                        <div class="col-12">
                        <div class="d-flex flex-col justify-content-around">
                          <div title="Likes"><strong class="px-2">{{$rcrel->likes->count()}}</strong><i class="text-primary fas fa-thumbs-up"></i></div>
                          <div title="Dislikes"><strong class="px-2">{{$rcrel->dislikes->count()}}</strong><i class="text-danger fas fa-thumbs-down"></i></div>
                          <div title="Bookmarks"><strong class="px-2">{{$rcrel->bookmarks->count()}}</strong><i class="text-dark fas fa-bookmark"></i></div>
                          <div title="Rating"><strong class="px-2">{{$rcrel->ratings->avg('rating')}}</strong><i class="text-warning fas fa-star"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
              @endforeach
              @endif

            </div>
          </div>
        </div>
      </div>

      
        
    </div>
  </div>

@endsection

@section('scripts')


@endsection