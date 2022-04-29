<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DecryptController extends Controller
{
    public function show()
    {
        if (!auth()->user()->hasPairKeys()) {
            return redirect()->route('pair-keys');
        }


        return view('decrypt');
    }
}
