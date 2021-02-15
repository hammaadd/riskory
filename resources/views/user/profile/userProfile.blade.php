@extends('user.layout.contributor')
@section('SiteTitle','Dashboard || Riskory')
@section('select2')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" integrity="sha256-jKV9n9bkk/CTP8zbtEtnKaKf+ehRovOYeKoyfthwbC8=" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js" integrity="sha256-CgvH7sz3tHhkiVKh05kSUgG97YtzYNnWt6OXcmYzqHY=" crossorigin="anonymous"></script> --}}
@endsection
@section('content')

<div class="col-12 col-md-9 py-2 py-md-5 px-0">
    <div class="row px-md-5 mx-0">
        <div class="col-12">
            <div class="profile-cover border-1 shadow">
                <img id="coverImage" src="
                @if(Auth::user()->cover == 'images/covers/default.png')
                {{asset('assets/images/user-cover.png')}}
                @else
                {{asset('userCover/'.Auth::user()->cover)}}
                @endif
            " class="user-cover" alt="cover-image" width="100%"/>
            
                <button class="select-image" id="coverBtn"><i class="fas fa-camera"></i> 800 x 200</button>
            </div>
        </div>
    </div>
    <div class="px-md-5">
        <div class="row col-12 user-profile px-0 mx-0">
            <div class="col-12 col-lg-3 pl-lg-4 text-center pt-4 pt-lg-0">
                <div id="profile-container text-center">
                <img id="profileImage" class="rounded-circle w-100 shadow img-thumbnail profileImage"  src="
                @if(Auth::user()->avatar == 'images/avatars/default.png')
                {{asset('userAvat/size/300x300.png')}}
                    @else
                    {{asset('userAvat/'.Auth::user()->avatar)}}
                    @endif
                " />    
                </div>
                <form method="POST" action="{{URL::route('uploadAvatar')}}" enctype="multipart/form-data">
                    @csrf
                    <input id="imageUpload" type="file" name="profile_photo" placeholder="Photo" required capture>
                    <button class="my-3 font-eb font-16 color-r bg-transparent px-4 py-1 border-1 br-7" style="display: none;" id="uploadAvatarBtn"><i class="fas fa-camera" ></i> Upload Avatar</button>
                </form>
            <p class="font-eb font-18">{{Auth::user()->name}}</p>
            </div>
            <div class="col-12 col-lg-3 my-lg-auto text-center text-lg-left">
                <p class="font-eb font-18 pt-lg-4 color-r font-14">{{Auth::user()->userFollowing->count()}} Following {{Auth::user()->userFollowers->count()}} Followers</p>
            </div>
            <!-- <div class="col-12 col-lg-2  my-lg-auto text-center text-lg-right pr-md-1">
            </div> -->
            <div class="col-12 col-lg-6  my-lg-auto text-center text-lg-right">
                <form class="d-inline-block" method="POST" action="{{URL::route('uploadCover')}}" enctype="multipart/form-data">
                    @csrf
                    <input id="coverUpload" type="file" name="cover" placeholder="Photo" required capture style="display: none;">
                    <button class="mt-1 font-eb font-16 color-r bg-transparent px-4 py-1 border-1 br-7"  id="uploadCoverBtn" style="display: none;"><i class="fas fa-camera" ></i> Save</button>
                </form>
                <button class="mt-lg-4 font-eb font-16 color-r bg-transparent px-4 py-1 border-1 br-7" title="View public profile" onclick="return parent.location='{{route('visit.profile',Auth::user())}}'"><i class="fas fa-eye"></i></button>
                <button class="mt-lg-4 font-eb font-16 color-r bg-transparent px-4 py-1 border-1 br-7" onclick="parent.location='{{route('editProfile')}}'">Edit Info</button>
            </div>
            
        </div>
    </div>
    <div class="container-fluid">
        <div class="pt-4 px-md-5">
            <nav>
              <div class="nav nav-tabs d-flex text-center border-0" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active flex-fill br-tl-7 br-bl-7" onclick="postsData()" id="nav-posts-tab" data-toggle="tab" href="#nav-posts" role="tab" aria-controls="nav-posts" aria-selected="true">Posts</a>
                <a class="nav-item nav-link flex-fill"  id="nav-categories-tab" data-toggle="tab" href="#nav-categories" role="tab" aria-controls="nav-categories" aria-selected="false">Categories</a>
                <a class="nav-item nav-link  flex-fill" onclick="likesData()" id="nav-likes-tab" data-toggle="tab" href="#nav-likes" role="tab" aria-controls="nav-likes" aria-selected="false">Likes/Dislikes</a>
                <a class="nav-item nav-link flex-fill" id="nav-lists-tab" data-toggle="tab" href="#nav-lists" role="tab" aria-controls="nav-lists" aria-selected="false">Lists</a>
                <a class="nav-item nav-link flex-fill br-tr-7 br-br-7" onclick="bookmarksData()" id="nav-bookmarks-tab" data-toggle="tab" href="#nav-bookmarks" role="tab" aria-controls="nav-bookmarks" aria-selected="false">Bookmarks</a>
              </div>
            </nav>
        </div>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active px-md-5" id="nav-posts" role="tabpanel" aria-labelledby="nav-posts-tab">
                {{-- Risk control Starts Here --}}
                <div class="row mx-0" id="posts_data">
                    @include('user.profile.riskcontrols')
                </div>
                
                {{-- Risk control ends here --}}
            </div>
            <div class="tab-pane fade" id="nav-categories" role="tabpanel" aria-labelledby="nav-categories-tab">
                <div class="pl-0 col-12 py-5">
                    @include('user.sections.profileCategories')
                </div>
            </div>

            <div class="tab-pane fade px-md-5" id="nav-likes" role="tabpanel" aria-labelledby="nav-likes-tab">
                <div class="text-center text-md-right pt-4">
                    <div class="btn-group btn-group-toggle btn-follower" data-toggle="buttons">
                      <label class="btn btn-secondary active">
                        <input type="radio" name="options" id="option1" autocomplete="off" checked onclick="likesData()"> Likes
                      </label>
                      <label class="btn btn-secondary">
                        <input type="radio" name="options" id="option2" autocomplete="off" onclick="dislikesData()"> Dislikes
                      </label>
                    </div>
                </div>
                <div class="row mx-0" id="likes_data">
                    @include('user.profile.likes')
                </div>
                
            </div>
            
            <div class="tab-pane fade" id="nav-lists" role="tabpanel" aria-labelledby="nav-lists-tab">
                <div class="text-center text-md-right pt-3 px-0 px-md-5">
                    <button class="btn bg-red text-light br-7 font-12 text-capitalize font-weight-bold" onclick="return parent.location='{{route('all.lists')}}'"><i class="fas fa-plus-circle"></i> New List</button>
                </div>
                <div class="row mx-0 mx-md-5 pt-3">
                    <div class="col-12 bg-lgray br-7 border-0 box-shadow mb-4 py-1 px-4 p-md-5">
                        @include('user.sections.profileList')
                    </div>
                </div>
            </div>

            {{-- Bookmarks Tab panel --}}

            <div class="tab-pane fade px-md-5" id="nav-bookmarks" role="tabpanel" aria-labelledby="nav-bookmarks-tab">
                <div class="row col-12 pt-4 px-0 mx-0">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-5 col-12 text-right">
                        {{-- <div class="input-group search-bar py-1 ml-md-0">
                          <input type="text" class="form-control" placeholder="Search through the category" aria-label="Search Risks Here" aria-describedby="basic-addon2">
                          <div class="input-group-append">
                            <button class="btn-search bgb-lgray color-dg" type="button"><i class="fas fa-search"></i></button>
                          </div>
                        </div> --}}
                    </div>
                    <div class="col-lg-4 col-12">
                        {{-- <div class="topbar-icon text-center text-lg-right mt-3 mt-md-0">
                          <a href="#" class="text-center mx-2 my-1 bg-lblue color-r"><i class="fas fa-sort-amount-up-alt"></i></a>
                          <a href="#" class="text-center mx-2 my-1"><i class="fas fa-sort-amount-down"></i></a>
                          <a href="#" class="text-center mx-2 my-1"><i class="fas fa-filter"></i></a>
                        </div> --}}
                    </div>
                </div>
                @csrf
                <div class="row mx-0" id="bookmarks_data">
                    @include('user.profile.bookmarks')
                </div>
            </div>
           
           
        </div>
    </div>
</div>
@include('user.sections.listModal')
@include('user.sections.ratingModal')
@endsection
@section('script')

<script type="text/javascript">
    $idOfData = '#posts_data';
    $url = "{{ route('riskcontrols.fetch',Auth::user()) }}";
    function postsData(){
        $idOfData = '#posts_data';
        $url = "{{ route('riskcontrols.fetch',Auth::user()) }}";
    }

    function likesData(){
        $idOfData = '#likes_data';
        $url = "{{ route('likes.fetch',Auth::user()) }}";
        fetch_data(1);
    }
    function dislikesData(){
        $idOfData = '#likes_data';
        $url = "{{ route('dislikes.fetch',Auth::user()) }}";
        fetch_data(1);
    }
    function bookmarksData(){
        $idOfData = '#bookmarks_data';
        $url = "{{ route('bookmarks.fetch',Auth::user()) }}";
    }
    $(document).ready(function(){
    
     $(document).on('click', '.page-link', function(event){
        event.preventDefault(); 
        var page = $(this).attr('href').split('page=')[1];
        fetch_data(page);
     });
    
     
    
    });

    function fetch_data(page)
     {
         console.log(page);
      var _token = $("input[name=_token]").val();
      $.ajax({
          url:$url,
          method:"POST",
          data:{_token:_token, page:page},
          success:function(data)
          {
           $($idOfData).html(data);
          }
        });
     }

     

    $("#profileImage").click(function(e) {
         $("#imageUpload").click();
     });

    function fasterPreview( uploader ) {
        if ( uploader.files && uploader.files[0] ){
              $('#profileImage').attr('src', 
                 window.URL.createObjectURL(uploader.files[0]) );
                 document.getElementById('uploadAvatarBtn').style.display = 'inline';
        }
    }

    $("#imageUpload").change(function(){
        fasterPreview( this );
    });

    $("#coverBtn").click(function(e) {
         $("#coverUpload").click();
     });

    function fasterCoverPreview( uploader ) {
        if ( uploader.files && uploader.files[0] ){
              $('#coverImage').attr('src', 
                 window.URL.createObjectURL(uploader.files[0]) );
                 document.getElementById('uploadCoverBtn').style.display = 'inline';
        }
    }

    $("#coverUpload").change(function(){
        fasterCoverPreview( this );
    });



    
    </script>
@endsection