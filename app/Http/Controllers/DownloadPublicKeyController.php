<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadPublicKeyController extends Controller
{
    public function __invoke()
    {
        if (!auth()->user()->hasPairKeys()) {
            return redirect()->route('pair-keys');
        }

        $userId = auth()->user()->id;
        $publicKeyPath = 'pair-keys' . DIRECTORY_SEPARATOR . $userId . DIRECTORY_SEPARATOR . 'public.pem';


        $publicKeyFileName = Str::slug(auth()->user()->name) . '-public.pem';

        return Storage::download($publicKeyPath, $publicKeyFileName);
    }
}
