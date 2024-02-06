<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LapLabaRugi extends Controller
{
    public function index(){
        return view('konten.lap_laba_rugi');
    }
}
