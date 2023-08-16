<?php

namespace App\Http\Controllers;
use App\Models\Rezervasyon;
use App\Models\Room;
use App\Models\Rezervsorgu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class RezervasyonController extends Controller
{
    public function rez_yap_index()
    {

        return view('rezervasyon-yap');
    }

    public function rez_yap_sorgula(Request $request)
    {

        $musait_odalar = [];

        $giris = $request->giris;
        $cikis = $request->cikis;

        /// rezervasyon sorgusunu kaydetme, ilerdeki sayfaya veriyi aktarmak için kullanıldı

        $yenisorgu =  new Rezervsorgu();
        $yenisorgu->musteri_id = $request->musteriid;
        $yenisorgu->kisi_sayisi = $request->kisi_sayisi;
        $yenisorgu->giris = $giris;
        $yenisorgu->cikis = $cikis;
        $yenisorgu->save();

        $data = [
            'giris' => $request->input('giris'),
            'cikis' => $request->input('cikis'),
            'musteriid' => $request->input('musteriid'),
        ];

        $jsonData = json_encode($data, JSON_PRETTY_PRINT);
        // rezervasyon için tarihler çekildiğinde giriş çıkış ve müşteri id javascipt ile admin panelinde bulunan son sorgu kısmında gösterildi
        file_put_contents(public_path('reservations.json'), $jsonData);


        $oda_sorgula = Room::where('kapasite', '>=', $request->kisi_sayisi)->get();

        foreach ($oda_sorgula as $oda) {
            /// aynı tarihlerde giriş çıkış yapılmasını engelleyen foreach, üzerinde uzunca uğraştım 17.08.2023 tarihinde girip 19.08.2023 tarihinde çıkış yapacak olsun başka bir müşteri için 18.08.2023 tarihindeki bir girişe izin vermemeliydi bu kısımı uzunca düşünmem gerekti
            $rezervasyonlar = Rezervasyon::where('oda_id', $oda->id)
                ->where(function ($query) use ($giris, $cikis) {
                    $query->where('giris', '<=', $cikis)
                        ->where('cikis', '>', $giris);
                })
                ->get();

            if ($rezervasyonlar->isEmpty()) {
                $musait_odalar[] = $oda;
            }
        }

        return view('rezervasyon-yap')->with(['musait_odalar' => $musait_odalar]);
    }


    public function rezervasyonlarim()
    {
        return view('rezervasyonlarim');
    }

    public function rezervasyonlar()
    {
        return view('rezervasyonlar');
    }

    public function rezervasyon_odeme($id){

        $odaid = $id;
        return view('rezervasyon_odeme')->with(['odaid' => $odaid]);
    }

    public function rezervasyon_duzenle($id) {

        $rez_duzenle = Rezervasyon::where('id','=',$id)->first();

        return view('rezervasyon-duzenle')->with('rez_duzenle', $rez_duzenle);
    }


    public function rez_yap()
    {

        return view('rezervasyon-yap');
    }

    public function rezupdate(Request $request) {

        $rez_duzenle = Rezervasyon::where('id','=',$request->rez_id)->first();
        $rez_duzenle->giris = $request->giris;
        $rez_duzenle->cikis = $request->cikis;
        $rez_duzenle->kisi_sayisi = $request->kisi;
        $rez_duzenle->musteri_adi = $request->isim;
        $rez_duzenle->musteri_id = $request->musteri_id;
        $rez_duzenle->total_fiyat = $request->total_fiyat;
        $rez_duzenle->oda_id = $request->odaid;
        $rez_duzenle->save();
        return view('rezervasyonlar');
    }

    public function generateRandomNumber($length = 8) {
        $characters = '0123456789';
        $charLength = strlen($characters);
        $randomNumber = '';

        for ($i = 0; $i < $length; $i++) {
            $randomNumber .= $characters[rand(0, $charLength - 1)];
        }

        return $randomNumber;
    }

    public function rezervasyon_sil($id) {
        $rez_sil = Rezervasyon::where('id','=',$id)->first();
        $rez_sil->delete();
        return view('rezervasyonlar');
    }


    public function rezyaptamam(Request $request) {

        //rezervbasyon numarası oluşturma
        $reznumarasi = $this->generateRandomNumber(8);

        //// kayıt
        $yenirez = new Rezervasyon();
        $yenirez->giris = $request->giris;
        $yenirez->cikis = $request->cikis;
        $yenirez->kisi_sayisi = $request->kisi;
        $yenirez->musteri_adi = $request->isim;
        $yenirez->musteri_id = $request->musteri_id;
        $yenirez->rez_kod = $reznumarasi;
        $yenirez->total_fiyat = $request->total_fiyat;
        $yenirez->oda_id = $request->odaid;
        $yenirez->save();
        //rezervasyonlarım sayfasına atacak
        return view('rezervasyonlarim');
    }





    public function anliksorgu()
{
    $jsonDosyaYolu = storage_path('app/anlik_sorgu.json');

    if (file_exists($jsonDosyaYolu)) {
        $jsonData = file_get_contents($jsonDosyaYolu);
        $anlikSorguVerileri = json_decode($jsonData);

        return view('anliksorgu', ['anlikSorguVerileri' => $anlikSorguVerileri]);
    } else {
        return view('anliksorgu', ['anlikSorguVerileri' => null]);
    }

        //json formatındaki veriden anlık sorgu verileri okundu
}



public function sorgu()
{
    return view('rezervasyon-sorgu');
}

public function sorguajax(Request $request)
{
    // sorgulama için javascript kullanıldı, sorguajax kısmı api gibi işlev görüyor /rezervasyon-sorgula-ajax?reservation_number=(rezervasyonnumarası) ile sorgulama yapılabilir
    $reservationNumber = $request->input('reservation_number');

    $reservation = Rezervasyon::where('rez_kod', $reservationNumber)->first();

    return response()->json($reservation);
}


}
