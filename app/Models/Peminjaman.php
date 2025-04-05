<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = "peminjaman";

    public function kategori_denda(){
        return $this->belongsToMany(Peminjaman::class, 'pengembalian');
    }

    //many to many
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user'); // pastikan model User
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku'); // pastikan model Buku
    }

    protected static function booted()
    {
        static::creating(function ($peminjaman) {
            $buku = Buku::find($peminjaman->id_buku);
            if ($buku && $buku->stok >= 1) {
                $buku->stok -= 1;
                $buku->save();
            } else {
                throw new \Exception('Stok buku tidak mencukupi.');
            }
        });

        static::deleting(function ($peminjaman) {
            $buku = Buku::find($peminjaman->id_buku);
            if ($buku) {
                $buku->stok += 1;
                $buku->save();
            }
        });
    }
}
