@include('layouts.header')


<center>
    @php
        $musteri_id = Auth::id();
    @endphp

    @if(isset($musait_odalar))
    <div id="result"></div>


    @else

    <form method="post" action="{{ route('rez_yap_sorgula') }}" accept-charset="UTF-8" id="rezervasyonForm">
        @csrf
        <div class="col-md-7 col-lg-8">
            <h4 class="mb-3">Rezervasyon Yap</h4>
            <div class="row g-6">

                <div class="col-sm-6">
                    <label for="lastName" class="form-label">Giriş Tarihi</label>
                    <input id="girisTarihi" name="giris" type="date" class="form-control" placeholder="" value="" required="">
                    <input id="musteri_id" name="musteriid" type="hidden" class="form-control" placeholder="" value="{{ Auth::id() }}" required="">
                </div>

                <div class="col-sm-6">
                    <label for="lastName" class="form-label">Çıkış Tarihi</label>
                    <input id="cikisTarihi" name="cikis" type="date" class="form-control" placeholder="" value="" required="">
                </div>
                <br>
                <br>
                <div class="col-sm-12">
                    <label for="lastName" class="form-label">Kişi Sayısı</label>
                    <select id="kisiSayisi" name="kisi_sayisi" id="personCount" onchange="updatePrice()">
                        <option value="1">1 Kişi</option>
                        <option value="2">2 Kişi</option>
                        <option value="3">3 Kişi</option>
                        <option value="4">4 Kişi</option>
                    </select>
                </div>

            </div>
            <br>
            <br>
            <div id="result"></div>

            <button type="submit" class="btn btn-primary">Sorgula</button>
        </div>
    </form>








@endif
@if(isset($musait_odalar))


  <h2> Müsait Odalar </h2>


  <table class="table">
    <thead>
      <tr>
        <th scope="col">Oda Numarası</th>
        <th scope="col">Oda Türü</th>
        <th scope="col">Kapasite</th>
        <th scope="col">Tek Fiyat</th>
        <th scope="col">Ek Fiyat</th>
        <th scope="col">Rezervasyon Yap</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">



 @foreach ($musait_odalar as $oda )
      <tr>
        <th scope="row">{{$oda->id}}</th>
        <td>{{$oda->oda_turu}}</td>
        <td>{{$oda->kapasite}}</td>
        <td>{{$oda->tek_kisi_fiyati}} TL</td>
        <td>{{$oda->ek_kisi_fiyati}} TL</td>
        <td> <a href="{{ route('rezervasyon_odeme', $oda->id) }}"><span>Rezervasyon Yap</span></a> </td>



      </tr>
@endforeach

    </tbody>
  </table>

  @else
  <h3> Müsait Oda bulunamadı </h3>


@endif
</center>
@include('layouts.footer')

