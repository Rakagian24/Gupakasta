<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    use HasFactory;
    protected $table = 'akun';
    protected $primaryKey = 'kode_akun';
    public $incrementing = false;

    public function kelompok()
    {
        return $this->hasMany(Kelompok::class, 'kode_kelompok');
    }
}
