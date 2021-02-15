@if($rcs)
        @foreach($rcs as $rc)
            @include('visitor.sections.riskControlView')        
        @endforeach
        {{-- @include('visitor.sections.listModal') --}}
        @if(!isset($noLinks))
        {!! $rcs->withQueryString()->links() !!}
        @endif
@else
    <p class="lead">No riskcontrols found....</p>   
@endif