<?php

namespace App\Http\Controllers;
use App\Models\Rezervasyon;
use App\Models\Room;
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







    public function rez_yap()
    {

        return view('rezervasyon-yap');
    }


}
