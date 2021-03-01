@if($rcs->count()<1)
<div class="col-12 text-center">
    <h3 class="lead font-24 mt-5">No posts show.</h3>
</div>

@endif

@if($rcs)
    @foreach($rcs as $rc)
        @include('user.sections.riskControlView')
    @endforeach
    {!! $rcs->withQueryString()->links() !!}
    @endif
