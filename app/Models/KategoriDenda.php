<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriDenda extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = "kategori_denda";

    public function peminjaman(){
        return $this->belongsToMany(Kategori_Denda::class, 'pengembalian');
    }
}
