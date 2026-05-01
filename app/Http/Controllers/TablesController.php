<?php

namespace App\Http\Controllers;

use App\Models\TabelAlternatif;
use App\Models\TabelKriteria;
use App\Models\mKeputusan;
use App\Models\TabelmKeputusan;
use App\Models\TabelNormalisasi;
use App\Models\TabelRangking;
use Illuminate\Http\Request;

class TablesController extends Controller
{
    public function tkriteria()
    {
        $kriteria = TabelKriteria::all();
        return view("tables.kriteria", ['kriteria' => $kriteria]);
    }

    public function talternatif()
    {
        $alternatif = TabelAlternatif::all();
        return view("tables.alternatif", ['alternatif' => $alternatif]);
    }

    public function tmkeputusan()
    {
        $mKeputusan = TabelmKeputusan::all();
        return view("tables.mkeputusan", ['mKeputusan' => $mKeputusan]);
    }

    public function tnormalisasi()
    {
        $normalisasi = TabelNormalisasi::all();
        return view('tables.normalisasi', compact('normalisasi'));
    }

    public function trangking()
    {
        $rangking = TabelRangking::all();
        return view('tables.rangking', compact('rangking'));
    }
}
