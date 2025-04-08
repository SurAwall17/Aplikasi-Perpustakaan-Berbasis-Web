<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = "laporan";

    public function denda(){
        return $this->belongsTo(denda::class, 'id_denda');
    }
}
