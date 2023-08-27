@if(Auth::check())


@include('layouts.header')


<center>

  <h2> Rezervasyonlarım </h2>

  <h1>Bildirimler</h1>

  @forelse($user->notifications as $notification)

        <h1>{{$notification->data['name']}}</h1>
  @empty

  @endforelse
@php
    $id = Auth::id();
    $rezervasyonlarim = DB::table('rezervasyons')->where('musteri_id','=',$id)->get();
    $rzvoda = DB::table('rezervasyons')->where('musteri_id','=',$id)->first();
    $odaturu = DB::table('rooms')->where('id','=',$rzvoda->oda_id)->first();
@endphp
  <table style="width:80%" class="table">
    <thead>
      <tr>
        <th scope="col">Oda Numarası</th>
        <th scope="col">Oda Türü</th>
        <th scope="col">Kişi Sayısı</th>
        <th scope="col">Giriş Tarihi</th>
        <th scope="col">Çıkış Tarihi</th>
        <th scope="col">Fiyat</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">



 @foreach ($rezervasyonlarim as $rzv )
      <tr>
        <th scope="row">{{$rzv ->id}}</th>
        <td>{{$odaturu ->oda_turu}}</td>
        <td>{{$rzv ->kisi_sayisi}}</td>
        <td>{{$rzv ->total_fiyat}} TL</td>
        <td>{{$rzv->giris}} </td>
        <td>{{$rzv->cikis}} </td>



      </tr>
@endforeach

    </tbody>
  </table>


</center>
@include('layouts.footer')
@else
<meta http-equiv="refresh" content="0;URL=/">
@endif
