@if(Auth::id() != 1)
<meta http-equiv="refresh" content="0;URL=/">

@else

@include('layouts.header')
<center>



    <form method="post" action="{{ route('odaupdate') }}" accept-charset="UTF-8">
        @csrf

    @foreach ($oda_duzenle as $od)
        <div class="col-md-7 col-lg-8">
            <h4 class="mb-3">Oda Ekle</h4>
            <form class="needs-validation" novalidate="">
              <div class="row g-6">

                <div class="col-sm-6">
                    <label for="lastName" class="form-label">Oda Türü</label>
                    <input name="odaturu" type="text" class="form-control" placeholder="" value="{{$od->oda_turu}}" required="">
                    <input name="id" type="hidden" class="form-control" placeholder="" value="{{$od->id}}">
                  </div>

                <div class="col-sm-6">
                    <label for="lastName" class="form-label">Kapasite</label>
                    <input name ="kapasite" type="number" class="form-control" placeholder="" value="{{$od->kapasite}}" required="">
                  </div>


                <div class="col-sm-6">
                  <label for="lastName" class="form-label">1 Kisi Fiyatı</label>
                  <input name="tekfiyat" type="number" class="form-control" placeholder="" value="{{$od->tek_kisi_fiyati}}" required="">
                </div>

                <div class="col-sm-6">
                    <label for="lastName" class="form-label">Ek Kisi Fiyatı</label>
                    <input name="ekfiyat" type="number" class="form-control" placeholder="" value="{{$od->ek_kisi_fiyati}}" required="">
                  </div>
              </div>

<br>
        <button type="submit" class="btn btn-primary">Kaydet</button>
        @endforeach
      </form>


</center>
@include('layouts.footer')
@endif
