@section('alerts')
{{-- @foreach (['error', 'warning', 'success'] as $msg)
@if(Session::has('laratrust-' . $msg))
<div class="alert-{{ $msg }}" role="alert">
  <p>{{ Session::get('laratrust-' . $msg) }}</p>
</div>
@endif
@endforeach --}}
<script>
    @foreach (['error', 'warning', 'success'] as $msg)
    @if(Session::has('laratrust-' . $msg))
        @if($msg=='success')
        toastr.success("{{ Session::get('laratrust-' . $msg) }}");
        @elseif($msg=='warning' || $msg=='error')
        toastr.error("{{ Session::get('laratrust-' . $msg) }}");
        @endif
    @endif
    @endforeach
  </script>