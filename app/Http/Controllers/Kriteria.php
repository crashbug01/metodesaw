<?php

namespace App\Http\Controllers;

use App\Models\TabelKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Kriteria extends Controller
{
    public function storekriteria(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama_kriteria' => 'required|string',
            'bobot' => 'required|numeric',
            'sifat' => 'required|string',
        ]);

        // Ambil ID tertinggi dari tabel kriteria
        $maxId = DB::table('kriteria')->max('id_kriteria');

        // Tentukan ID baru dengan menambahkan 1
        $newId = $maxId ? $maxId + 1 : 1;

        // Buat data kriteria dengan ID manual
        $kriteria = TabelKriteria::create([
            'id_kriteria' => $newId,
            'nama_kriteria' => $request->input('nama_kriteria'),
            'bobot' => $request->input('bobot'),
            'sifat' => $request->input('sifat'),
        ]);

        // Cek hasil penyimpanan
        if ($kriteria) {
            return redirect('/tabel-kriteria')->with('success', 'Kriteria berhasil ditambahkan');
        } else {
            return redirect('/form-kriteria')->with('error', 'Kriteria gagal ditambahkan');
        }
    }

    public function editkriteria(TabelKriteria $kriteria)
    {
        return view("edits.kriteria", ['kriteria' => $kriteria]);
    }

    public function updatekriteria(Request $request, TabelKriteria $kriteria)
    {
        $request->validate([
            'nama_kriteria' => 'required',
            'bobot' => 'required',
            'sifat' => 'required',
        ]);

        $input = $request->all();

        $kriteria->update($input);
        return redirect('/tabel-kriteria');
    }

    public function destroykriteria(TabelKriteria $kriteria)
    {
        $kriteria->delete();
        return redirect('/tabel-kriteria');
    }
}
