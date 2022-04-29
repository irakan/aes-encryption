<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DecryptKeyController extends Controller
{
    public function store(Request $request)
    {
        $userId = auth()->user()->id;
        $privateKeyPath = 'pair-keys' . DIRECTORY_SEPARATOR . $userId . DIRECTORY_SEPARATOR . 'private.pem';

        $privateKey = Storage::get($privateKeyPath);
        $cipherKey = file_get_contents($request->file('cipherKeyFile')->getRealPath());

        openssl_private_decrypt($cipherKey, $plainKey, $privateKey);


        $plainKeyFileName  = date('Y-m-d-H-i-s') . '-plain-key-file.txt';

        return response()->streamDownload(function () use ($plainKey) {
            echo $plainKey;
        }, $plainKeyFileName, ['Content-Disposition: attachment']);
    }
}
