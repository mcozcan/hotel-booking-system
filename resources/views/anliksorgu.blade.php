@if(Auth::id() != 1)
<meta http-equiv="refresh" content="0;URL=/">

@else
@include('layouts.header')
@php
    $jsonPath = public_path('reservations.json');
    $jsonData = file_exists($jsonPath) ? json_decode(file_get_contents($jsonPath)) : null;
@endphp

@if ($jsonData)
<center>
    <!-- 5 numaralı madde için yazıldı -->
    <p>Giriş Tarihi: {{ $jsonData->giris }}</p>
    <p>Çıkış Tarihi: {{ $jsonData->cikis }}</p>
    <p>Müşteri ID: {{ $jsonData->musteriid }}</p>
</center>
@endif


@include('layouts.footer')

@endif

