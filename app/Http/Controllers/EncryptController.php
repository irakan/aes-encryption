<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class EncryptController extends Controller
{
    public function show()
    {
        if (!auth()->user()->hasPairKeys()) {
            return redirect()->route('pair-keys');
        }

        $randomKey = Str::random(32);

        return view('encrypt', compact('randomKey'));
    }
}
