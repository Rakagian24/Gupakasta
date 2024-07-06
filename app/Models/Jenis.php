<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;

    protected $table = 'jenis';
    protected $primaryKey = 'id';

    public function kelompok()
    {
        return $this->belongsTo(Kelompok::class, 'kode_kelompok');
    }

    public function objek()
    {
        return $this->hasMany(Objek::class, 'id');
    }
}
