<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'buku';

    public function user(){
        return $this->belongsToMany(User::class, 'peminjaman');
    }
}
