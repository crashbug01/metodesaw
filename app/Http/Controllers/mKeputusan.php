<?php

namespace App\Http\Controllers;


use App\Models\TabelmKeputusan;
use App\Models\TabelAlternatif;
use App\Models\TabelKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class mKeputusan extends Controller
{
    public function storemkeputusan(Request $request)
    {
        $validatedData = $request->validate([
            'id_alternatif' => 'required|exists:alternatif,id_alternatif',
            'id_kriteria' => 'required|exists:kriteria,id_kriteria',
            'nilai' => 'required|numeric',
        ]);

        // Mendapatkan nilai id_ tertinggi dan menambah 1
        $maxId = DB::table('mkeputusan')->max('id_matriks');
        $newId = $maxId ? $maxId + 1 : 1;

        $mKeputusan = TabelmKeputusan::create([
            'id_matriks' => $newId,
            'id_alternatif' => $request->input('id_alternatif'),
            'id_kriteria' => $request->input('id_kriteria'),
            'nilai' => $request->input('nilai')
        ]);

        if ($mKeputusan) {
            return redirect('tabel-mkeputusan')->with('success', 'Matriks Keputusan berhasil ditambahkan');
        } else {
            return redirect('form-mkeputusan')->with('Matriks Keputusan gagal ditambahkan');
        }

    }

    public function editmkeputusan(TabelmKeputusan $mKeputusan)
    {
        return view("edits.mkeputusan", ['mKeputusan' => $mKeputusan]);
    }

    public function updatemkeputusan(Request $request, TabelmKeputusan $mKeputusan)
    {
        $request->validate([
            'id_alternatif' => 'required|exists:alternatif,id_alternatif',
            'id_kriteria' => 'required|exists:kriteria,id_kriteria',
            'nilai' => 'required|numeric',
        ]);

        $input = $request->all();
        $mKeputusan->update($input);
        return redirect('/tabel-mkeputusan');
    }

    public function destroymkeputusan(TabelmKeputusan $mKeputusan)
    {
        $mKeputusan->delete();
        return redirect('/tabel-mkeputusan');
    }
}
