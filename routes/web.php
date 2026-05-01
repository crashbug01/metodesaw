<?php

use App\Http\Controllers\FormsController;
use App\Http\Controllers\mKeputusan;
use App\Http\Controllers\TablesController;
use App\Http\Controllers\Kriteria;
use App\Http\Controllers\Alternatif;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

route::get('/tabel-kriteria', [TablesController::class, 'tkriteria']);
route::get('/tabel-alternatif', [TablesController::class, 'talternatif']);
route::get('/tabel-mkeputusan', [TablesController::class, 'tmkeputusan']);
route::get('/tabel-normalisasi', [TablesController::class, 'tnormalisasi']);
route::get('/tabel-rangking', [TablesController::class, 'trangking']);

route::get('/form-kriteria', [FormsController::class, 'fkriteria']);
route::get('/form-alternatif', [FormsController::class, 'falternatif']);
route::get('/form-mkeputusan', [FormsController::class, 'fmkeputusan']);

route::post('storekriteria', [Kriteria::class, 'storekriteria'])->name('kriteria.storekriteria');
route::get('kriteria/edit/{kriteria}', [Kriteria::class, 'editkriteria'])->name('kriteria.editkriteria');
route::put('kriteria/update/{kriteria}', [Kriteria::class, 'updatekriteria'])->name('kriteria.updatekriteria');
route::delete('kriteria/destroy/{kriteria}', [Kriteria::class, 'destroykriteria'])->name('kriteria.destroykriteria');

route::post('storealternatif', [Alternatif::class, 'storealternatif'])->name('alternatif.storealternatif');
route::get('alternatif/edit/{alternatif}', [Alternatif::class, 'editalternatif'])->name('alternatif.editalternatif');
route::put('alternatif/update/{alternatif}', [Alternatif::class, 'updatealternatif'])->name('alternatif.updatealternatif');
route::delete('alternatif/destroy/{alternatif}', [Alternatif::class, 'destroyalternatif'])->name('alternatif.destroyalternatif');

route::post('storemkeputusan', [mKeputusan::class, 'storemkeputusan'])->name('mkeputusan.storemkeputusan');
route::get('mkeputusan/edit/{mKeputusan}', [mKeputusan::class, 'editmkeputusan'])->name('mkeputusan.editmkeputusan');
route::put('mkeputusan/update/{mKeputusan}', [mKeputusan::class, 'updatemkeputusan'])->name('mkeputusan.updatemkeputusan');
route::delete('mkeputusan/destroy/{mKeputusan}', [mKeputusan::class, 'destroymkeputusan'])->name('mkeputusan.destroymkeputusan');