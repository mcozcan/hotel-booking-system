@if(Auth::check())

@include('layouts.header')


<center>
<form method="post" action="{{ route('rezyaptamam') }}" accept-charset="UTF-8">
    @csrf
    <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Rezervasyon Yap</h4>
        <form class="needs-validation" novalidate="">
          <div class="row g-6">

            <div class="col-sm-6">
                @php
                $sonsorgu = DB::table('rezervsorgus')->where('musteri_id','=',Auth::id())->orderBy('created_at', 'DESC')->first();
            @endphp
                <label  class="form-label">Giriş Tarihi</label>
                <input name="giris" type="date" class="form-control" placeholder="" value="{{$sonsorgu->giris}}" required="" readonly>
                <input name="odaid" type="hidden" class="form-control" placeholder="" value="{{$odaid}}">
                @php
                    $musteriid = Auth::id();
                @endphp
                <input name="musteri_id" type="hidden" class="form-control" placeholder="" value="{{$musteriid}}">
              </div>

              <div class="col-sm-6">
                <label class="form-label">Çıkış Tarihi</label>
                <input name="cikis" type="date" class="form-control" placeholder="" value="{{$sonsorgu->cikis}}" required="" readonly>
              </div>
              <br>
              <br>
<br>
<br>
            <div class="col-sm-12">
              <label class="form-label">Kişi Sayısı</label>
              <input name="kisi" type="text" class="form-control" placeholder="" value="{{$sonsorgu->kisi_sayisi}}" required="" readonly>
            </div>

            <div class="col-sm-12">
                @php

                    $odabilgiler = DB::table('rooms')->where('id','=',$odaid)->first();
                @endphp
                <label class="form-label">Oda Bilgileri</label>
                <input name="bilgi" type="text" class="form-control" placeholder="" value="{{$odabilgiler->oda_turu}}" required="" readonly>
              </div>

            <div class="col-sm-12">
                <label  class="form-label">İsim Soyisim:</label>
                <input name="isim" type="text" class="form-control" placeholder="" value="" required="">
              </div>

              <div class="col-sm-12">
                @php

                $girisson = new DateTime($sonsorgu->giris);
                $cikisson = new DateTime($sonsorgu->cikis);
                $gunFarki = $girisson->diff($cikisson)->days;
                $total_fiyat = 0;
                    if($sonsorgu->kisi_sayisi == 1) {
                       $total_fiyat =  $odabilgiler->tek_kisi_fiyati * $gunFarki;
                    }
                    elseif($sonsorgu->kisi_sayisi > 1) {
                        $total_fiyat =  $odabilgiler->tek_kisi_fiyati * $gunFarki;
                        $total_fiyat =  $odabilgiler->ek_kisi_fiyati * $gunFarki * ($sonsorgu->kisi_sayisi - 1);
                    }
                @endphp
                <label class="form-label">Total Fiyat</label>
                <input name="total_fiyat" type="text" class="form-control" placeholder="" value="{{$total_fiyat}}" required="" readonly>
              </div>

              <div class="col-sm-12">
                <label  class="form-label">Kredi Kartı Numarası</label>
                <input name="kk" type="number" class="form-control" placeholder="" value="" required="">
              </div>

          </div>
          <br>
          <br>
    <button type="submit" class="btn btn-primary">Rezervasyon Yap</button>
  </form>


</center>
@include('layouts.footer')

@else
<meta http-equiv="refresh" content="0;URL=/">
@endif
