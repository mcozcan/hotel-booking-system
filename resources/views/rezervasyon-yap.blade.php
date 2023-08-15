@include('layouts.header')
<center>
<form method="post" action="{{ route('rez_yap_sorgula') }}" accept-charset="UTF-8">
    @csrf
    <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Rezervasyon Yap</h4>
        <form class="needs-validation" novalidate="">
          <div class="row g-6">

            <div class="col-sm-6">
                <label for="lastName" class="form-label">Giriş Tarihi</label>
                <input name="giris" type="date" class="form-control" placeholder="" value="" required="">
              </div>

              <div class="col-sm-6">
                <label for="lastName" class="form-label">Çıkış Tarihi</label>
                <input name="cikis" type="date" class="form-control" placeholder="" value="" required="">
              </div>
              <br>
              <br>
<br>
<br>
            <div class="col-sm-12">
              <label for="lastName" class="form-label">Kişi Sayısı</label>
              <select name="kisi_sayisi" id="personCount" onchange="updatePrice()">
                <option value="1">1 Kişi</option>
                <option value="2">2 Kişi</option>
                <option value="3">3 Kişi</option>
                <option value="4">4 Kişi</option>
                <!-- Diğer seçenekler fiyat <div id="price">Fiyat: $100</div> -->
              </select>

            </div>

          </div>
          <br>
          <br>
    <button type="submit" class="btn btn-primary">Sorgula</button>
  </form>

</center>
@include('layouts.footer')
