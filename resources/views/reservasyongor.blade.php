@if(Auth::id() != 1)
<meta http-equiv="refresh" content="0;URL=/">

@else

@include('layouts.header')

@include('layouts.footer')
@endif
