<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EncryptFileController extends Controller
{
    public function store(Request $request)
    {
        $plainText = file_get_contents($request->file('plainFile')->getRealPath());
        $extension = $request->file('plainFile')->extension();

        $cipherText = openssl_encrypt($plainText, 'AES-256-ECB', $request->input('key'));

        $cipherFileName = date('Y-m-d-H-i-s') . '-cipher-file.' . $extension;

        return response()->streamDownload(function () use ($cipherText) {
            echo $cipherText;
        }, $cipherFileName, ['Content-Disposition: attachment']);
    }
}
