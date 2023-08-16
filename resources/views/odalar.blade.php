@if(Auth::id() != 1)
<meta http-equiv="refresh" content="0;URL=/">

@else

@include('layouts.header')
<center>

    <form method="post" action="{{ route('odaekle') }}" accept-charset="UTF-8">
        @csrf
        <div class="col-md-7 col-lg-8">
            <h4 class="mb-3">Oda Ekle</h4>
            <form class="needs-validation" novalidate="">
              <div class="row g-6">

                <div class="col-sm-6">
                    <label for="lastName" class="form-label">Oda Türü</label>
                    <input name="odaturu" type="text" class="form-control" placeholder="" value="" required="">
                  </div>

                <div class="col-sm-6">
                    <label for="lastName" class="form-label">Kapasite</label>
                    <input name ="kapasite" type="number" class="form-control" placeholder="" value="" required="">
                  </div>


                <div class="col-sm-6">
                  <label for="lastName" class="form-label">1 Kisi Fiyatı</label>
                  <input name="tekfiyat" type="number" class="form-control" placeholder="" value="" required="">
                </div>

                <div class="col-sm-6">
                    <label for="lastName" class="form-label">Ek Kisi Fiyatı</label>
                    <input name="ekfiyat" type="number" class="form-control" placeholder="" value="" required="">
                  </div>
              </div>

<br>
        <button type="submit" class="btn btn-primary">Kaydet</button>
      </form>
      <br>
      <br>
      <br>
<h2> Odalar </h2>


  <table class="table">
    <thead>
      <tr>
        <th scope="col">Oda Numarası</th>
        <th scope="col">Oda Türü</th>
        <th scope="col">Kapasite</th>
        <th scope="col">Tek Fiyat</th>
        <th scope="col">Ek Fiyat</th>
        <th scope="col">Düzenle</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
 @foreach ($odalar as $oda )
      <tr>
        <th scope="row">{{$oda->id}}</th>
        <td>{{$oda->oda_turu}}</td>
        <td>{{$oda->kapasite}}</td>
        <td>{{$oda->tek_kisi_fiyati}} TL</td>
        <td>{{$oda->ek_kisi_fiyati}} TL</td>
        <td> <a href="{{ route('oda-duzenle', $oda->id) }}"><span>Düzenle</span></a> </td>


      </tr>
@endforeach

    </tbody>
  </table>
</center>
@include('layouts.footer')
@endif
