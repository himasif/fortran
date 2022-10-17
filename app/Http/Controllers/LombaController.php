<?php

namespace App\Http\Controllers;
use App\Lomba;

use Illuminate\Http\Request;

class LombaController extends Controller
{
    public function index()
    {
        $lomba = Lomba::all();
        return view("welcome", compact('Lomba'),[
            'title'=>'home',

        ]);
    }
}
