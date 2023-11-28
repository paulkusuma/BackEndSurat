<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Yaza\LaravelGoogleDriveStorage\Gdrive;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class GDriveController extends Controller
{
    public function upload(Request $request)
    {
        $filepath = public_path() . '/' . 'file.jpg';
        $filename = 'assets/file.jpg';
        Storage::disk('google')->put($filename, File::get($filepath));

        // Dapatkan URL penyimpanan dari Google Drive
        // $url = Storage::disk('google')->url($filename);
        // return response()->json(['url' => $url, 'Success' => true]);
        return response()->json(['Succes' => true]);


        // // // Kirim variabel $url ke tampilan qrcode.blade.php
        // // return view('qrcode', ['url' => $url]);
        // $request->merge(['url' => $url]);
        // return view('qrcode');
    }

    public function getFile(Request $request)
    {
        $data = Gdrive::get('assets/file.jpg');
        $url = $data->file; // Simpan URL dalam variabel $url
        return response($url);
        // return response($data->file, 200)
        //     ->header('Content-Type', $data->ext);

        // $data = Gdrive::get('assets/file.jpg');
        // $fileUrl = Storage::disk('google')->url($data); // Mengakses properti 'file' dari objek $data
        // $qrCode = QrCode::size(200)->generate($fileUrl);
        // return response($qrCode, 200)->header('Content-Type', 'image/png');

        // $data = Gdrive::get('assets/file.jpg');
        // $url = Storage::disk('google')->url($data);
        // // $fileUrl = $data->file;
        // // Generate QR code dari URL file
        // $qrCode = QrCode::size(200)->generate($url);
        // // $qrCode = QrCode::format('png')->size(200)->generate($fileUrl);
        // return response($qrCode, 200);
        // // ->header('Content-Type', $data->ext);
        // // ->header('Content-disposition', 'attachment; filename="' . $data->filename . '"');
        // // return response($data->file, 200)
        // //     ->header('Content-Type', $data->ext)
        // //     ->header('Content-disposition', 'attachment; filename="' . $data->filename . '"');
    }
}
