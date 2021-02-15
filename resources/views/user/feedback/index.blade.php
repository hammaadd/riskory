@extends('user.layout.contributor')
@section('SiteTitle','Feedback || Riskory')
@section('content')
<div class="pl-0 col-12 col-md-9 py-5 pr-0 pr-md-5">

    <div class="row pt-4 mx-0 align-items-center">
        <div class="pl-0 col-12 col-sm-auto">
            <p class="bg-lblue font-eb font-18 py-2 px-5 rounded-right-xl shadow-sm"><i><img src="//s.svgbox.net/materialui.svg?fill=E90000&ic=comment" class="align-bottom" width="35px"></i>&nbsp;&nbsp;Feedback</p>
        </div>
    </div>

    <div class="container">
        <div class="row px-0 px-md-2 px-lg-5 mx-0 mx-md-2 mx-lg-5 pt-4">
          
            <div class="col-12 bg-lgray br-7 mt-3 px-0 box-shadow">
                <div class="col-12 pt-5 pb-2">
                    <form id="msform" role="form" method="POST" action="{{route('do.feedback')}}" class="create-risk-form risk-form px-3">
                        @csrf
                        <fieldset id="firstfieldset" class="form-group">
                            <div class="mb-4">
                                <label class="font-eb font-14 mb-1">Type of feedback</label>
                                <div class="d-flex">
                                    <div class="radio-item mt-0">
                                        <input type="radio" id="rcomments" name="type" value="Comments" checked="">
                                        <label class="mb-0" for="rcomments">Comments</label>
                                    </div>
                                    <div class="radio-item mt-0 ml-3"> 
                                        <input type="radio" id="rsuggestions" name="type" value="Suggestions">
                                        <label class="mb-0" for="rsuggestions">Suggestions</label>
                                    </div>
                                    <div class="radio-item mt-0 ml-3"> 
                                        <input type="radio" id="rcomplains" name="type" value="Complains">
                                        <label class="mb-0" for="rcomplains">Complains</label>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="mb-4">
                                <label class="font-eb font-14 mb-1">Describe your feedback</label>
                                <textarea name="feedback" id="about" class="form-control br-10 box-shadow border-0 font-14 font-e color-dg @error('about') is-invalid @enderror" cols="30" rows="5"></textarea>
                                @error('feedback')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        
                            <div class="mb-4 text-right">
                                {{-- <button onclick="cancelRelation()" type="button" class="btn-cancel mr-4 mt-3 mt-sm-0">Back</button> --}}
                                <button type="submit" class="btn-create py-2 px-3">Submit feedback</button>
                            </div>
                        </fieldset>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection