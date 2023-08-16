<?php

namespace App\Http\Controllers;
use App\Models\Rezervasyon;
use App\Models\Room;
use App\Models\Rezervsorgu;
use Illuminate\Http\Request;

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

        /// rezervasyon sorgusunu kaydetme

        $yenisorgu =  new Rezervsorgu();
        $yenisorgu->musteri_id = $request->musteriid;
        $yenisorgu->kisi_sayisi = $request->kisi_sayisi;
        $yenisorgu->giris = $giris;
        $yenisorgu->cikis = $cikis;
        $yenisorgu->save();


        $oda_sorgula = Room::where('kapasite', '>=', $request->kisi_sayisi)->get();

        foreach ($oda_sorgula as $oda) {
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




    public function rez_yap()
    {

        return view('rezervasyon-yap');
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

}
