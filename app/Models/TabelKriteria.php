<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabelKriteria extends Model
{
    use HasFactory;
    protected $table = 'kriteria';
    protected $primaryKey = 'id_kriteria';
    protected $fillable = ['id_kriteria', 'nama_kriteria', 'bobot', 'sifat'];

    public function mKeputusan()
    {
        return $this->hasMany(TabelmKeputusan::class, 'id_kriteria', 'id_kriteria');
    }
}
