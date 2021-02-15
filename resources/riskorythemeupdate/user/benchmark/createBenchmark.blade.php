@extends('user.layout.contributor')
@section('SiteTitle','Add Benchmark || Riskory')
@section('content')
<div class="pl-0 col-12 col-md-9 py-3 pr-0 pr-md-5">

    <div class="row pt-4 mx-0 align-items-center">
        <div class="pl-0 col-12 col-sm-auto">
            <p class="bg-lblue font-eb font-18 py-2 px-5 rounded-right-xl shadow-sm"><i><img src="{{asset('assets/images/Mask Group 16@2x.png')}}" class="align-bottom" width="35px"></i>&nbsp;&nbsp;Creating Benchmark For Risk Control <span class="color-r">#{{$riskcontrol->id}}</span></p>
        </div>
    </div>

    <div class="container">
        <div class="row px-0 px-md-2 px-lg-5 mx-0 mx-md-2 mx-lg-5 pt-4">
            <div class="col-12 bg-lgray br-7 mt-3 mb-4 px-0 pt-3">
                <div class="col-12 my-3">
                    <form id="msform" role="form" method="POST" action="{{route('store.benchmark',$riskcontrol)}}" class="risk-form px-3">
                        @csrf
                        <fieldset class="form-group">
                            <div class="radio-item mb-4">
                                <input type="radio" id="rsuccess" name="benchmark" value="Success" checked="">
                                <label for="rsuccess">Success</label>
                            </div>
                            <div class="radio-item ml-5 mb-4"> 
                                <input type="radio" id="rfailed" name="benchmark" value="Failed">
                                <label for="rfailed">Failed</label>
                            </div>
                            <div class="mb-4">
                                <label class="font-eb font-14 mb-1">Date</label>
                                <div class="form-group">
                                    <div class="input-group date" id="datetimepicker1">
                                        <input type="date" name="benchmarkDate" class="form-control br-10 box-shadow border-0 font-14 font-e color-dg @error('benchmarkDate') is-invalid @enderror" placeholder="Enter The Benchmark date" />
                                        @error('benchmarkDate')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="font-eb font-14 mb-1">Description</label>
                                <input type="text" name="description" class="form-control br-10 box-shadow border-0 font-14 font-e color-dg" placeholder="Enter The Benchmark Description">
                            </div>
                            
                            <div class="mb-4">
                                <label class="font-eb font-14 mb-1">Response</label>
                                <input type="text" name="response" class="form-control br-10 box-shadow border-0 font-14 font-e color-dg" placeholder="Enter The Risk Response">
                                <small id="response" class="form-text text-muted mt-3">The terms adopted here are reduce, retain, remove, or transfer.</small>
                            </div>

                            <div class="mb-4">
                                <label class="font-eb font-14 mb-1">Reason</label>
                                <input type="text" name="reason" class="form-control br-10 box-shadow border-0 font-14 font-e color-dg" placeholder="Enter The Reason">
                                <small id="response" class="form-text text-muted mt-3">If any then mention reason for failure or success.</small>
                            </div>
                            
                            <div class="mb-4">
                                <label class="font-eb font-14 mb-1">Notes</label>
                                <input type="text" name="notes" class="form-control br-10 box-shadow border-0 font-14 font-e color-dg" placeholder="Enter any additional notes">
                            </div>
                            <div class="mb-4 text-right">
                                <button class="btn-cancel mr-4 py-2 px-5">Cancel</button>
                                <button class="btn-create py-2 px-5" type="submit">Create</button>
                            </div>
                        </fieldset>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

