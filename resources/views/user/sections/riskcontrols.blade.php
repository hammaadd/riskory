@if($rcs)
        @foreach($rcs as $rc)
            @include('user.sections.riskControlView')        
        @endforeach
        @include('user.sections.listModal')
        @if(!isset($noLinks))
        {!! $rcs->withQueryString()->links() !!}
        @endif
    @else
    <p class="lead">No riskcontrols found....</p>   
    @endif