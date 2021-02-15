@if($lists)
@foreach($lists as $list)
<div class="row px-3 bg-lgray pb-3">
    <div class="round col-2">
        <input type="checkbox" name="checkbox[]" id="checkbox{{$list->id}}" value="{{$list->id}}" onclick="listCheck(this.id)"
        @if($list->listrcs->contains('rc_id',$rc->id))
        checked
        @endif />
        <label for="checkbox{{$list->id}}"></label>
     </div>
     <div class="col-10  border-0 pt-2">
         <div class="col-9 col-md-9 text-left text-md-left float-md-left d-inline-block">
            <div class="d-inline-block pt-1">
                <p class="p-style mb-0 font-eb font-16"><a href="#" class="color-b">{{$list->name}}</a></p>
                <p class="p-style font-eb color-r font-12 mb-0">{{$list->listrcs->count()}}</p>
            </div>
        </div>
        <div class="col-3 col-md-3 text-left text-md-right mt-md-0 float-md-right pt-1 d-inline-block float-right">
            <div class="d-inline-block mx-md-3 mt-2">
                <a href="#" class="font-eb color-lg font-16"><i class="fas fa-lock"></i></a>
            </div>
        </div>
     </div>
</div>
@endforeach
@endif