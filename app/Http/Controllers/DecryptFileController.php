<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DecryptFileController extends Controller
{
    public function store(Request $request)
    {
        $cipherText = file_get_contents($request->file('cipherFile')->getRealPath());
        $extension = $request->file('cipherFile')->extension();

        $plainText = openssl_decrypt($cipherText, 'AES-256-ECB', $request->input('key'));

        $plainTextFileName  = date('Y-m-d-H-i-s') . '-plain-file.' . $extension;

        return response()->streamDownload(function () use ($plainText) {
            echo $plainText;
        }, $plainTextFileName, ['Content-Disposition: attachment']);
    }
}
