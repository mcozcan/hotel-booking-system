<?php

namespace App\Http\Controllers;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    //
    public function index()
    {
        /// Controllerdan veriyi blade üzerine aktarma
        $odalar = Room::where('id','>',0)->get();
        return view('odalar')->with('odalar', $odalar);

    }

    public function ekle(Request $request)
    {

        $yeni_oda = new Room();

        $yeni_oda->kapasite = $request->kapasite;
        $yeni_oda->oda_turu = $request->odaturu;
        $yeni_oda->tek_kisi_fiyati = $request->tekfiyat;
        $yeni_oda->ek_kisi_fiyati = $request->ekfiyat;
        $yeni_oda->save();

        return redirect()->route('odalar');
    }



}
