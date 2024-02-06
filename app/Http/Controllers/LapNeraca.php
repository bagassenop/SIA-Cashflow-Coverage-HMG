<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LapNeraca extends Controller
{
    public function index(){
        return view('konten.lap_neraca');
    }
}
