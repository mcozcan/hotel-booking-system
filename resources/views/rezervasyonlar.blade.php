@if(Auth::id() != 1)
<meta http-equiv="refresh" content="0;URL=/">

@else

@include('layouts.header')


<center>

  <h2> Rezervasyonlar </h2>

@php

    $rezervasyonlarim = DB::table('rezervasyons')->where('id','>',0)->orderBy('created_at', 'DESC')->get();
@endphp
  <table style="width:80%" class="table">
    <thead>
      <tr>

        <th scope="col">İşlem sırası</th>
        <th scope="col">Müşteri</th>
        <th scope="col">Oda id</th>
        <th scope="col">Kişi Sayısı</th>
        <th scope="col">Giriş Tarihi</th>
        <th scope="col">Çıkış Tarihi</th>
        <th scope="col">Fiyat</th>
        <th scope="col">Düzenle</th>
        <th scope="col">Sil</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">



 @foreach ($rezervasyonlarim as $rzv )
      <tr>
        <th scope="row">{{$rzv ->id}}</th>
        <th scope="row">{{$rzv ->musteri_adi}}</th>
        <th scope="row">{{$rzv ->oda_id}}</th>
        <td>{{$rzv ->kisi_sayisi}}</td>
        <td>{{$rzv ->total_fiyat}} TL</td>
        <td>{{$rzv->giris}} </td>
        <td>{{$rzv->cikis}} </td>
        <td> <a href="{{ route('rezervasyon-duzenle', $rzv ->id) }}"><span>Düzenle</span></a> </td>
        <td> <a href="{{ route('rezervasyon-sil', $rzv ->id) }}"><span>Sil</span></a> </td>>



      </tr>
@endforeach

    </tbody>
  </table>


</center>
@include('layouts.footer')
@endif
