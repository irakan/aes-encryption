<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EncryptKeyController extends Controller
{
    public function store(Request $request)
    {
        $reciverPublicKey = file_get_contents($request->file('reciverPublicKeyFile')->getRealPath());

        openssl_public_encrypt($request->input('key'), $cipherKey, $reciverPublicKey);

        $cipherKeyFileName = date('Y-m-d-H-i-s') . '-cipher-key.pem';

        return response()->streamDownload(function () use ($cipherKey) {
            echo $cipherKey;
        }, $cipherKeyFileName);
    }
}
