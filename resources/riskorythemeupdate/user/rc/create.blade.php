@extends('user.layout.contributor')
@section('SiteTitle','Create Risk Control || Riskory')
@section('select2')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('css/autocomplete.css')}}">
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="{{asset('js/autocomplete.js')}}"></script> 

@endsection
@section('content')
<div class="pl-0 col-12 col-md-9 py-5 pr-0 pr-md-5">
    <div class="row mx-0">
        <div class="pl-0 col-12 col-sm-auto">
            <p class="bg-lblue font-eb font-18 py-2 px-5 rounded-right-xl shadow-sm"><i><img src="{{asset('assets/images/Mask Group 10@2x.png')}}" class="align-bottom" width="35px"></i>&nbsp;&nbsp;Creating Risk Control</p>
        </div>
    </div>
    <!-- <div class="container"> -->
        <div class="row px-2 px-md-5 mx-0 mx-md-5 pt-3 mt-4">

            <!-- <div class="col-12">
                <div class="d-flex text-left">
                    <p id="riskControlDefinition" class="font-eb font-18 color-r px-4 py-2 mx-2 tab-rc"><i><img src="//s.svgbox.net/materialui.svg?fill=E90000&amp;ic=check" width="20px"></i>&nbsp;&nbsp;Definition</p>
                    {{-- <span class="my-auto pb-3 font-eb font-28 color-r"><i class="fas fa-angle-double-right"></i></span> --}}
                    <p id="riskControlProcedure" class="font-eb font-18 color-dg px-4 py-2 mx-2 tab-rc"><i><img src="//s.svgbox.net/materialui.svg?fill=707070&amp;ic=check" width="20px"></i>&nbsp;&nbsp;Procedure</p>
                    {{-- <span class="my-auto pb-3 font-eb font-28 color-r"><i class="fas fa-angle-double-right"></i></span>
                    <p id="riskControlRelations" class="font-eb font-18 bg-lgray color-dg px-4 py-2 br-10 mx-2 box-shadow tab-rc">Relations</p> --}}
                </div>
            </div> -->

            <div class="col-12 text-center">
                <p id="riskControlDefinition" class="d-inline-block align-middle font-eb font-18 bg-lblue color-r px-4 py-2 mx-2 br-7 box-shadow tab-rc">Definition</p>
                <span class="d-inline-block align-middle pb-3 font-eb font-28 color-r"><i class="fas fa-angle-double-right"></i></span>
                <p id="riskControlProcedure" class="d-inline-block align-middle font-eb font-18 bg-lgray color-dg px-4 py-2 br-7 mx-2 box-shadow tab-rc">Procedure</p>
                {{-- <span class="d-inline-block align-middle pb-3 font-eb font-28 color-r"><i class="fas fa-angle-double-right"></i></span>
                <p id="riskControlRelations" class="d-inline-block align-middle font-eb font-18 bg-lgray color-dg px-4 py-2 br-7 mx-2 box-shadow tab-rc">Relations</p> --}}
            </div>
            <div class="col-12 bg-lgray br-7 mt-3 px-0 box-shadow">
                <img src="{{asset('assets/images/Mask Group 16@2x.png')}}" class="bg-white br-tl-7 p-3 box-shadow">
                <div class="col-12 mx-auto my-3">
                    <div class="px-3">
                    <form id="msform" role="form" autocomplete="off" method="POST" action="{{route('rc.store')}}" class="create-risk-form risk-form">
                        @csrf
                        <fieldset id="firstfieldset" class="form-group">
                            
                            <div class="mb-4">
                                <label class="font-eb font-14 mb-1">Title</label>
                                <input type="text" name="title" value="{{old('title')}}" class="form-control br-10 box-shadow border-0 font-14 font-e color-dg @error('title') is-invalid @enderror" placeholder="Enter The Title" required>
                                {{-- <small id="title" class="form-text text-muted ml-3">
                                   Short descriptive of the Risk Control
                                </small> --}}
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                       
                            <div class="mb-4">
                                <label class="font-eb font-14 mb-1">Objective</label>
                                <textarea name="obj" id="obj" cols="30" rows="3" class="form-control br-10 box-shadow border-0 font-14 font-e color-dg @error('obj') is-invalid @enderror" placeholder="Enter The Objective" required>{{old('obj')}}</textarea>
                                <small id="recommendations" class="form-text text-muted mt-3">Summary phrase of the Objective Statement</small>
                                @error('obj')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="font-eb font-14 mb-1">Description</label>
                                <textarea name="desc" id="desc" cols="30" rows="3" class="form-control br-10 box-shadow border-0 font-14 font-e color-dg @error('desc') is-invalid @enderror" placeholder="Enter The Description" required spellcheck="false">{{old('desc')}}</textarea>
                                {{-- <input type="text" name="" class="form-control p-5 br-20 box-shadow border-0 font-16 font-e color-dg" placeholder="Enter The Risk Control Description"> --}}
                                @error('desc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-4 autocomplete">
                                <label class="font-eb font-14 mb-1">Frequency</label>
                                <input type="text" name="frequency" oninput="doAutoComplete()" value="{{old('frequency')}}" id="frequency" class="form-control br-10 box-shadow border-0 font-14 font-e color-dg @error('frequency') is-invalid @enderror" placeholder="Enter The Risk Control Frequency ">
                                <small class="form-text text-muted mt-3">How frequently the risk control should be assessed? Such as Daily, Weekly, Monthly, Yearly, Not Applicable, Unknown...etc.</small>
                                @error('frequency')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="mb-4">
                                <label class="font-eb font-14 mb-1">Implementation type</label>
                                <div class="bg-white br-7">
                                    <select class="form-control custom-select border-0 font-14 font-e color-dg" name="imp_type" id="imp_type" aria-label="Select implementation type" >
                                        <option value="Automated" @if(old('imp_type')=='Automated') Selected @endif">Automated</option>
                                        <option value="Semi-automated" @if(old('imp_type')=='Semi-Automated') Selected @endif>Semi-automated</option>
                                        <option value="Manual" @if(old('imp_type')=='Manual') Selected @endif>Manual</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <label class="font-eb font-14 mb-1">Industry</label>
                                <select class="js-example-basic-multiple form-control p-5 br-20 box-shadow border-0 font-16 font-e color-dg" name="industry[]" multiple="multiple" >
                                    @foreach($controls as $con)
                                    @if($con->type=='industry')
                                    <option value="{{$con->id}}" @if(old('industry')) @if(in_array($con->id,old('industry'))) Selected @endif @endif>{{$con->name}} <small>({{$con->followers->count()}})</small></option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="font-eb font-14 mb-1">Business Process</label>
                                <select class="js-example-basic-multiple form-control p-5 br-20 box-shadow border-0 font-16 font-e color-dg" name="process[]" multiple="multiple">
                                    @foreach($controls as $con)
                                    @if($con->type=='bprocess')
                                    <option value="{{$con->id}}" @if(old('process')) @if(in_array($con->id,old('process'))) Selected @endif @endif>{{$con->name}} <small>({{$con->followers->count()}})</small></option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="font-eb font-14 mb-1">Framework</label>
                                <select class="js-example-basic-multiple form-control p-5 br-20 box-shadow border-0 font-16 font-e color-dg" name="framework[]" multiple="multiple">
                                    @foreach($controls as $con)
                                    @if($con->type=='bframework')
                                    <option value="{{$con->id}}" @if(old('framework')) @if(in_array($con->id,old('framework'))) Selected @endif @endif>{{$con->name}} <small>({{$con->followers->count()}})</small></option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="font-eb font-14 mb-1">Tags</label>
                                <select id="tags" class="form-control p-5 br-20 box-shadow border-0 font-16 font-e color-dg" name="tags[]" multiple="multiple">
                                    @foreach($tags as $tg)
                                    <option value="{{$tg->id}}">{{$tg->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="mb-4">
                                <label class="font-eb font-14 mb-1">Business Impact</label>
                                <textarea cols="30" rows="3" name="business_impact" class="form-control br-10 box-shadow border-0 font-14 font-e color-dg" placeholder="Enter The Business Impact">{{old('business_impact')}}</textarea>
                            {{-- <input type="text" name="business_impact" value="{{old('business_impact')}}" class="form-control px-3 py-4 br-10 box-shadow border-0 font-14 font-e color-dg" placeholder="Enter The Business Impact"> --}}
                                <small id="business_impact" class="form-text text-muted mt-3">The potential negative consequences that may occur as a result of the Risk</small>
                            </div>
                            {{-- <div class="mb-4">
                                <label class="font-eb font-14 mb-1">Recommendations</label>
                                <textarea cols="30" rows="3" name="recommendation" class="form-control px-3 py-3 br-10 box-shadow border-0 font-14 font-e color-dg" placeholder="Enter The Risk Control Corrective Action Recommendations">{{old('recommendation')}}</textarea>
                                
                            </div> --}}
                            
                            <div class="mb-4 text-right">
                                <button onclick="addProcedure()" type="button" class="btn-create mr-4 mr-sm-0 mt-3 mt-sm-0 py-2 px-3">Continue To Risk Procedure</button>
                            </div>
                            
                        </fieldset>
                        <fieldset hidden id="secondfieldset" class="form-group">
                            <div class="mb-4">
                                <label class="font-eb font-14 mb-1">Steps</label>
                                <div class="px-3 py-2 br-10 box-shadow border-0 font-14 font-e bg-white color-dg" id="testingSteps">
                                    <p class="p-style color-dg">Enter the steps <a role="button" class="color-r float-right" onclick="addNewStep()"><i class="fas fa-plus-circle"></i></a></p>
                                </div>
                            </div>
                            <div class="mb-4 text-right">
                                <button type="button" onclick="cancelProcedure()" class="btn-cancel mr-4 mt-3 mt-sm-0 py-2 px-3">Back</button>
                                <button type="submit" class="btn-create mr-4 mr-sm-0 mt-3 mt-sm-0 py-2 px-3">Finish the risk control</button>
                                {{-- <button type="button" onclick="addRelation()" class="btn-create mr-4 mr-sm-0 mt-3 mt-sm-0 py-2 px-3">Continue To Relation</button> --}}
                            </div>
                        </fieldset>
                        {{-- <fieldset hidden id="thirdfieldset" class="form-group">
                            <div class="mb-4">
                                <label class="font-eb font-16 bg-white px-1 px-sm-4 mb-0 ml-3 br-tl-12 br-tr-12">Risk Control Relationships</label>
                                <div class="row px-3 px-md-5 pb-2 pt-4 br-20 box-shadow border-0 font-16 font-e bg-white mx-0" id="relationsHere">
                                    <div class="col-10">
                                        <p class="px-0 p-style color-dg">Click to add other risk controls related to this one</p>
                                        
                                    </div>
                                    <div class="col-2 text-right">
                                        <a href="#relationModal" class="col-3 color-r font-20 px-0 " data-toggle="modal"><i class="fas fa-plus-circle"></i></a>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="relationModal" tabindex="-1" role="dialog" aria-labelledby="relationModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close btn-cancel mr-4" data-dismiss="modal" aria-label="Close">
                                      Cancel
                                    </button>
                                    <button class="btn-create" data-dismiss="modal" aria-label="Close" type="button">Select & Save</button>
                                    <button class="btn-list" type="button"><i class="fas fa-tasks"></i></button>
                                  </div>
                                  <div class="modal-body">
                                    <div id="relationBookmarks">
                                    @include('user.sections.relationRcs')
                                </div>
                                   
                                  
                                    <p class="text-right p-4"><a href="#" class="color-r font-eb font-14 text-underl">Back To Top</a><i class="fas fa-arrow-up color-r"></i></p>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="mb-4 text-right">
                                <button onclick="cancelRelation()" type="button" class="btn-cancel mr-4 mt-3 mt-sm-0 py-2 px-3">Back</button>
                                <button type="submit" class="btn-create mr-4 mr-sm-0 mt-3 mt-sm-0 py-2 px-3">Finish the risk control</button>
                            </div>
                        </fieldset> --}}
                    </form> 
                    </div>
                </div>
            </div>
        </div>
    <!-- </div> -->
</div>
@endsection

@section('script')
<script type="text/javascript">
var step = 1;
    function addProcedure() {
			var first_fieldset = document.getElementById("firstfieldset");
			first_fieldset.setAttribute("hidden","true");
			var second_fieldset = document.getElementById("secondfieldset");
			second_fieldset.removeAttribute("hidden");
			var risk_definition = document.getElementById("riskControlDefinition");
			risk_definition.setAttribute("style", "background-color: #EFEFEF !important; color: #707070 !important");
			risk_relation = document.getElementById("riskControlProcedure");
			risk_relation.setAttribute("style", "background-color: #BAE8E8 !important; color: #E90000 !important");
		}
        function cancelProcedure() {
			document.getElementById("firstfieldset").removeAttribute("hidden");
			document.getElementById("secondfieldset").setAttribute("hidden","true");
			document.getElementById("riskControlDefinition").removeAttribute("style");
			document.getElementById("riskControlProcedure").removeAttribute("style");
		}
		// function addRelation() {
		// 	var second_fieldset = document.getElementById("secondfieldset");
		// 	second_fieldset.setAttribute("hidden","true");
		// 	var third_fieldset = document.getElementById("thirdfieldset");
		// 	third_fieldset.removeAttribute("hidden");
		// 	var risk_procedure = document.getElementById("riskControlProcedure");
		// 	risk_procedure.setAttribute("style", "background-color: #EFEFEF !important; color: #707070 !important");
		// 	risk_relation = document.getElementById("riskControlRelations");
		// 	risk_relation.setAttribute("style", "background-color: #BAE8E8 !important; color: #E90000 !important");
		// }
		// function cancelRelation() {
		// 	document.getElementById("secondfieldset").removeAttribute("hidden");
		// 	document.getElementById("thirdfieldset").setAttribute("hidden","true");
		// 	document.getElementById("riskControlProcedure").setAttribute("style", "background-color: #BAE8E8 !important; color: #E90000 !important");
		// 	document.getElementById("riskControlRelations").removeAttribute("style");
		// }

    function addNewStep(){
        $("#testingSteps").append(`<div class="steps row border-gray-1 my-2 mx-0 br-10" id="step${step}">
														<textarea name="testing_steps[]" class="form-control border-0 font-14 font-e color-dg col-10 col-sm-11 br-10" placeholder="Some Testing Steps" rows="3" style="resize: none;"></textarea>
														<a role="button" onclick="removestep(${step})" class="color-dg col-2 col-sm-1 text-right pt-2" style=""><i class="fas fa-times-circle" style=""></i></a>
									</div>`);
                                    step = step+1;
    }

    function removestep(id){
        $("#step"+id).remove();
    }
</script>

<script type="text/javascript">
var arrOfIds = [];
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
        $('#tags').select2({
            tags:true,
        });
    });

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
         url:"{{route('relation.bookmarks.fetch')}}",
         method:"POST",
         data:{_token:_token, page:page},
         success:function(data)
         {
          $('#relationBookmarks').html(data);
          arrOfIds.forEach(checkElements);
         }
       });
    }

    function listRelation(id){
        check = document.getElementById(id);
        if(check.checked==true){
            value = $('#'+id).val();
            title = check.getAttribute('data-title');

            html = `<div class="col-12 border px-2 py-1" id="1${id}">
                                    <input type="hidden" name="relations[]" id='relation' value='${value}'>
                                    <p id="relationName" class="color-dg p-style">${title}</p>
                                    </div>`;

            $('#relationsHere').append(html);
            arrOfIds.push(id);
        }else{
            $('#1'+id).remove();
            
            var result = arrOfIds.filter(
                item => item != id
            );
            arrOfIds = result;
            
        }

        console.log(arrOfIds);
    }

    function checkElements(value) {
        $('#'+value).prop('checked',true);
}

  
 function doAutoComplete(){
var frequency = ["Daily","Weekly","Monthly","Yearly","Fortnightly","Hourly","Not Applicable","Unknown"];

  /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
  autocomplete(document.getElementById("frequency"), frequency);
}
</script>
@endsection