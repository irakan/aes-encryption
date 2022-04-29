<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class PairKeysController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;
        $publicKeyPath = 'pair-keys' . DIRECTORY_SEPARATOR . $userId . DIRECTORY_SEPARATOR . 'public.pem';

        $publicKey = Storage::get($publicKeyPath);

        return view('pair-keys', compact('publicKey'));
    }

    public function store()
    {
        $userId = auth()->user()->id;

        // Storage path
        $publicKeyPath = 'pair-keys' . DIRECTORY_SEPARATOR . $userId . DIRECTORY_SEPARATOR . 'public.pem';
        $privateKeyPath = 'pair-keys' . DIRECTORY_SEPARATOR . $userId . DIRECTORY_SEPARATOR . 'private.pem';

        // Create the keypair
        $result = openssl_pkey_new();
        // Get private key
        openssl_pkey_export($result, $privateKey);
        // Get public key
        $publicKey = openssl_pkey_get_details($result);
        $publicKey = $publicKey['key'];

        Storage::put($publicKeyPath, $publicKey);
        Storage::put($privateKeyPath, $privateKey);

        return back();
    }
}
