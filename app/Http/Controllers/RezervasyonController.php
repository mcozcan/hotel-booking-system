<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RezervasyonController extends Controller
{
    public function rez_yap_index()
    {

        return view('rezervasyon-yap');
    }

    public function rez_yap_sorgula(Request $request)
    {


        return view('rezervasyon-yap');
    }



    public function rez_yap()
    {

        return view('rezervasyon-yap');
    }


}
