@extends('user.layout.contributor')
@section('SiteTitle','Lists || Riskory')
@section('content')
<div class="col-12 col-md-9 px-md-0 py-5">

    <div class="sect--title pl-sm-3 px-md-5">
        <div class="row mb-4 mb-xl-5 align-items-sm-center">
            <div class="col-sm-auto col-12 px-0 pr-lg-3 sect--title__col">
                <p class="bg-lblue font-eb d-sm-inline-block font-18 ml-3 ml-sm-0 ml-md-3 py-2 pl-3 pl-md-5 pr-5 mb-0 rounded-right-xl shadow-sm"><i><img src="{{asset('assets/images/Mask Group 10@2x.png')}}" class="align-bottom" width="35px"></i>&nbsp;&nbsp;Your Risk Control Lists</p>
            </div>
            <div class="col-sm-auto col-12 ml-sm-auto text-right mt-3 mt-sm-0">
                <button class="btn bg-red text-light br-7 font-12 text-capitalize font-weight-bold" data-toggle="modal" data-target="#newListModal"><i class="fas fa-plus-circle"></i> New List</button>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade riskory-modal" id="newListModal" tabindex="-1" role="dialog" aria-labelledby="listModal" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="text-center">
              <h6 class="p-style font-b">Creating new list</h6>
              <input type="hidden" value="{{route('get.all.lists')}}" id="getDataUrl">
              <form id="listForm" method="POST" action="{{route('add.list')}}">
                @csrf
                <input type="text" name="name" placeholder="List Name" class="form-control color-b br-10 mt-2 mb-3" required>
                <input type="text" name="description" placeholder="Description" class="form-control color-b br-10">
                <div class="radio-item">
                  <input type="radio" id="publiclist" name="listtype" value="1" checked="">
                  <label for="publiclist" class="font-14">Public</label>
                </div>
                <div class="radio-item ml-3">
                  <input type="radio" id="privatelist" name="listtype" value="0">
                  <label for="privatelist" class="font-14">Private</label>
                </div>
                <div class="my-2">
                  <button class="font-14 font-b color-r bg-transparent border-2 br-7 px-3 py-2 mx-1" type="button" data-dismiss="modal">Cancel</button>
                  <input type="submit" name="" value="Create" class="font-14 font-b color-w bg-red border-2 br-7 px-3 py-2 mx-1">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row px-xl-5 mx-0 mx-md-5 pt-3">
      <div class="col-12 bg-lgray br-7 border-0 box-shadow py-1 px-4 p-md-5" id="listsData"></div>
    </div>
</div>
<div class="modal fade riskory-modal" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="text-center">
              <h6 class="p-style text-danger">Delete List</h6>
              <form id="deleteForm" method="POST" action="{{route('delete.list')}}">
                  @method('DELETE')
                  @csrf
                  <input type="hidden" id="delId" name="delId" value="0">
                  <p class="lead">Do you really want to delete this list?</p>
                  <div class="my-2">
                    <button class="font-14 font-b color-r bg-transparent border-2 br-7 px-3 py-2 mx-1" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" name="" value="Delete" class="font-14 font-b color-w bg-red border-2 br-7 px-3 py-2 mx-1">
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('script')
<script src="{{asset('js/list.js')}}"></script>
@endsection
