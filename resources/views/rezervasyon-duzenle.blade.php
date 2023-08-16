@if(Auth::id() != 1)
<meta http-equiv="refresh" content="0;URL=/">

@else

@include('layouts.header')


<center>

<form method="post" action="{{ route('rezupdate') }}" accept-charset="UTF-8">
    @csrf
    <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Rezervasyon Düzenle</h4>
        <form class="needs-validation" novalidate="">
          <div class="row g-6">

            <div class="col-sm-6">

                <label  class="form-label">Giriş Tarihi</label>
                <input name="giris" type="date" class="form-control" placeholder="" value="{{$rez_duzenle->giris}}" required="" readonly>

                <label  class="form-label">Oda id</label>
                <input name="odaid" type="text" class="form-control" placeholder="" value="{{$rez_duzenle->oda_id}}" >


                @php
                    $musteriid = Auth::id();
                @endphp
                <label  class="form-label">Müşteri id</label>
                <input name="musteri_id" type="text" class="form-control" placeholder="" value="{{$rez_duzenle->musteri_id}}" readonly>
              </div>

              <div class="col-sm-6">
                <label class="form-label">Çıkış Tarihi</label>
                <input name="cikis" type="date" class="form-control" placeholder="" value="{{$rez_duzenle->cikis}}" required="" readonly>
                <label  class="form-label">Rezervasyon id</label>
                <input name="rez_id" type="text" class="form-control" placeholder="" value="{{$rez_duzenle->id}}" readonly>
              </div>
              <br>
              <br>
<br>
<br>
            <div class="col-sm-12">
              <label class="form-label">Kişi Sayısı</label>
              <input name="kisi" type="text" class="form-control" placeholder="" value="{{$rez_duzenle->kisi_sayisi}}" required="" readonly>
            </div>

            <div class="col-sm-12">
                @php

                    $odabilgiler = DB::table('rooms')->where('id','=',$rez_duzenle->oda_id)->first();
                @endphp
                <label class="form-label">Oda Bilgileri</label>
                <input name="bilgi" type="text" class="form-control" placeholder="" value="{{$odabilgiler->oda_turu}}" required="" readonly>
              </div>

            <div class="col-sm-12">
                <label  class="form-label">İsim Soyisim:</label>
                <input name="isim" type="text" class="form-control" placeholder="" value="{{$rez_duzenle->musteri_adi}}" required="">
              </div>

              <div class="col-sm-12">

                <label class="form-label">Total Fiyat</label>
                <input name="total_fiyat" type="text" class="form-control" placeholder="" value="{{$rez_duzenle->total_fiyat}}" required="" readonly>
              </div>

          </div>
          <br>
          <br>
    <button type="submit" class="btn btn-primary">Rezervasyonu Güncelle</button>
  </form>


</center>
@include('layouts.footer')
@endif
