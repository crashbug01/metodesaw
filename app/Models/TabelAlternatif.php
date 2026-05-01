<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabelAlternatif extends Model
{
    use HasFactory;
    protected $table = 'alternatif';
    protected $primaryKey = 'id_alternatif';
    protected $fillable = ['id_alternatif', 'nama_alternatif', 'alamat'];

    public function mKeputusan()
    {
        return $this->hasMany(TabelmKeputusan::class, 'id_alternatif', 'id_alternatif');
    }
}
