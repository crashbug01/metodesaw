<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function fkriteria()
    {
        return view("forms.kriteria");
    }

    public function falternatif()
    {
        return view("forms.alternatif");
    }

    public function fmkeputusan()
    {
        return view("forms.mkeputusan");
    }
}
