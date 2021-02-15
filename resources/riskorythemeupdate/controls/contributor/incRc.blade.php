@foreach($rcs as $rc)
<div class="row">
    <div class="col-12"><h4><strong>Title:</strong> {{$rc->title}}</h4></div>
    
</div>
<div class="col-12"><p><strong>Objective Summary: </strong>{{$rc->obj_summary}}</p></div>
<div class="col-12">
    
    <?php $conts = $rc->controls->where('type','industry');?>
    @if($conts)
    <small><strong>Industries</strong></small><br>
        @foreach($conts as $con)
        <span class="badge badge-primary">{{$con->control->name}}</span>
        @endforeach
    @endif
</div>
<div class="col-12">
    
    <?php $conts = $rc->controls->where('type','bframework');?>
    @if($conts)
    <small><strong>Business frameworks</strong></small><br>
        @foreach($conts as $con)
        <span class="badge badge-warning">{{$con->control->name}}</span>
        @endforeach
    @endif
</div>
<div class="col-12">
    
    <?php $conts = $rc->controls->where('type','bprocess');?>
    @if($conts)
    <small><strong>Business processs</strong></small><br>
        @foreach($conts as $con)
        <span class="badge badge-success">{{$con->control->name}}</span>
        @endforeach
    @endif
</div>
<hr>
<div class="col-12">
    Views : {{views($rc)->count()}}
</div>
@endforeach
<div class="mt-2 d-flex justify-content-end">
{!! $rcs->links() !!}
</div>