@extends('user.layout.visitor')
@section('SiteTitle','Terms and conditions || Riskory')
@section('content')
<main role="main" class="inner cover pb-5 pb-sm-5">
    <div class="container">
       <div class="row">
           <div class="col-12">
                <div class="text-center">
                    <h1 class="font-eb color-r">{{$con->heading}}</h1>
                    <p class="p-style">{!!$con->content!!}</p>
                </div>
           </div>
       </div>

    </div>
</main>
@endsection
