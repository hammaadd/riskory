@extends('user.layout.visitor')
@section('SiteTitle','Contact us || Riskory')
@section('content')
<main role="main" class="inner cover pb-5 pb-sm-5">

    <!-- <div class="d-none"> -->
        <div class="container-fluid">
            <div class="row">
                <div class="pl-0 col-12 col-md-9 pt-4 pr-0 pr-md-5">
                    <div class="pl-0 col-12 col-sm-10 col-md-7 col-lg-5">
                        <p class="bg-lblue font-eb font-18 py-2 px-2 px-md-5 rounded-right-xl"><i><img src="//s.svgbox.net/materialui.svg?fill=E90000&amp;ic=contact_support" class="align-bottom" width="35px"></i>&nbsp;&nbsp;{{$con->heading}}</p>
                    </div>
                </div>

                <div class="col-12 pt-5 px-0">
                    <div class="container">

                        @if ($errors->any())
                        <div class="row px-0 px-md-2 px-lg-5 mx-0 mx-md-2 mx-lg-5 pt-4">
                            <div class="col-12">
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div><br />
                            </div>
                        </div>
                        @endif

                        <div class="row">
                            <div class="col-12 col-md-8">
                                <div class="bg-lgray br-7 mt-3 box-shadow">
                                    <div class="col-12 px-0">
                                        <div class="row">
                                            <div class="col-12 px-0">
                                                <span class="br-tl-20 bg-white font-16 font-eb color-r px-3 py-1">Contact us</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mx-auto my-3">
                                        <div class="p-style mb-4">{!!$con->content!!}</div>
                                        <form method="post" action="{{route('submission')}}">
                                            @csrf

                                            <fieldset id="firstfieldset">
                                                <div class="mb-4">
                                                    <label class="font-eb font-14 mb-1">Name <strong class="text-danger">*</strong></label>
                                                    <input type="text" class="form-control px-3 py-4 br-10 box-shadow border-0 font-14 font-e color-dg" name="name" value="{{ old('name') }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="font-eb font-14 mb-1">Email <strong class="text-danger">*</strong></label>
                                                    <input type="text" class="form-control px-3 py-4 br-10 box-shadow border-0 font-14 font-e color-dg" name="email" value="{{ old('email') }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="font-eb font-14 mb-1">Type <strong class="text-danger">*</strong></label>
                                                    <div class="bg-white px-2 py-1 br-10 box-shadow">
                                                        <select name="type" id="type" class="custom-select border-0 font-14 font-e color-dg" required>
                                                            <option value="Inquiry" @if(old('type') == 'Inquiry') selected @endif>Inquiry</option>
                                                            <option value="Feature Recommendation" @if(old('type') == 'Feature Recommendation') selected @endif>Feature Recommendation</option>
                                                            <option value="Adding Industry/Business Process/Framework" @if(old('type')=='Adding Industry/Business Process/Framework') selected @endif>Adding Industry/Business Process/Framework</option>
                                                            <option value="Testimony" @if(old('type') == 'Testimony') selected @endif>Testimony</option>
                                                            <option value="Issue" @if(old('type') == 'Issue') selected @endif>Issue</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-4">
                                                    <label class="font-eb font-14 mb-1" for="message">Message <strong class="text-danger">*</strong></label>
                                                    <textarea name="message" id="message" cols="30" rows="10" class="form-control px-3 py-3 br-10 box-shadow border-0 font-14 font-e color-dg">{{ old('message') }}</textarea>
                                                </div>
                                                <div class="mb-4">
                                                    <div class="captcha">
                                                        <span>{!! captcha_img() !!}</span>
                                                        <button type="button" class="btn btn-danger" class="reload" id="reload">
                                                            &#x21bb;
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="mb-4">
                                                    <input id="captcha" type="text" class="form-control px-3 py-4 br-10 box-shadow border-0 font-14 font-e color-dg" placeholder="Enter Captcha" name="captcha">
                                                </div>
                                                <div class="mb-4 text-right">
                                                    <button type="submit" class="btn-create mr-4 mr-sm-0 mt-3 mt-sm-0 py-2 px-4">Submit</button>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12 col-md-4">
                                <div class="bg-lgray br-7 mt-3 box-shadow">
                                    <div class="col-12 px-0">
                                        <div class="row">
                                            <div class="col-12 px-0">
                                                <span class="br-tl-20 bg-white font-16 font-eb color-r px-3 py-1">{{$addr->heading}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mx-auto my-3 pb-4">
                                        {!! $addr->content !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- </div> -->


    <div class="container d-none">
       <div class="row">
           <div class="col-12">
                <div class="text-center">
                    <h1 class="font-eb color-r">{{$con->heading}}</h1>
                    <p class="p-style">{!!$con->content!!}</p>
                </div>
           </div>
       </div>

       <div class="row d-flex justify-content-center">
           <div class="col-sm-6">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif

            <div class="card shadow-sm">
                <div class="card-header">
                  Contact Us
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('submission')}}">
                        @csrf
            
                        <div class="form-group">
                            <label>Name <strong class="text-danger">*</strong></label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
            
                        <div class="form-group">
                            <label>Email <strong class="text-danger">*</strong></label>
                            <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label>Type <strong class="text-danger">*</strong></label>
                            <select name="type" id="type" class="form-control p-0" required>
                                <option value="Inquiry" @if(old('type') == 'Inquiry') selected @endif>Inquiry</option>
                                <option value="Feature Recommendation" @if(old('type') == 'Feature Recommendation') selected @endif>Feature Recommendation</option>
                                <option value="Adding Industry/Business Process/Framework" @if(old('type')=='Adding Industry/Business Process/Framework') selected @endif>Adding Industry/Business Process/Framework</option>
                                <option value="Testimony" @if(old('type') == 'Testimony') selected @endif>Testimony</option>
                                <option value="Issue" @if(old('type') == 'Issue') selected @endif>Issue</option>
                            </select>
                            
                        </div>
            
                        <div class="form-group">
                            <label for="message">Message <strong class="text-danger">*</strong></label>
                            <textarea name="message" id="message" cols="30" rows="10" class="form-control">{{ old('message') }}</textarea>
                        </div>
            
                        <div class="form-group mt-4 mb-4">
                            <div class="captcha">
                                <span>{!! captcha_img() !!}</span>
                                <button type="button" class="btn btn-danger" class="reload" id="reload">
                                    &#x21bb;
                                </button>
                            </div>
                        </div>
            
                        <div class="form-group mb-4">
                            <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                        </div>
            
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger btn-block">Submit</button>
                        </div>
                    </form>
                </div>
              </div>

            
           </div>
           <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header">
                    {{$addr->heading}}
                </div>
                <div class="card-body">
                   <div class="row">
                       {!! $addr->content !!}
                   </div>
                </div>
              </div>
           </div>
       </div>
    </div>
</main>
@endsection

@section('script')
<script type="text/javascript">
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });

</script>
@endsection