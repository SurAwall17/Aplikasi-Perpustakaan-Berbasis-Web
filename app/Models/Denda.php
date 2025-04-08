<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denda extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = "denda";

    public function pengembalian(){
        return $this->belongsTo(Pengembalian::class, 'id_pengembalian');
    }

    public function laporan(){
        return $this->hasMany(laporan::class);
    }
}
