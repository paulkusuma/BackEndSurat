<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QrCodeController extends Controller
{
    public function qrindex(Request $request)
    {
        // Ambil variabel $url dari objek request
        $url = $request->input('url');

        return view("qrcode", ['url' => $url]);
        // return view("qrcode");
    }
}
