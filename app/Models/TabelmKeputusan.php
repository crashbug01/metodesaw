<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabelmKeputusan extends Model
{
    use HasFactory;
    protected $table = 'mkeputusan';    
    protected $primaryKey = 'id_matriks';
    protected $fillable = ['id_matriks', 'id_alternatif', 'id_kriteria', 'nilai'];

    public function alternatif()
    {
        return $this->belongsTo(TabelAlternatif::class, 'id_alternatif', 'id_alternatif');
    }

    public function kriteria()
    {
        return $this->belongsTo(TabelKriteria::class, 'id_kriteria', 'id_kriteria');
    }
}
