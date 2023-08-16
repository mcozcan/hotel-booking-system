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

    public function hakkimizda()
    {
        /// Controllerdan veriyi blade üzerine aktarma

        return view('hakkimizda');

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

    public function duzenle($id)
    {

        $oda_duzenle = Room::where('id','=',$id)->get();


        return view('oda-duzenle')->with('oda_duzenle', $oda_duzenle);
    }

    public function odaupdate(Request $request)
    {

        $oda_duzenle = Room::find($request->id);
        $oda_duzenle->kapasite = $request->kapasite;
        $oda_duzenle->oda_turu = $request->odaturu;
        $oda_duzenle->tek_kisi_fiyati = $request->tekfiyat;
        $oda_duzenle->ek_kisi_fiyati = $request->ekfiyat;
        $oda_duzenle->update();

        return redirect()->route('odalar');
    }







}
