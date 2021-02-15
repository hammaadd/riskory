@extends('user.layout.contributor')
@section('SiteTitle','Edit risk control || Riskory')
@section('select2')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endsection
@section('content')
<div class="pl-0 col-12 col-md-9 py-5 pr-0 pr-md-5">
    <div class="pl-0 col-12 col-sm-10 col-md-7 col-lg-5">
    <p class="bg-lblue font-eb font-18 py-2 px-2 px-md-5"><i><img src="{{asset('assets/images/Mask Group 10@2x.png')}}" class="align-bottom" width="35px"></i>&nbsp;&nbsp;Editing Risk Control</p>
    </div>
    <div class="container">
        <div class="row px-0 px-md-2 px-lg-5 mx-0 mx-md-2 mx-lg-5 pt-4 d-flex justify-content-center">
            <div class="row text-center">
                <p id="riskControlDefinition" class="font-eb font-18 bg-lblue color-r px-4 py-2 mx-2 br-10 box-shadow">Definition</p>
                <span class="my-auto pb-3 font-eb font-28 color-r"><i class="fas fa-angle-double-right"></i></span>
                <p id="riskControlProcedure" class="font-eb font-18 bg-lgray color-dg px-4 py-2 br-10 mx-2 box-shadow">Procedure</p>
                {{-- <span class="my-auto pb-3 font-eb font-28 color-r"><i class="fas fa-angle-double-right"></i></span>
                <p id="riskControlRelations" class="font-eb font-18 bg-lgray color-dg px-4 py-2 br-10 mx-2 box-shadow">Relations</p> --}}
            </div>
            <div class="col-12 bg-lgray br-20 mt-3 px-0">
            <img src="{{asset('assets/images/Mask Group 16@2x.png')}}" class="bg-white br-tl-20 p-3 box-shadow">
                <div class="col-12 mx-auto my-3">
                <form id="msform" role="form" method="POST" action="{{route('rc.update',$rc)}}" class="create-risk-form risk-form px-lg-5">
                    @csrf
                    @method('PUT')
                        <fieldset id="firstfieldset">
                            <div class="mb-4">
                                <label class="font-eb font-14 px-3 mb-0">Title</label>
                                <input type="text" name="title" value="{{$rc->title}}" class="form-control px-3 py-4 br-10 box-shadow border-0 font-14 font-e color-dg @error('title') is-invalid @enderror" placeholder="Enter The Title" required>
                               
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                           
                            <div class="mb-4">
                                <label class="font-eb font-14 px-3 mb-0">Objective</label>
                                <textarea name="obj" id="obj" cols="30" rows="3" class="form-control px-3 py-3 br-10 box-shadow border-0 font-14 font-e color-dg @error('obj') is-invalid @enderror" placeholder="Enter The Objective" required>{{$rc->objective}}</textarea>

                                
                                
                                <small id="objective" class="form-text text-muted ml-3">
                                    Summary phrase of the Objective Statement
                                 </small>
                                 @error('obj')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="font-eb font-14 px-3 mb-0">Description</label>
                                <textarea name="desc" id="desc" cols="30" rows="3" class="form-control px-3 py-3 br-10 box-shadow border-0 font-14 font-e color-dg @error('desc') is-invalid @enderror" placeholder="Enter The Risk Control Description" required>{{$rc->description}}</textarea>
                                {{-- <input type="text" name="" class="form-control p-5 br-20 box-shadow border-0 font-16 font-e color-dg" placeholder="Enter The Risk Control Description"> --}}
                                @error('desc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="font-eb font-14 px-3 mb-0">Frequency</label>
                                <input type="text" name="frequency" value="{{$rc->frequency}}" id="frequency" class="form-control px-3 py-4 br-10 box-shadow border-0 font-14 font-e color-dg @error('frequency') is-invalid @enderror" min="0" placeholder="Enter The Risk Control Frequency">
                                <small id="frequency" class="form-text text-muted ml-3">
                                    How frequently the risk control should be assessed?
                                </small>
                                @error('frequency')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="mb-4">
                                <label class="font-eb font-14 px-3 mb-0">Implementation type</label>
                                <div class="bg-white px-2 py-1 br-10 box-shadow">
                                    <select class="custom-select border-0 font-14 font-e color-dg" name="imp_type" id="imp_type" aria-label="Select implementation type" required>
                                        <option value="Automated" @if($rc->imp_type=='Automated') Selected @endif">Automated</option>
                                        <option value="Semi-automated" @if($rc->imp_type=='Semi-Automated') Selected @endif>Semi-automated</option>
                                        <option value="Manual" @if($rc->imp_type)=='Manual') Selected @endif>Manual</option>
                                    </select>
                                </div>
                            </div>

                            <?php 
                            $arrayControls = array();?>
                            @foreach($rc->controls as $cont)
                            <?php array_push($arrayControls,$cont->control_id);
                                ?>
                            @endforeach

                          
                            <div class="mb-4">
                                <label class="font-eb font-14 px-3 mb-0">Industry</label>
                                <select class="js-example-basic-multiple form-control p-5 br-20 box-shadow border-0 font-16 font-e color-dg" name="industry[]" multiple="multiple" required>
                                @foreach($controls as $con)
                                @if($con->type=='industry')
                                <option value="{{$con->id}}" @if($arrayControls) @if(in_array($con->id,$arrayControls)) Selected @endif @endif>{{$con->name}} <small>({{$con->followers->count()}})</small></option>
                                @endif
                                @endforeach
                                
                                </select>
                                
                            </div>
                            <div class="mb-4">
                                <label class="font-eb font-14 px-3 mb-0">Business Process</label>
                                <select class="js-example-basic-multiple form-control p-5 br-20 box-shadow border-0 font-16 font-e color-dg" name="process[]" multiple="multiple">
                                    @foreach($controls as $con)
                                    @if($con->type=='bprocess')
                                    <option value="{{$con->id}}"@if($arrayControls) @if(in_array($con->id,$arrayControls)) Selected @endif @endif>{{$con->name}} <small>({{$con->followers->count()}})</small></option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="font-eb font-14 px-3 mb-0">Framework</label>
                                <select class="js-example-basic-multiple form-control p-5 br-20 box-shadow border-0 font-16 font-e color-dg" name="framework[]" multiple="multiple">
                                    @foreach($controls as $con)
                                    @if($con->type=='bframework')
                                    <option value="{{$con->id}}" @if($arrayControls) @if(in_array($con->id,$arrayControls)) Selected @endif @endif>{{$con->name}} <small>({{$con->followers->count()}})</small></option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>

                            <?php 
                            $arrayTags = array();?>
                            @foreach($rc->tags as $TAG)
                            <?php array_push($arrayTags,$TAG->tag_id);?>
                            @endforeach

                           

                            <div class="mb-4">
                                <label class="font-eb font-14 px-3 mb-0">Tags</label>
                                <select id="tags" class="js-example-basic-multiple form-control p-5 br-20 box-shadow border-0 font-16 font-e color-dg" name="tags[]" multiple="multiple">
                                @foreach($tags as $tg)
                                
                                <option value="{{$tg->id}}" @if($arrayTags) @if(in_array($tg->id,$arrayTags)) Selected @endif @endif>{{$tg->name}}</option>
                                @endforeach

                                
                                </select>
                            </div>
                            
                            <div class="mb-4">
                                <label class="font-eb font-14 px-3 mb-0">Business Impact</label>
                                <textarea cols="30" rows="3" class="form-control px-3 py-3 br-10 box-shadow border-0 font-14 font-e color-dg" name="business_impact" placeholder="Enter The Business Impact">{{$rc->business_impact}}</textarea>

                            
                                <small id="business_impact" class="form-text text-muted ml-3">
                                    The potential negative consequences that may occur as a result of the Risk
                                    </small>
                            </div>
                            {{-- <div class="mb-4">
                                <label class="font-eb font-14 px-3 mb-0">Recommendations</label>
                                <textarea cols="30" rows="3" class="form-control px-3 py-3 br-10 box-shadow border-0 font-14 font-e color-dg" name="recommendation" placeholder="Enter The Risk Control Corrective Action Recommendations">{{$rc->recommendation}}</textarea>
                                <small id="recommendations" class="form-text text-muted ml-3">
                                    Recommendations for corrective actions to be taken by Client Management
                                </small>
                            </div> --}}
                            <div class="mb-4 text-right">
                                <button onclick="addProcedure()" type="button" class="btn-create mr-4 mr-sm-0 mt-3 mt-sm-0 py-2 px-3">Continue To Risk Procedure</button>
                            </div>
                        </fieldset>
                        <fieldset hidden id="secondfieldset">
                            <div class="mb-4">
                                <label class="font-eb font-14 px-3 mb-0">Risk Procedures</label>
                                <div class="px-5 pb-2 pt-4 br-20 box-shadow border-0 font-16 font-e bg-white" id="testingSteps">
                                    <p class="p-style color-dg">Enter The Risk Procedures <a role="button" class="color-r float-right" onclick="addNewStep()"><i class="fas fa-plus-circle"></i></a></p>
                                    @php
                                        $tscount = 0;
                                    @endphp
                                    @if($rc->testingsteps)
                                        @foreach($rc->testingsteps as $ts)
                                            <?php $tscount = $loop->iteration;?>
                                        <div class="steps row border-gray-1 my-2 mx-0 br-10" id="step{{$tscount}}">
                                            <textarea name="testing_steps[]" class="form-control border-0 font-14 font-e color-dg col-10 col-sm-11 br-10" placeholder="Some Testing Steps" required>{{$ts->step}}</textarea>
                                                <a role="button" onclick="removestep({{$loop->iteration}})" class="color-dg col-2 col-sm-1 text-right pt-2"><i class="fas fa-times-circle"></i></a>
                                            </div>
                                        @endforeach
                                    @endif
                                
                                    
                                </div>
                            </div>
                            <div class="mb-4 text-right">
                                <button onclick="cancelProcedure()" type="button" class="btn-cancel mr-4 mt-3 mt-sm-0 py-2 px-3">Back</button>
                                {{-- <button onclick="addRelation()" type="button" class="btn-create mr-4 mr-sm-0 mt-3 mt-sm-0 py-2 px-3">Continue To Relation</button> --}}
                                <button type="submit" class="btn-create mr-4 mr-sm-0 mt-3 mt-sm-0 py-2 px-3">Update</button>
                            </div>
                        </fieldset>

                        {{-- <fieldset hidden id="thirdfieldset">
                            <div class="mb-4">
                                <label class="font-eb font-14 px-1 px-sm-3 mb-0">Risk Control Relationships</label>
                                <div class="row px-3 px-md-3 pb-0 pt-2 br-10 box-shadow border-0 font-14 color-dg font-e bg-white mx-0" id="relationsHere">
                                    <div class="col-10">
                                        <p class="px-0 p-style color-dg">Click to add other risk controls related to this one</p>
                                        
                                    </div>
                                    <div class="col-2 text-right">
                                        <a href="#relationModal" class="col-3 color-r font-20 px-0 " data-toggle="modal"><i class="fas fa-plus-circle"></i></a>
                                    </div>
                                @if($rc->relations)
                                <?php $relationIds = array(); ?>
                                @foreach($rc->relations as $rel)
                                    <?php  array_push($relationIds,'check'.$rel->relation->id); ?>
                                    <div class="col-12 border px-2 py-1" id="1check{{$rel->relation->id}}">
                                        <input type="hidden" name="relations[]" value='{{$rel->relation->id}}'>
                                        <p id="relationName" class="color-dg p-style">{{$rel->relation->title}}</p>
                                    </div>
                                @endforeach
                                @endif
                                    
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
                                    <button class="btn-create" type="button">Select & Save</button>
                                    <button class="btn-list" type="button"><i class="fas fa-tasks"></i></button>
                                  </div>
                                  <div id="relationBookmarks">
                                    @include('user.sections.editRelationRcs')
                                </div>
                                    
                                    <p class="text-right p-4"><a href="#" class="color-r font-eb font-14 text-underl">Back To Top</a><i class="fas fa-arrow-up color-r"></i></p>
                                  </div>
                                </div>
                              </div>
                            
                              <div class="mb-4 text-right">
                                <button onclick="cancelRelation()" type="button" class="btn-cancel mr-4 mt-3 mt-sm-0 py-2 px-3">Back</button>
                                <button type="submit" class="btn-create mr-4 mr-sm-0 mt-3 mt-sm-0 py-2 px-3">Update</button>
                            </div>
                        </fieldset> --}}
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
var step = {{$tscount}};
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
        step = step+1;
        $("#testingSteps").append(`<div class="steps row border-gray-1 my-2 mx-0 br-10" id="step${step}">
														<textarea name="testing_steps[]" class="form-control border-0 font-14 font-e color-dg col-10 col-sm-11 br-10" placeholder="Some Testing Steps" rows="3" style="resize: none;"></textarea>
														<a role="button" onclick="removestep(${step})" class="color-dg col-2 col-sm-1 text-right pt-2" style=""><i class="fas fa-times-circle" style=""></i></a>
									</div>`);
                                    
    }

    function removestep(id){
        $("#step"+id).remove();
    }

</script>

<script type="text/javascript">

    // var arrOfIds = ;
        $(document).ready(function() {
            
            $('.js-example-basic-multiple').select2();
            $('#tags').select2({
                tags:true,
            });

            
        });
    
        $(document).ready(function(){
            // arrOfIds.forEach(checkElements);
        $(document).on('click', '.page-link', function(event){
           event.preventDefault(); 
           var page = $(this).attr('href').split('page=')[1];
           fetch_data(page);
        });
       
        
       
       });
    
       function fetch_data(page)
        {
            //console.log(page);
         var _token = $("input[name=_token]").val();
         $.ajax({
             url:"{{route('edit.relation.bookmarks.fetch')}}",
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
                                        <input type="hidden" name="relations[]" value='${value}'>
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
</script>
@endsection