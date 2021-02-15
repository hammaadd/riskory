@if($data)
@foreach($data as $dt)
@php $rc = $dt->rc; @endphp
 @include('user.sections.riskControlView')

@endforeach
@include('user.sections.listModal')
@endif