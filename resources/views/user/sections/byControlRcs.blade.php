@if($rcs)
@foreach($rcs as $dt)
@php $rc = $dt; @endphp
 @include('user.sections.riskControlView')

@endforeach
@include('user.sections.listModal')
{!! $rcs->withQueryString()->links() !!}
@endif
