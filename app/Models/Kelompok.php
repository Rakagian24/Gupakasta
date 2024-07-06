<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    use HasFactory;

    protected $table = 'kelompok';
    protected $primaryKey = 'kode_kelompok';
    public $incrementing = false;

    public function akun()
    {
        return $this->belongsTo(Akun::class, 'kode_akun');
    }

    public function jenis()
    {
        return $this->hasMany(Jenis::class, 'kode_kelompok');
    }
}
