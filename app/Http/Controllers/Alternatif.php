<?php

namespace App\Http\Controllers;

use App\Models\TabelAlternatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Alternatif extends Controller
{
    public function storealternatif(Request $request)
    {
        $validatedData = $request->validate([
            'nama_alternatif' => 'required|string',
            'alamat' => 'required|string',
        ]);

        // Mendapatkan nilai id_alternatif tertinggi dan menambah 1
        $maxId = DB::table('alternatif')->max('id_alternatif');
        $newId = $maxId ? $maxId + 1 : 1;

        // Menyimpan data dengan id_alternatif baru
        $alternatif = TabelAlternatif::create([
            'id_alternatif' => $newId,
            'nama_alternatif' => $request->input('nama_alternatif'),
            'alamat' => $request->input('alamat'),
        ]);

        if ($alternatif) {
            return redirect('/tabel-alternatif')->with('success', 'Alternatif berhasil ditambahkan');
        } else {
            return redirect('/form-alternatif')->with('error', 'Alternatif gagal ditambahkan');
        }
    }

    public function editalternatif(TabelAlternatif $alternatif)
    {
        return view("edits.alternatif", ['alternatif' => $alternatif]);
    }

    public function updatealternatif(Request $request, TabelAlternatif $alternatif)
    {
        $request->validate([
            'nama_alternatif' => 'required',
            'alamat' => 'required',
        ]);

        $input = $request->all();

        $alternatif->update($input);
        return redirect('/tabel-alternatif');
    }

    public function destroyalternatif(TabelAlternatif $alternatif)
    {
        $alternatif->delete();
        return redirect('/tabel-alternatif');
    }

}
