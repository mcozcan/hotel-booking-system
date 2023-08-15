<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
          <div class="col-md-3 mb-2 mb-md-0">
            <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
              <svg class="bi" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>
            <img src="{{asset('front/img/logo.png')}}" width="200" height="70" alt="Web Sitesi Logosu" />
          </div>

          <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="#" class="nav-link px-2 link-secondary">Ana Sayfa</a></li>
            <li><a href="#" class="nav-link px-2">Hakkımızda</a></li>

            @if(Auth::check())
            @if(Auth::user()->id == 1)
                <li><a href="#" class="nav-link px-2">Rezervasyonları Gör</a></li>
                <li><a href="/odalar" class="nav-link px-2">Odalar</a></li>
            @else
            <li><a href="#" class="nav-link px-2">Rezervasyonlarım</a></li>
            <li><a href="#" class="nav-link px-2">Rezervasyon Yap</a></li>
            @endif
            @endif


          </ul>
@auth

@endauth
          <div class="col-md-3 text-end">

            @if(Auth::check())
            @php
            $username =  Auth::user()->name;
          @endphp

                <h4>Hoşgeldin {{$username}} </h4>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Çıkış Yap</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
            @else
            <a href="/login" <button type="button" class="btn btn-outline-primary me-2">Giriş Yap</button></a>
            <a href="/register" <button type="button" class="btn btn-primary">Kayıt Ol</button></a>
             @endif

          </div>
        </header>
      </div>

    <link href="{{asset('front/css/bootstrap.min.css')}}" rel="stylesheet">
  </head>
