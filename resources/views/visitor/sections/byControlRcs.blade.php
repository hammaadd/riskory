@if($data)
@foreach($data as $dt)
@php $rc = $dt->rc; @endphp
 @include('visitor.sections.riskControlView')

@endforeach
{{-- @include('visitor.sections.listModal') --}}
@endif